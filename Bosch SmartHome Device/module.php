<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';
/**
 * @property string $DeviceId
 * @property array $Multi_UnsupportedServices
 */
class BoschSmartHomeDevice extends BSHBasicClass
{
    use \BoschSHCDevice\BufferHelper;

    public function Create()
    {
        $this->RegisterPropertyString(\BoschSHC\Property::Device_Property_DeviceId, '');
        $this->DeviceId = '';
        $this->Multi_UnsupportedServices = [];
        //Never delete this line!
        parent::Create();
    }

    public function ApplyChanges()
    {
        $this->Multi_UnsupportedServices = [];
        $DeviceId = $this->ReadPropertyString(\BoschSHC\Property::Device_Property_DeviceId);
        $GetAllServices = ($this->DeviceId != $DeviceId);
        $this->DeviceId = $DeviceId;
        if ($DeviceId != '') {
            $this->SetReceiveDataFilter('.*"' . \BoschSHC\FlowToDevice::DeviceId . '":"' . $DeviceId . '".*');
        }
        //Never delete this line!
        parent::ApplyChanges();
        if (IPS_GetKernelRunlevel() != KR_READY) {
            return;
        }
        if (($this->DeviceId != '') && ($GetAllServices) && ($this->HasActiveParent())) {
            $this->Multi_UnsupportedServices = [];
            $this->GetServices();
        }
    }

    public function GetConfigurationForm()
    {
        $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
        $UnsupportedServices = $this->Multi_UnsupportedServices;
        if (count($UnsupportedServices)) {
            $Form['actions'][0]['visible'] = true;
            $Services = [];
            foreach ($UnsupportedServices as $ServiceId => $ServiceStates) {
                $Properties = [];
                foreach ($ServiceStates as $Property => $Value) {
                    if (is_array($Value)) {
                        $Value = json_encode($Value);
                    }
                    $Properties[] = [
                        'Property' => $Property,
                        'Value'    => $Value
                    ];
                }
                $Services[] = [
                    'ServiceId' => $ServiceId,
                    'States'    => $Properties
                ];
            }
            $Form['actions'][0]['popup']['items'][0]['values'] = $Services;
        }
        $this->SendDebug('FORM', json_encode($Form), 0);
        $this->SendDebug('FORM', json_last_error_msg(), 0);
        return json_encode($Form);
    }

    public function RequestAction($Ident, $Value)
    {
        list($ServiceId, $Property) = explode('_', $Ident);
        $Service = '\\BoschSHC\\Services\\' . $ServiceId;
        if (class_exists($Service)) {
            /** @var \BoschSHC\Services\ServiceBasics $Service */
            if ($Service::PropertyIsValid($Property)) {
                $Payload = $Service::getServiceStateRequest($Property, $Value);
                return $this->SendData(
                    \BoschSHC\ApiUrl::Devices . '/' . $this->DeviceId .
                        \BoschSHC\ApiUrl::Services . '/' . $ServiceId .
                        \BoschSHC\ApiUrl::State,
                    \BoschSHC\HTTP::PUT,
                    $Payload
                );
            }
        }
        set_error_handler([$this, 'ModulErrorHandler']);
        trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
        restore_error_handler();
        return false;
    }

    public function RequestState()
    {
        return $this->GetServices();
    }

    protected function DecodeServiceData($ServiceData)
    {
        if (!\BoschSHC\Services::ServiceIsValid($ServiceData['id'])) {
            //Merken das ServiceId Aktuell nicht unterstützt wird.
            $Services = $this->Multi_UnsupportedServices;
            $ServiceId = $ServiceData['id'];
            unset($ServiceData['id']);
            if (isset($ServiceData['state'])) {
                $Services[$ServiceId] = $ServiceData['state'];
            } else {
                $Services[$ServiceId] = [
                    'No states!' => 'Only Notification'
                ];
            }
            $this->Multi_UnsupportedServices = $Services;
            return false;
        }
        if ($ServiceData['id'] == \BoschSHC\Services::BatteryLevel) {
            if (!array_key_exists('state', $ServiceData)) {
                $ServiceData['state']['batteryLevel'] = 'OK';
            }
        }
        /** @var \BoschSHC\Services\ServiceBasics */
        $Service = '\\BoschSHC\\Services\\' . $ServiceData['id'];
        if (array_key_exists('state', $ServiceData)) {
            foreach ($ServiceData['state'] as $Property => $Value) {
                if ($Property == '@type') {
                    continue;
                }
                if (!$Service::PropertyIsValid($Property)) {
                    continue;
                }
                $VariableValues = $Service::getIPSVariable($Property, $Value);
                $this->MaintainVariable(
                    $VariableValues[\BoschSHC\Services\IPSVarIdent],
                    $this->Translate($VariableValues[\BoschSHC\Services\IPSVarName]),
                    $VariableValues[\BoschSHC\Services\IPSVarType],
                    $VariableValues[\BoschSHC\Services\IPSProfile],
                    0,
                    true
                );
                if ($VariableValues[\BoschSHC\Services\IPSVarAction]) {
                    $this->EnableAction($VariableValues[\BoschSHC\Services\IPSVarIdent]);
                }
                $this->SetValue($VariableValues[\BoschSHC\Services\IPSVarIdent], $VariableValues[\BoschSHC\Services\IPSVarValue]);
            }
        }
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
        return true;
    }
}
