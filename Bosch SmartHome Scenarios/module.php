<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSmartHomeScenarios {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';
/**
 * @property string $ScenarioId
 */
class BoschSmartHomeScenarios extends BSHBasicClass
{
    use \BoschSmartHomeScenarios\BufferHelper;

    public function Create()
    {
        $this->RegisterPropertyString(\BoschSHC\Property::Scenario_Property_ScenarioId, '');
        $this->ScenarioId = '';
        //Never delete this line!
        parent::Create();
    }
    public function ApplyChanges()
    {
        $ScenarioId = $this->ReadPropertyString(\BoschSHC\Property::Scenario_Property_ScenarioId);
        $this->ScenarioId = $ScenarioId;
        if ($ScenarioId != '') {
            $this->SetReceiveDataFilter('.*"' . \BoschSHC\FlowToScenarios::ScenarioId . '":"' . $ScenarioId . '".*');
        }
        //Never delete this line!
        parent::ApplyChanges();
        $this->MaintainVariable(
            'trigger',
            $this->Translate('Start scenario'),
            VARIABLETYPE_INTEGER,
            'BSH.Scenario.Trigger',
            0,
            true
        );
        $this->EnableAction('trigger');
        $this->MaintainVariable(
            'lastExecute',
            $this->Translate('Last execute time'),
            VARIABLETYPE_INTEGER,
            '~UnixTimestamp',
            0,
            true
        );
    }

    public function RequestAction($Ident, $Value)
    {
        if ($Ident != 'trigger') {
            set_error_handler([$this, 'ModulErrorHandler']);
            trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
            restore_error_handler();
            return false;
        }
        return $this->SendData(
            \BoschSHC\ApiUrl::Scenarios .
                '/' . $this->ScenarioId .
                \BoschSHC\ApiUrl::Trigger,
            \BoschSHC\HTTP::POST
        );
    }
    public function RequestState()
    {
        return false;
    }
    protected function DecodeServiceData($ScenarioState)
    {
        $this->SetValue('lastExecute', (int) substr($ScenarioState['lastTimeTriggered'], 0, -3));
    }
}
