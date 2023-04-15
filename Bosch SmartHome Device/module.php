<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/DebugHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/ParentIOHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCTypes.php';
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
            return false;
        }

        public function ReceiveData($JSONString)
        {
            $Data = json_decode($JSONString, true);
            $this->SendDebug('Event Device', $Data['DeviceId'], 0);
            $this->SendDebug('Event Data', $Data['Event'], 0);
        }
        protected function ModulErrorHandler($errno, $errstr)
        {
            echo $errstr . PHP_EOL;
        }
        private function GetServices()
        {
            $this->SendData(\BoschSHC\ApiUrl::Devices . '/' . $this->DeviceId  . \BoschSHC\ApiUrl::Services);
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
                $this->SendDebug('Result', null, 0);
                return false;
            }
            $Result = unserialize($Result);
            if ($Result === false) {
                $this->SendDebug('Result', false, 0);
                return false;
            }
            if (($Method == \BoschSHC\HTTP::PUT) && ($Result)) {
                $this->SendDebug('Result', true, 0);
                return true;
            }
            $this->SendDebug('Result', json_decode($Result, true), 0);
            return json_decode($Result, true);
        }
    }