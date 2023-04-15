<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/DebugHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/ParentIOHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCTypes.php';
require_once dirname(__DIR__) . '/libs/Services.php';
/**
 * @property int $ParentID
 * @property string $DeviceId
 */
    class BoschSmartHomeDevice extends IPSModule
    {
        use \BoschSHCDevice\BufferHelper;
        use \BoschSHCDevice\DebugHelper;
        public function Create()
        {
            //Never delete this line!
            parent::Create();
            $this->RegisterPropertyString(\BoschSHC\Property::Device_Property_DeviceId, '');
            $this->ConnectParent(\BoschSHC\GUID::IO);
            $this->DeviceId = '';
        }

        public function Destroy()
        {
            //Never delete this line!
            parent::Destroy();
        }

        public function ApplyChanges()
        {
            //Never delete this line!
            parent::ApplyChanges();
            $DeviceId = $this->ReadPropertyString(\BoschSHC\Property::Device_Property_DeviceId);
            $GetAllServices = ($this->DeviceId != $DeviceId);
            $this->DeviceId = $DeviceId;
            if ($DeviceId != '') {
                $this->SetReceiveDataFilter('.*"DeviceId":"' . $DeviceId . '".*');
            }
            if (IPS_GetKernelRunlevel() != KR_READY) {
                return;
            }
            if (($this->DeviceId != '') && ($GetAllServices) && ($this->HasActiveParent())) {
                $this->GetServices();
                // Services und Values auslesen
                // Variablen anlegen
            }
        }
        public function RequestAction($Ident, $Value)
        {
            $ServiceId = \BoschSHC\Services::getServiceIdByProperty($Ident);
            if ($ServiceId) {
                /** @var \BoschSHC\Services\ServiceBasics */
                $Service = '\\BoschSHC\\Services\\' . $ServiceId;
                if ($Service::PropertyHasAction($Ident)) {
                    $Payload = $Service::getServiceStateRequest($Ident, $Value);
                    return $this->SendData(
                    \BoschSHC\ApiUrl::Devices . '/' . $this->DeviceId .
                    \BoschSHC\ApiUrl::Services . '/' . $ServiceId .
                    \BoschSHC\ApiUrl::State,
                    \BoschSHC\HTTP::PUT,
                    $Payload);
                }
            }
            set_error_handler([$this, 'ModulErrorHandler']);
            trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
            restore_error_handler();
            return false;
        }

        public function ReceiveData($JSONString)
        {
            $Data = json_decode($JSONString, true);
            $this->SendDebug('Event Device', $Data['DeviceId'], 0);
            $this->SendDebug('Event Data', $Data['Event'], 0);
            $this->DecodeServiceData($Data['Event']);
        }
        protected function ModulErrorHandler($errno, $errstr)
        {
            echo $errstr . PHP_EOL;
        }
        private function GetServices()
        {
            $Services = $this->SendData(\BoschSHC\ApiUrl::Devices . '/' . $this->DeviceId . \BoschSHC\ApiUrl::Services);
            if (!$Services) {
                return false;
            }
            foreach ($Services as $Service) {
                $this->SendDebug('Result', $Service, 0);
                unset($Service['deviceId']);
                $this->DecodeServiceData($Service);
            }
        }
        private function DecodeServiceData($ServiceData)
        {
            if (!\BoschSHC\Services::ServiceIsValid($ServiceData)) {
                //todo -> Merken das ServiceId Aktuell nicht unterstützt wird und in der Instanz anzeigen.
                return false;
            }
            /** @var \BoschSHC\Services\ServiceBasics */
            $Service = '\\BoschSHC\\Services\\' . $ServiceData['id'];
            foreach ($ServiceData['state'] as $Property => $Value) {
                if ($Property == '@type') {
                    continue;
                }
                $VariableValues = $Service::getIPSVariable($Property, $Value);
                $this->MaintainVariable(
                    $Property,
                    $this->Translate($VariableValues[\BoschSHC\Services\IPSVarName]),
                    $VariableValues[\BoschSHC\Services\IPSVarType],
                    $VariableValues[\BoschSHC\Services\IPSProfile],
                    0,
                    true
                );
                if ($VariableValues[\BoschSHC\Services\IPSVarAction]) {
                    $this->EnableAction($Property);
                }
                $this->SetValue($Property, $VariableValues[\BoschSHC\Services\IPSVarValue]);
            }
        }
        private function SendData(string $ApiCall, string $Method = \BoschSHC\HTTP::GET, string $Payload = '')
        {
            $this->SendDebug('Send Method', $Method, 0);
            $this->SendDebug('Send ApiCall', $ApiCall, 0);
            $this->SendDebug('Send Payload', $Payload, 0);
            $JSON = json_encode([
                \BoschSHC\FlowToParent::DataID  => \BoschSHC\GUID::SendToIO,
                \BoschSHC\FlowToParent::Call    => $ApiCall,
                \BoschSHC\FlowToParent::Method  => $Method,
                \BoschSHC\FlowToParent::Payload => $Payload
            ]);
            set_error_handler([$this, 'ModulErrorHandler']);
            $Result = $this->SendDataToParent($JSON);
            restore_error_handler();
            if (!$Result) {
                $this->SendDebug('Result', 'NULL', 0);
                return false;
            }
            $Result = unserialize($Result);
            if ($Result === false) {
                $this->SendDebug('Result', 'false', 0);
                return false;
            }
            if (($Method == \BoschSHC\HTTP::PUT) && ($Result)) {
                $this->SendDebug('Result', 'true', 0);
                return true;
            }
            return json_decode($Result, true);
        }
    }