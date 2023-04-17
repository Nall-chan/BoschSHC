<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHCConf {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/DebugHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCTypes.php';
    class BoschSmartHomeConfigurator extends IPSModule
    {
        use            \BoschSHCConf\DebugHelper;

        public function Create()
        {
            //Never delete this line!
            parent::Create();
            $this->ConnectParent(\BoschSHC\GUID::IO);
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
            $this->SetReceiveDataFilter('.*"DeviceId":"NOTHING".*');
        }

        public function GetConfigurationForm()
        {
            $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
            if (!$this->HasActiveParent() || (IPS_GetInstance($this->InstanceID)['ConnectionID'] == 0)) {
                $Form['actions'][] = [
                    'type'  => 'PopupAlert',
                    'popup' => [
                        'items' => [[
                            'type'    => 'Label',
                            'caption' => 'Instance has no active parent.'
                        ]]
                    ]
                ];
                $this->SendDebug('FORM', json_encode($Form), 0);
                $this->SendDebug('FORM', json_last_error_msg(), 0);
                return json_encode($Form);
            }
            $Values = $this->GetDevices();

            $Form['actions'][0]['values'] = $Values;
            $this->SendDebug('FORM', json_encode($Form), 0);
            $this->SendDebug('FORM', json_last_error_msg(), 0);

            return json_encode($Form);
        }

        protected function FilterInstances(int $InstanceID)
        {
            return IPS_GetInstance($InstanceID)['ConnectionID'] == IPS_GetInstance($this->InstanceID)['ConnectionID'];
        }

        protected function GetConfigParam(&$item1, $InstanceID, $ConfigParam)
        {
            $item1 = IPS_GetProperty($InstanceID, $ConfigParam);
        }

        private function GetRooms()
        {
            $JSON = json_encode([
                \BoschSHC\FlowToParent::DataID     => \BoschSHC\GUID::SendToIO,
                \BoschSHC\FlowToParent::Call       => \BoschSHC\ApiUrl::Rooms,
                \BoschSHC\FlowToParent::Method     => \BoschSHC\HTTP::GET,
                \BoschSHC\FlowToParent::Payload    => ''
            ]);
            $Result = $this->SendDataToParent($JSON);
            if (!$Result) {
                return [];
            }
            $Result = unserialize($Result);
            if ($Result === false) {
                return [];
            }
            $this->SendDebug('GetRooms', $Result, 0);
            $Values = json_decode($Result, true);
            return array_column($Values, 'name', 'id');
        }

        private function GetDevices()
        {
            $Rooms = $this->GetRooms();
            if (!count($Rooms)) {
                return [];
            }
            $JSON = json_encode([
                \BoschSHC\FlowToParent::DataID     => \BoschSHC\GUID::SendToIO,
                \BoschSHC\FlowToParent::Call       => \BoschSHC\ApiUrl::Devices,
                \BoschSHC\FlowToParent::Method     => \BoschSHC\HTTP::GET,
                \BoschSHC\FlowToParent::Payload    => ''
            ]);
            $Result = $this->SendDataToParent($JSON);
            if (!$Result) {
                return [];
            }
            $Result = unserialize($Result);
            if ($Result === false) {
                return [];
            }
            $this->SendDebug('GetDevices', $Result, 0);
            $Devices = json_decode($Result, true);
            $IPSDevices = $this->GetIPSInstances();
            $Values = [];
            foreach ($Devices as $Device) {
                $InstanceID = array_search($Device['id'], $IPSDevices);
                $Values[] = [
                    'id'               => $Device['id'],
                    'name'             => ($InstanceID ? IPS_GetName($InstanceID) : $Device['name']),
                    'deviceModel'      => $Device['deviceModel'],
                    'instanceID'       => ($InstanceID ? $InstanceID : 0),
                    'create'           => [
                        'moduleID'         => \BoschSHC\GUID::Device,
                        'location'         => isset($Device['roomId']) ? [$Rooms[$Device['roomId']]] : [],
                        'configuration'    => [
                            \BoschSHC\Property::Device_Property_DeviceId => $Device['id']
                        ]
                    ]
                ];
                if ($InstanceID !== false) {
                    unset($IPSDevices[$InstanceID]);
                }
            }
            foreach ($IPSDevices as $InstanceID => $DeviceId) {
                $Values[] = [
                    'id'               => $Device['id'],
                    'name'             => IPS_GetName($InstanceID),
                    'deviceModel'      => '',
                    'instanceID'       => $InstanceID,
                ];
            }
            return $Values;
        }

        private function GetIPSInstances()
        {
            $InstanceIDList = array_filter(IPS_GetInstanceListByModuleID(\BoschSHC\GUID::Device), [$this, 'FilterInstances']);
            $InstanceIDList = array_flip(array_values($InstanceIDList));
            array_walk($InstanceIDList, [$this, 'GetConfigParam'], \BoschSHC\Property::Device_Property_DeviceId);
            return $InstanceIDList;
        }
    }
