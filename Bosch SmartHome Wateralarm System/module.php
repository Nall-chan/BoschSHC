<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';

    class BoschSmartHomeWateralarmSystem extends BSHBasicClass
    {
        const WaterAlarmSystemState = 'waterAlarmSystemState';

        public function ApplyChanges()
        {
            //Never delete this line!
            parent::ApplyChanges();
            if (IPS_GetKernelRunlevel() != KR_READY) {
                return;
            }
            $VariableValues = \BoschSHC\Services\WaterAlarmSystem::getIPSVariable('mute', 0);
            $this->MaintainVariable(
                $VariableValues[\BoschSHC\Services\IPSVarIdent],
                $this->Translate($VariableValues[\BoschSHC\Services\IPSVarName]),
                $VariableValues[\BoschSHC\Services\IPSVarType],
                $VariableValues[\BoschSHC\Services\IPSProfile],
                0,
                true
            );
            $this->EnableAction($VariableValues[\BoschSHC\Services\IPSVarIdent]);
            if ($this->HasActiveParent()) {
                $this->GetState();
            }
        }

        public function RequestAction($Ident, $Value)
        {
            if ($Ident != \BoschSHC\Services::WaterAlarmSystem.'_mute') {
                set_error_handler([$this, 'ModulErrorHandler']);
                trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
                restore_error_handler();
                return false;
            }
            return $this->SendData(
                \BoschSHC\ApiUrl::WaterAlarm .
                \BoschSHC\ApiUrl::ActionMute,
                \BoschSHC\HTTP::POST,
            );
        }

        public function RequestState()
        {
            return $this->GetState();
        }

        private function GetState()
        {
            $WaterAlarmState = $this->SendData(\BoschSHC\ApiUrl::WaterAlarm);
            if (!$WaterAlarmState) {
                return false;
            }
            $this->SendDebug('WaterAlarmState', $WaterAlarmState, 0);
            $this->DecodeServiceData($WaterAlarmState);
            return true;
        }

        protected function DecodeServiceData($ServiceData)
        {
            if ($ServiceData['@type'] =! self::WaterAlarmSystemState) {
                return false;
            }
            $VariableValues = \BoschSHC\Services\WaterAlarmSystem::getIPSVariable('state', $ServiceData['state']);
            $this->MaintainVariable(
                $VariableValues[\BoschSHC\Services\IPSVarIdent],
                $this->Translate($VariableValues[\BoschSHC\Services\IPSVarName]),
                $VariableValues[\BoschSHC\Services\IPSVarType],
                $VariableValues[\BoschSHC\Services\IPSProfile],
                0,
                true
            );
            $this->SetValue($VariableValues[\BoschSHC\Services\IPSVarIdent], $VariableValues[\BoschSHC\Services\IPSVarValue]);
        }
    }
