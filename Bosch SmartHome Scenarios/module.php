<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSmartHomeScenarios {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';
/**
 * @property string $ScenarioId
 */
class BoschSmartHomeScenarios extends BSHCBasicClass
{
    use \BoschSmartHomeScenarios\BufferHelper;

    public function Create(): void
    {
        $this->RegisterPropertyString(\BoschSHC\Property::Scenario_Property_ScenarioId, '');
        $this->ScenarioId = '';
        //Never delete this line!
        parent::Create();
    }

    public function ApplyChanges(): void
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
            [
                'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                'ICON'         => 'play',
                'OPTIONS'      => json_encode([
                    [
                        'Value'      => 0,
                        'Caption'    => \BoschSHC\Services\ServiceBasics::TranslatePresentationValue('Execute'),
                        'ColorValue' => 0x3485EA,
                        'IconActive' => false,
                        'IconValue'  => ''
                    ]
                ])
            ],
            0,
            true
        );
        $this->EnableAction('trigger');
        $this->MaintainVariable(
            'lastExecute',
            $this->Translate('Last execute time'),
            VARIABLETYPE_INTEGER,
            [
                'PRESENTATION'    => VARIABLE_PRESENTATION_DATE_TIME,
                'MONTH_TEXT'      => false,
                'DAY_OF_THE_WEEK' => false,
                'DATE'            => 2,
                'TIME'            => 1
            ],
            0,
            true
        );
    }

    public function RequestAction(string $Ident, mixed $Value): void
    {
        if ($Ident != 'trigger') {
            set_error_handler([$this, 'ModulErrorHandler']);
            trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
            restore_error_handler();
            return;
        }
        $this->ExecuteScenario();
    }

    public function RequestState(): bool
    {
        return false;
    }

    public function ExecuteScenario(): bool
    {
        return $this->SendData(
            \BoschSHC\ApiUrl::Scenarios .
            '/' . $this->ScenarioId .
            \BoschSHC\ApiUrl::Trigger,
            \BoschSHC\HTTP::POST
        );
        $this->SendDebug('Scenario', $Scenario, 0);
    }

    protected function DecodeServiceData(array $ScenarioState): void
    {
        $this->SetValue('lastExecute', (int) substr($ScenarioState['lastTimeTriggered'], 0, -3));
    }
}
