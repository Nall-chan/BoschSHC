<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSmartHomeSystem {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';
/**
 * @property string $DeviceId
 * @property array $Multi_UnsupportedServices
 */
class BoschSmartHomeSystem extends BSHCBasicClass
{
    use \BoschSmartHomeSystem\BufferHelper;

    public function Create(): void
    {
        $this->RegisterPropertyString(\BoschSHC\Property::System_Property_SystemMAC, '');
        $this->DeviceId = '';
        $this->Multi_UnsupportedServices = [];
        //Never delete this line!
        parent::Create();
    }

    public function ApplyChanges(): void
    {
        $this->Multi_UnsupportedServices = [];
        $DeviceId = $this->ReadPropertyString(\BoschSHC\Property::System_Property_SystemMAC);
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

    public function GetConfigurationForm(): string
    {
        $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
        if ($this->GetStatus() == IS_CREATING) {
            return json_encode($Form);
        }
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

    public function RequestAction(string $Ident, mixed $Value): void
    {
        list($ServiceId, $Property) = explode('_', $Ident);
        $Service = '\\BoschSHC\\Services\\' . $ServiceId;
        if (class_exists($Service)) {
            /** @var \BoschSHC\Services\ServiceBasics $Service */
            if ($Service::PropertyIsValid($Property)) {
                $Payload = $Service::getServiceStateRequest($Property, $Value);
                $this->SendData(
                    \BoschSHC\ApiUrl::System .
                        \BoschSHC\ApiUrl::Services . '/' . $ServiceId .
                        \BoschSHC\ApiUrl::State,
                    \BoschSHC\HTTP::PUT,
                    $Payload
                );
                return;
            }
        }
        set_error_handler([$this, 'ModulErrorHandler']);
        trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
        restore_error_handler();
        return;
    }

    public function RequestState(): bool
    {
        return $this->GetServices();
    }

    protected function DecodeServiceData(array $ServiceData): void
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
            return;
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

    private function GetServices(): bool
    {
        $Services = $this->SendData(\BoschSHC\ApiUrl::System . \BoschSHC\ApiUrl::Services);
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
