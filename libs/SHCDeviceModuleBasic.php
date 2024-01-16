<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/DebugHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCDevice {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/VariableProfileHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCTypes.php';
require_once dirname(__DIR__) . '/libs/Services.php';
/**
 * @method bool SendDebug(string $Message, mixed $Data, int $Format)
 */
abstract class BSHBasicClass extends IPSModuleStrict
{
    use \BoschSHCDevice\DebugHelper;
    use \BoschSHCDevice\VariableProfileHelper;
    use \BoschSHC\Services\IPSProfile;

    public function Create(): void
    {
        //Never delete this line!
        parent::Create();
        $this->ConnectParent(\BoschSHC\GUID::IO);
    }

    public function Destroy(): void
    {
        //Never delete this line!
        $this->UnregisterProfiles();
        parent::Destroy();
    }

    public function ApplyChanges(): void
    {
        //Never delete this line!
        $this->RegisterProfiles();
        parent::ApplyChanges();
    }

    public function ReceiveData(string $JSONString): string
    {
        $Data = json_decode($JSONString, true);
        $this->SendDebug('Event Data', $Data[\BoschSHC\FlowToDevice::Event], 0);
        $this->DecodeServiceData($Data[\BoschSHC\FlowToDevice::Event]);
        return '';
    }

    abstract public function RequestState(): bool;

    protected function TranslateProfile(string $Text): string
    {
        $translation = $this->GetProfileTranslation();
        $language = IPS_GetSystemLanguage();
        $code = explode('_', $language)[0];
        if (isset($translation['translations'])) {
            if (isset($translation['translations'][$language])) {
                if (isset($translation['translations'][$language][$Text])) {
                    return $translation['translations'][$language][$Text];
                }
            } elseif (isset($translation['translations'][$code])) {
                if (isset($translation['translations'][$code][$Text])) {
                    return $translation['translations'][$code][$Text];
                }
            }
        }
        return $Text;
    }

    protected function GetProfileTranslation(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/locale_profile.json'), true);
    }

    protected function ModulErrorHandler(int $errno, string $errstr): bool
    {
        echo $errstr . PHP_EOL;
        return true;
    }
    abstract protected function DecodeServiceData(array $ServiceData): void;

    protected function SendData(string $ApiCall, string $Method = \BoschSHC\HTTP::GET, string $Payload = ''): bool|array
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

    protected function camelCase2Separator(string $str, string $separator = ' '): string
    {
        if (empty($str)) {
            return $str;
        }
        $str = lcfirst($str);
        $str = preg_replace('/[A-Z]/', $separator . '$0', $str);
        return $str;
    }
}
