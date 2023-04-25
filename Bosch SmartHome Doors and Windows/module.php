<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSmartHomeMessages {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';
/**
 * @property array $Multi_States
 */
class BoschSmartHomeDoorsandWindows extends BSHBasicClass
{
    use \BoschSmartHomeMessages\BufferHelper;

    public function Create()
    {
        $this->Multi_States = [];
        //Never delete this line!
        parent::Create();
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();
        if (IPS_GetKernelRunlevel() != KR_READY) {
            return;
        }
        if ($this->HasActiveParent()) {
            $this->GetState();
        }
    }

    public function RequestAction($Ident, $Value)
    {
        set_error_handler([$this, 'ModulErrorHandler']);
        trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
        restore_error_handler();
        return false;
    }
    public function RequestState()
    {
        return $this->GetState();
    }
    public function ReadData()
    {
        return $this->Multi_States;
    }
    /* todo / URL/Method unknown
    public function DeleteMessage(string $MessageId)
    {
        $Messages = $this->SendData(\BoschSHC\ApiUrl::Messages);
        if (!$Messages) {
            return false;
        }
    }*/
    protected function DecodeServiceData($Message)
    {
        $OpenWindows = $this->Multi_States;
        //todo
        /*
        $IDs = array_column($Messages, 'id');
        $Index = array_search($Message['id'], $IDs);
        if (array_key_exists('deleted', $Message)) {
            if ($Index !== false) {
                unset($Messages[$Index]);
            }
        } else {
            if ($Index === false) {
                $Messages[] = $Message;
            } else {
                $Messages[$Index] = $Message;
            }
        }*/
        $this->Multi_States = $OpenWindows;
        $this->UpdateVariables();
    }
    private function GetState()
    {
        $OpenWindows = $this->SendData(\BoschSHC\ApiUrl::OpenWindows);
        if (!$OpenWindows) {
            return false;
        }
        $this->SendDebug('OpenWindows', $OpenWindows, 0);
        $this->Multi_States = $OpenWindows;
        $this->UpdateVariables();
        return true;
    }
    private function UpdateVariables()
    {
        $OpenWindows = $this->Multi_States;

        foreach ($OpenWindows as $Type => $Items) {
            $this->RegisterVariableInteger(
                $Type,
                $this->Translate(ucfirst($this->camelCase2Separator($Type))),
                '',
                0
            );
            $this->SetValue($Type, count($Items));
        }
    }
}
