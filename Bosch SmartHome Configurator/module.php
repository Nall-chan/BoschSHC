<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHCConf {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCConf {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/DebugHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCConf {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/ParentIOHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCTypes.php';
/**
 * @property int $ParentID
 */
    class BoschSmartHomeConfigurator extends IPSModule
    {
        use \BoschSHCConf\BufferHelper,
            \BoschSHCConf\DebugHelper,
            \BoschSHCConf\InstanceStatus {
            \BoschSHCConf\InstanceStatus::MessageSink as IOMessageSink; // MessageSink gibt es sowohl hier in der Klasse, als auch im Trait InstanceStatus. Hier wird für die Methode im Trait ein Alias benannt.
            \BoschSHCConf\InstanceStatus::RegisterParent as IORegisterParent;
            \BoschSHCConf\InstanceStatus::RequestAction as IORequestAction;
            }

        public function Create()
        {
            //Never delete this line!
            parent::Create();
            $this->ConnectParent(\BoschSHC\GUID::IO);
            if (IPS_GetKernelRunlevel() != KR_READY) {
                $this->RegisterMessage(0, IPS_KERNELSTARTED);
            }
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
            $this->RegisterMessage($this->InstanceID, FM_CONNECT);
            $this->RegisterMessage($this->InstanceID, FM_DISCONNECT);
            $this->SetReceiveDataFilter('.*"DeviceId":"NOTHING".*');
            if (IPS_GetKernelRunlevel() != KR_READY) {
                return;
            }
            $this->RegisterParent();
        }
        public function MessageSink($TimeStamp, $SenderID, $Message, $Data)
        {
            $this->IOMessageSink($TimeStamp, $SenderID, $Message, $Data);

            switch ($Message) {
                case IPS_KERNELSTARTED:
                    $this->UnregisterMessage(0, IPS_KERNELSTARTED);
                    $this->KernelReady();
                    break;
            }
        }
        public function RequestAction($Ident, $Value)
        {
            if ($this->IORequestAction($Ident, $Value)) {
                return true;
            }
            return false;
        }
        public function GetConfigurationForm()
        {
            $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
            if (!$this->HasActiveParent() || ($this->ParentID == 0)) {
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
        /**
         * Wird ausgeführt wenn sich der Status vom Parent ändert.
         */
        protected function IOChangeState($State)
        {
            if ($State == IS_ACTIVE) {
                $this->ReloadForm();
            }
        }

        protected function KernelReady()
        {
            $this->RegisterParent();
            if ($this->HasActiveParent()) {
                $this->ApplyChanges();
            }
        }
        protected function RegisterParent()
        {
            $this->IORegisterParent();
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

        private function GetIPSInstances(): array
        {
            $InstanceIDList = array_filter(IPS_GetInstanceListByModuleID(\BoschSHC\GUID::Device), [$this, 'FilterInstances']);
            $InstanceIDList = array_flip(array_values($InstanceIDList));
            array_walk($InstanceIDList, [$this, 'GetConfigParam'], \BoschSHC\Property::Device_Property_DeviceId);
            return $InstanceIDList;
        }
    }