<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSmartHomeMessages {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';
/**
 * @property array $Multi_Messages
 */
class BoschSmartHomeMessages extends BSHBasicClass
{
    use \BoschSmartHomeMessages\BufferHelper;

    public function Create()
    {
        $this->Multi_Messages = [];
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
    public function ReadMessages()
    {
        return $this->Multi_Messages;
    }
    public function DeleteMessage(string $MessageId)
    {
        $Messages = $this->SendData(\BoschSHC\ApiUrl::Messages . '/' . $MessageId, \BoschSHC\HTTP::DELETE);
        if (!$Messages) {
            return false;
        }
    }
    protected function DecodeServiceData($Message)
    {
        $Messages = $this->Multi_Messages;
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
        }
        $this->Multi_Messages = $Messages;
        $this->UpdateVariables();
    }
    private function GetState()
    {
        $Messages = $this->SendData(\BoschSHC\ApiUrl::Messages);
        if (!$Messages) {
            return false;
        }
        $this->SendDebug('Messages', $Messages, 0);
        $this->Multi_Messages = $Messages;
        $this->UpdateVariables();
        return true;
    }
    private function UpdateVariables()
    {
        $Messages = $this->Multi_Messages;
        $EmptyTypes = [
            'ERROR'      => 0,
            'WARNING'    => 0,
            'ALARM'      => 0,
            'INFORMATION'=> 0
        ];
        $Types = array_count_values(array_column(array_column($Messages, 'messageCode'), 'category'));
        $Types = array_merge($EmptyTypes, $Types);
        foreach ($Types as $Type => $Numbers) {
            $this->RegisterVariableInteger(
                $Type,
                $this->Translate(ucfirst(strtolower($Type)) . ' messages'),
                '',
                0
            );
            $this->SetValue($Type, $Numbers);
        }
    }
}
