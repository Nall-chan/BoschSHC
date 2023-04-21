<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/DebugHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/VariableProfileHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCTypes.php';
require_once dirname(__DIR__) . '/libs/Services.php';

abstract class BSHBasicClass extends IPSModule
{
    use \BoschSHCDevice\DebugHelper;
    use \BoschSHCDevice\VariableProfileHelper;
    use \BoschSHC\Services\IPSProfile;

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->ConnectParent(\BoschSHC\GUID::IO);
    }

    public function Destroy()
    {
        //Never delete this line!
        $this->UnregisterProfiles();
        parent::Destroy();
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        $this->RegisterProfiles();
        parent::ApplyChanges();
    }

    public function ReceiveData($JSONString)
    {
        $Data = json_decode($JSONString, true);
        $this->SendDebug('Event Data', $Data['Event'], 0);
        $this->DecodeServiceData($Data['Event']);
    }

    abstract public function RequestState();

    protected function ModulErrorHandler($errno, $errstr)
    {
        echo $errstr . PHP_EOL;
    }
    abstract protected function DecodeServiceData($ServiceData);

    protected function SendData(string $ApiCall, string $Method = \BoschSHC\HTTP::GET, string $Payload = '')
    {
        $this->SendDebug('Send Method', $Method, 0);
        $this->SendDebug('Send ApiCall', $ApiCall, 0);
        $this->SendDebug('Send Payload', $Payload, 0);
        $JSON = json_encode([
            \BoschSHC\FlowToParent::DataID  => \BoschSHC\GUID::SendToIO,
            \BoschSHC\FlowToParent::Call    => $ApiCall,
            \BoschSHC\FlowToParent::Method  => $Method,
            \BoschSHC\FlowToParent::Payload => $Payload
        ]);
        set_error_handler([$this, 'ModulErrorHandler']);
        $Result = $this->SendDataToParent($JSON);
        restore_error_handler();
        if (!$Result) {
            $this->SendDebug('Result', 'NULL', 0);
            return false;
        }
        $Result = unserialize($Result);
        if ($Result === false) {
            $this->SendDebug('Result', 'false', 0);
            return false;
        }
        if (($Method == \BoschSHC\HTTP::PUT) && ($Result)) {
            $this->SendDebug('Result', 'true', 0);
            return true;
        }
        return json_decode($Result, true);
    }
}
