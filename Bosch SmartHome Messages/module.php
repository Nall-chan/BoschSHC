<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSmartHomeMessages {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCDeviceModuleBasic.php';
/**
 *
 * @todo Nachrichten als Tabelle darstellen
 * @todo Nachrichten als Textboxen darstellen
 *
 * @property array $Multi_Messages
 */
class BoschSmartHomeMessages extends BSHCBasicClass
{
    use \BoschSmartHomeMessages\BufferHelper;

    public function Create(): void
    {
        $this->Multi_Messages = [];
        //Never delete this line!
        parent::Create();
    }

    public function ApplyChanges(): void
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

    public function RequestAction(string $Ident, mixed $Value): void
    {
        set_error_handler([$this, 'ModulErrorHandler']);
        trigger_error($this->Translate('Invalid Ident'), E_USER_NOTICE);
        restore_error_handler();
        return;
    }

    public function RequestState(): bool
    {
        return $this->GetState();
    }

    public function ReadMessages(): array
    {
        $MultiMessages = $this->Multi_Messages;
        $Messages = [];
        foreach ($MultiMessages as $Message) {
            $Messages[$Message['id']] = array_intersect_key($Message, array_flip(['messageCode', 'sourceType', 'sourceId', 'sourceName', 'location', 'timestamp']));
        }
        return $Messages;
    }

    public function DeleteMessage(string $MessageId): bool
    {
        $Messages = $this->SendData(\BoschSHC\ApiUrl::Messages . '/' . $MessageId, \BoschSHC\HTTP::DELETE);
        return $Messages;
    }

    protected function DecodeServiceData(array $Message): void
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

    private function GetState(): bool
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

    private function UpdateVariables(): void
    {
        $Messages = $this->Multi_Messages;
        $EmptyTypes = [
            'ERROR'       => 0,
            'WARNING'     => 0,
            'ALARM'       => 0,
            'INFORMATION' => 0,
            'SW_UPDATE'   => 0
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
