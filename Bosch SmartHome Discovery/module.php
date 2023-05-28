<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSmartHomeDiscovery {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/DebugHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCTypes.php';
/**
 * @method bool SendDebug(string $Message, mixed $Data, int $Format)
 */
class BoschSmartHomeDiscovery extends IPSModuleStrict
{
    use \BoschSmartHomeDiscovery\DebugHelper;

    public function GetConfigurationForm(): string
    {
        $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
        if ($this->GetStatus() == IS_CREATING) {
            return json_encode($Form);
        }
        $Form['actions'][0]['values'] = $this->GetDevices();
        $this->SendDebug('FORM', json_encode($Form), 0);
        $this->SendDebug('FORM', json_last_error_msg(), 0);

        return json_encode($Form);
    }

    private function GetDevices(): array
    {
        $Controllers = $this->GetSHCs();
        $this->SendDebug('Controllers', $Controllers, 0);
        $IPSDevices = $this->GetIPSInstances();
        $this->SendDebug('IPSDevices', $IPSDevices, 0);
        $Values = [];
        foreach ($Controllers as $Device) {
            $InstanceID = false;
            $Host = false;
            foreach ($Device['host'] as $DeviceHost) {
                $InstanceID = array_search(strtolower($DeviceHost), $IPSDevices);
                if ($InstanceID) {
                    $Host = $DeviceHost;
                    break;
                }
            }
            if (!$Host) {
                $Host = array_shift($Device['host']);
            }
            $Values[] = [
                'host'               => $Host,
                'name'               => ($InstanceID ? IPS_GetName($InstanceID) : $Device['name']),
                'instanceID'         => ($InstanceID ? $InstanceID : 0),
                'create'             => [
                    [
                        'moduleID'         => \BoschSHC\GUID::Configurator,
                        'configuration'    => new stdClass()
                    ],
                    [
                        'moduleID'         => \BoschSHC\GUID::IO,
                        'configuration'    => [
                            \BoschSHC\Property::IO_Property_Host  => $Host,
                            \BoschSHC\Property::IO_Property_Open  => true
                        ]
                    ]
                ]
            ];
            if ($InstanceID !== false) {
                unset($IPSDevices[$InstanceID]);
            }
        }
        foreach ($IPSDevices as $InstanceID => $Host) {
            $Values[] = [
                'host'               => $Host,
                'name'               => IPS_GetName($InstanceID),
                'instanceID'         => $InstanceID,
            ];
        }
        return $Values;
    }

    private function GetSHCs(): array
    {
        $mDNSInstanceIDs = IPS_GetInstanceListByModuleID(\BoschSHC\GUID::DDNS);
        $resultServiceTypes = ZC_QueryServiceType($mDNSInstanceIDs[0], '_http._tcp', '');
        $this->SendDebug('mDNS resultServiceTypes', $resultServiceTypes, 0);
        $SHCs = [];
        foreach ($resultServiceTypes as $device) {
            if (strpos($device['Name'], 'Bosch SHC') === false) {
                continue;
            }
            $SHC = [];
            $deviceInfo = ZC_QueryService($mDNSInstanceIDs[0], $device['Name'], '_http._tcp', 'local.');
            $this->SendDebug('mDNS QueryService', $device['Name'] . ' ' . $device['Type'] . ' ' . $device['Domain'] . '.', 0);
            $this->SendDebug('mDNS QueryService Result', $deviceInfo, 0);
            if (empty($deviceInfo)) {
                continue;
            }
            if (empty($deviceInfo[0]['IPv4'])) { //IPv4 und IPv6 sind vertauscht
                $SHC['IPv4'] = $deviceInfo[0]['IPv6'];
            } else {
                $SHC['IPv4'] = $deviceInfo[0]['IPv4'];
                if (isset($deviceInfo[0]['IPv6'])) {
                    foreach ($deviceInfo[0]['IPv6'] as $Index => $ipv6) {
                        $SHC['IPv6'][] = '[' . $ipv6 . ']';
                        $Hostname = gethostbyaddr($ipv6);
                        if ($Hostname != $ipv6) {
                            $SHC['Hostname'][$Index] = $Hostname;
                        }
                        $SHC['Hostname'][20 + $Index] = '[' . $ipv6 . ']';
                    }
                }
            }
            foreach ($SHC['IPv4'] as $Index => $ipv4) {
                $Hostname = gethostbyaddr($ipv4);
                if ($Hostname != $ipv4) {
                    $SHC['Hostname'][10 + $Index] = $Hostname;
                }
                $SHC['Hostname'][((strpos($ipv4, '169.254') === 0) ? 10 : 0) + 30 + $Index] = $ipv4;
            }
            ksort($SHC['Hostname']);
            array_push($SHCs, ['name' => $device['Name'], 'host'=>$SHC['Hostname']]);
        }
        return $SHCs;
    }

    private function GetIPSInstances(): array
    {
        $InstanceIDList = IPS_GetInstanceListByModuleID(\BoschSHC\GUID::Configurator);
        $Devices = [];
        foreach ($InstanceIDList as $InstanceID) {
            $IO = IPS_GetInstance($InstanceID)['ConnectionID'];
            if ($IO > 0) {
                $parentGUID = IPS_GetInstance($IO)['ModuleInfo']['ModuleID'];
                if ($parentGUID == \BoschSHC\GUID::IO) {
                    $Devices[$InstanceID] = strtolower(IPS_GetProperty($IO, \BoschSHC\Property::IO_Property_Host));
                }
            }
        }
        return $Devices;
    }
}
