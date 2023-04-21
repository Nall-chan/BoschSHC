<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSmartHomeAutomationRule {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';
/**
 * @property string $RuleId
 */
class BoschSmartHomeAutomationRule extends BSHBasicClass
{
    use \BoschSmartHomeAutomationRule\BufferHelper;

    public function Create()
    {
        $this->RegisterPropertyString(\BoschSHC\Property::AutomationRule_Property_RuleId, '');
        $this->RuleId = '';
        //Never delete this line!
        parent::Create();
    }
    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();
        $RuleId = $this->ReadPropertyString(\BoschSHC\Property::AutomationRule_Property_RuleId);
        $this->RuleId = $RuleId;
        if ($RuleId != '') {
            $this->SetReceiveDataFilter('.*"' . \BoschSHC\FlowToAutomationRule::RuleId . '":"' . $RuleId . '".*');
        }

        if (IPS_GetKernelRunlevel() != KR_READY) {
            return;
        }
        $VariableValues = \BoschSHC\Services\AutomationRule::getIPSVariable('enabled', 0);
        $this->MaintainVariable(
            $VariableValues[\BoschSHC\Services\IPSVarIdent],
            $this->Translate($VariableValues[\BoschSHC\Services\IPSVarName]),
            $VariableValues[\BoschSHC\Services\IPSVarType],
            $VariableValues[\BoschSHC\Services\IPSProfile],
            0,
            true
        );
        $this->EnableAction($VariableValues[\BoschSHC\Services\IPSVarIdent]);
        if (($this->RuleId != '') && ($this->HasActiveParent())) {
            $this->GetState();
        }
    }

    public function RequestAction($Ident, $Value)
    {
        if ($Ident != \BoschSHC\Services::AutomationRule . '_enabled') {
            set_error_handler([$this, 'ModulErrorHandler']);
            trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
            restore_error_handler();
            return false;
        }
        return $this->SendData(
            \BoschSHC\ApiUrl::AutomationRules .
                '/' . $this->RuleId .
                \BoschSHC\ApiUrl::Enabled,
            \BoschSHC\HTTP::PUT,
            json_encode($Value)
        );
    }

    public function RequestState()
    {
        return $this->GetState();
    }

    protected function DecodeServiceData($AutomationRule)
    {
        if ($AutomationRule['@type'] = !lcfirst(\BoschSHC\Services::AutomationRule)) {
            return false;
        }
        $VariableValues = \BoschSHC\Services\AutomationRule::getIPSVariable('enabled', $AutomationRule['enabled']);
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

    private function GetState()
    {
        $AutomationRule = $this->SendData(\BoschSHC\ApiUrl::AutomationRules . '/' . $this->RuleId);
        if (!$AutomationRule) {
            return false;
        }
        $this->SendDebug('AutomationRule', $AutomationRule, 0);
        $this->DecodeServiceData($AutomationRule);
        return true;
    }
}
