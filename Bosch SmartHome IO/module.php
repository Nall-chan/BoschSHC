<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHCIO {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/BufferHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHCIO {?>' . file_get_contents(dirname(__DIR__) . '/libs/helper/DebugHelper.php') . '}');
require_once dirname(__DIR__) . '/libs/SHCTypes.php';
/**
 * @property string $Host
 * @property string $ClientId
 * @property string $ClientName
 * @property bool $isPaired
 * @property string $SHCPollId
 * @property string $TempFilecert
 * @property string $TempFileprivatekey
 * @method bool SendDebug(string $Message, mixed $Data, int $Format)
 */
class BoschSmartHomeIO extends IPSModule
{
    use \BoschSHCIO\BufferHelper;
    use \BoschSHCIO\DebugHelper;

    const IS_NotReachable = IS_EBASE + 1;
    const IS_Unauthorized = IS_EBASE + 2;
    const IS_NotPaired = IS_EBASE + 3;
    const IS_NoCert = IS_EBASE + 4;
    const IS_ConnectionLost = IS_EBASE + 5;
    const SHC_Info = ':8446/smarthome/public/information';
    const SHC_Client = ':8443/smarthome/clients';
    const SHC_Poll = ':8444/remote/json-rpc';
    const SHC_Api = ':8444/smarthome';
    const IPS_ClientID_Prefix = 'oss_Nall-chan_';
    const IPS_ClientName_Prefix = 'OSS ';
    const TIMER_LongPoll = 'LongPulling';
    const Attribute_PrivateKey = 'privatekey';
    const Attribute_PublicKey = 'publickey';
    const Attribute_MyCert = 'cert';

    private static $CURL_error_codes = [
        0  => 'UNKNOWN ERROR',
        1  => 'CURLE_UNSUPPORTED_PROTOCOL',
        2  => 'CURLE_FAILED_INIT',
        3  => 'CURLE_URL_MALFORMAT',
        4  => 'CURLE_URL_MALFORMAT_USER',
        5  => 'CURLE_COULDNT_RESOLVE_PROXY',
        6  => 'CURLE_COULDNT_RESOLVE_HOST',
        7  => 'CURLE_COULDNT_CONNECT',
        8  => 'CURLE_FTP_WEIRD_SERVER_REPLY',
        9  => 'CURLE_REMOTE_ACCESS_DENIED',
        11 => 'CURLE_FTP_WEIRD_PASS_REPLY',
        13 => 'CURLE_FTP_WEIRD_PASV_REPLY',
        14 => 'CURLE_FTP_WEIRD_227_FORMAT',
        15 => 'CURLE_FTP_CANT_GET_HOST',
        17 => 'CURLE_FTP_COULDNT_SET_TYPE',
        18 => 'CURLE_PARTIAL_FILE',
        19 => 'CURLE_FTP_COULDNT_RETR_FILE',
        21 => 'CURLE_QUOTE_ERROR',
        22 => 'CURLE_HTTP_RETURNED_ERROR',
        23 => 'CURLE_WRITE_ERROR',
        25 => 'CURLE_UPLOAD_FAILED',
        26 => 'CURLE_READ_ERROR',
        27 => 'CURLE_OUT_OF_MEMORY',
        28 => 'CURLE_OPERATION_TIMEDOUT',
        30 => 'CURLE_FTP_PORT_FAILED',
        31 => 'CURLE_FTP_COULDNT_USE_REST',
        33 => 'CURLE_RANGE_ERROR',
        34 => 'CURLE_HTTP_POST_ERROR',
        35 => 'CURLE_SSL_CONNECT_ERROR',
        36 => 'CURLE_BAD_DOWNLOAD_RESUME',
        37 => 'CURLE_FILE_COULDNT_READ_FILE',
        38 => 'CURLE_LDAP_CANNOT_BIND',
        39 => 'CURLE_LDAP_SEARCH_FAILED',
        41 => 'CURLE_FUNCTION_NOT_FOUND',
        42 => 'CURLE_ABORTED_BY_CALLBACK',
        43 => 'CURLE_BAD_FUNCTION_ARGUMENT',
        45 => 'CURLE_INTERFACE_FAILED',
        47 => 'CURLE_TOO_MANY_REDIRECTS',
        48 => 'CURLE_UNKNOWN_TELNET_OPTION',
        49 => 'CURLE_TELNET_OPTION_SYNTAX',
        51 => 'CURLE_PEER_FAILED_VERIFICATION',
        52 => 'CURLE_GOT_NOTHING',
        53 => 'CURLE_SSL_ENGINE_NOTFOUND',
        54 => 'CURLE_SSL_ENGINE_SETFAILED',
        55 => 'CURLE_SEND_ERROR',
        56 => 'CURLE_RECV_ERROR',
        58 => 'CURLE_SSL_CERTPROBLEM',
        59 => 'CURLE_SSL_CIPHER',
        60 => 'CURLE_SSL_CACERT',
        61 => 'CURLE_BAD_CONTENT_ENCODING',
        62 => 'CURLE_LDAP_INVALID_URL',
        63 => 'CURLE_FILESIZE_EXCEEDED',
        64 => 'CURLE_USE_SSL_FAILED',
        65 => 'CURLE_SEND_FAIL_REWIND',
        66 => 'CURLE_SSL_ENGINE_INITFAILED',
        67 => 'CURLE_LOGIN_DENIED',
        68 => 'CURLE_TFTP_NOTFOUND',
        69 => 'CURLE_TFTP_PERM',
        70 => 'CURLE_REMOTE_DISK_FULL',
        71 => 'CURLE_TFTP_ILLEGAL',
        72 => 'CURLE_TFTP_UNKNOWNID',
        73 => 'CURLE_REMOTE_FILE_EXISTS',
        74 => 'CURLE_TFTP_NOSUCHUSER',
        75 => 'CURLE_CONV_FAILED',
        76 => 'CURLE_CONV_REQD',
        77 => 'CURLE_SSL_CACERT_BADFILE',
        78 => 'CURLE_REMOTE_FILE_NOT_FOUND',
        79 => 'CURLE_SSH',
        80 => 'CURLE_SSL_SHUTDOWN_FAILED',
        81 => 'CURLE_AGAIN',
        82 => 'CURLE_SSL_CRL_BADFILE',
        83 => 'CURLE_SSL_ISSUER_ERROR',
        84 => 'CURLE_FTP_PRET_FAILED',
        84 => 'CURLE_FTP_PRET_FAILED',
        85 => 'CURLE_RTSP_CSEQ_ERROR',
        86 => 'CURLE_RTSP_SESSION_ERROR',
        87 => 'CURLE_FTP_BAD_FILE_LIST',
        88 => 'CURLE_CHUNK_FAILED'
    ];

    private static $http_error =
        [
            400 => 'Bad Request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Server error'
        ];

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        $this->RegisterAttributeString(self::Attribute_PrivateKey, '');
        $this->RegisterAttributeString(self::Attribute_PublicKey, '');
        $this->RegisterAttributeString(self::Attribute_MyCert, '');
        $this->RegisterPropertyBoolean(\BoschSHC\Property::IO_Property_Open, false);
        $this->RegisterPropertyString(\BoschSHC\Property::IO_Property_Host, '');
        $this->RegisterTimer(self::TIMER_LongPoll, 0, 'IPS_RequestAction(' . $this->InstanceID . ',"PollLong",true);');
        $this->Host = '';
        $this->ClientId = '';
        $this->ClientName = '';
        $this->isPaired = false;
        $this->SHCPollId = '';
        $this->TempFilecert = '';
        $this->TempFileprivatekey = '';
    }

    public function Destroy()
    {
        // Todo -> Buffer schon weg, somit kein Unsubscribe möglich :(
        /*if ($this->SHCPollId != '') {
            $this->Unsubscribe();
        }*/
        //Never delete this line!
        parent::Destroy();
    }

    public function ApplyChanges()
    {
        if ($this->SHCPollId != '') {
            $this->Unsubscribe();
        }
        $this->SetTimerInterval(self::TIMER_LongPoll, 0);
        $this->ClientId = self::IPS_ClientID_Prefix . (string) $this->InstanceID;
        $this->ClientName = self::IPS_ClientName_Prefix . IPS_GetName(0);
        $this->Host = '';
        $this->isPaired = false;
        $this->SHCPollId = '';
        $this->SetStatus(IS_INACTIVE);
        $this->SetSummary($this->ReadPropertyString(\BoschSHC\Property::IO_Property_Host));
        //Never delete this line!
        parent::ApplyChanges();
        if (!$this->ReadPropertyBoolean(\BoschSHC\Property::IO_Property_Open)) {
            $this->LogMessage($this->Translate('Connection closed'), KL_MESSAGE);
            return;
        }
        if (!$this->ReadAttributeString(self::Attribute_MyCert)) {
            if (!$this->CreateNewCert()) {
                $this->SetStatus(self::IS_NoCert);
                return;
            }
        }
        $this->Host = 'https://' . $this->ReadPropertyString(\BoschSHC\Property::IO_Property_Host);
        if ($this->CheckSHC()) {
            if ($this->isPaired) {
                $this->StartConnection();
            }
        }
    }

    public function GetConfigurationForm()
    {
        $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
        if ($this->GetStatus() == IS_CREATING) {
            return json_encode($Form);
        }
        if ($this->GetStatus() == self::IS_NotPaired) {
            $Form['actions'][1]['visible'] = true;
        }
        $this->SendDebug('FORM', json_encode($Form), 0);
        $this->SendDebug('FORM', json_last_error_msg(), 0);
        return json_encode($Form);
    }

    public function RequestAction($Ident, $Value)
    {
        switch ($Ident) {
                case 'CheckSHC':
                    $this->UpdateFormField('CheckSHCResult', 'caption', ($this->CheckSHC() ? 'OK' : $this->Translate('Controller not reachable.')));
                    $this->UpdateFormField('NoConnectPopup', 'visible', true);
                    return;
                case 'PollLong':
                    $this->PollLong();
                    return;
                case 'RequestAllStates':
                   $this->RequestAllStates();
                   $this->RequestAllAutomationRules();
                   $this->RequestWaterAlarmSystemState();
                    return;
                }
    }

    public function ForwardData($JSONString)
    {
        switch ($this->GetStatus()) {
            case IS_ACTIVE:
                break;
            case IS_INACTIVE:
                set_error_handler([$this, 'ModulErrorHandler']);
                trigger_error($this->Translate('Instance is inactive'), E_USER_WARNING);
                restore_error_handler();
                return serialize(false);
            default:
                set_error_handler([$this, 'ModulErrorHandler']);
                trigger_error($this->Translate('Instance is in error state'), E_USER_WARNING);
                restore_error_handler();
                return serialize(false);
        }
        $Data = json_decode($JSONString, true);
        $Result = $this->SendRequest(
            self::SHC_Api . $Data[\BoschSHC\FlowToParent::Call],
            $Data[\BoschSHC\FlowToParent::Method],
            $Data[\BoschSHC\FlowToParent::Payload]
        );
        return ($Result !== false) ? serialize($Result) : null;
    }

    public function StartPairing(string $Password)
    {
        $Header = ['Systempassword: ' . base64_encode($Password)];
        $cert = str_replace(
            [
                "\r",
                "\n",
                '-----BEGIN CERTIFICATE-----',
                '-----END CERTIFICATE-----'
            ],
            [
                '',
                '',
                "-----BEGIN CERTIFICATE-----\r",
                "\r-----END CERTIFICATE-----"
            ],
            $this->ReadAttributeString(self::Attribute_MyCert)
        );

        $Payload = json_encode(
            [
                '@type'       => 'client',
                'id'          => $this->ClientId,
                'name'        => $this->ClientName,
                'primaryRole' => 'ROLE_RESTRICTED_CLIENT',
                'certificate' => $cert
            ]
        );
        $result = $this->SendRequest(self::SHC_Client, \BoschSHC\HTTP::POST, $Payload, 5000, $Header);
        if ($result) {
            $this->isPaired = true;
            $this->SendDebug('PairState', $this->isPaired, 0);
            $this->StartConnection();
            return 'MESSAGE:' . $this->Translate('Paring with SHC complete.');
        }
        return $this->Translate('Paring error! Button pressed? Password correct?');
    }

    protected function ModulErrorHandler($errno, $errstr)
    {
        echo $errstr . PHP_EOL;
    }
    private function DecodeAndSendToChildren(string $Type, array $Data)
    {
        switch ($Type) {
            case \BoschSHC\EventTypes::DeviceServiceData:
                if (!isset($Data['deviceId'])) {
                    $this->LogMessage("Data without DeviceId:\r\n" . print_r($Data, true), KL_ERROR);
                }
                $DeviceId = $Data['deviceId'];
                unset($Data['deviceId']);
                $this->SendDebug('Device', $DeviceId, 0);
                $this->SendDebug('Device Data', $Data, 0);
                $JSON = json_encode(
                    [
                        \BoschSHC\FlowToDevice::DataID   => \BoschSHC\GUID::SendToDevice,
                        \BoschSHC\FlowToDevice::DeviceId => $DeviceId,
                        \BoschSHC\FlowToDevice::Event    => $Data
                    ]
                );
                $this->SendDataToChildren($JSON);
                return;
            case \BoschSHC\EventTypes::WaterAlarmSystemState:
                $this->SendDebug('Data', $Data, 0);
                $JSON = json_encode(
                    [
                        \BoschSHC\FlowToDevice::DataID   => \BoschSHC\GUID::SendToWaterAlarmSystem,
                        \BoschSHC\FlowToDevice::Event    => $Data
                    ]
                );
                $this->SendDataToChildren($JSON);
                return;
            case \BoschSHC\EventTypes::AutomationRule:
                if (!isset($Data['id'])) {
                    $this->LogMessage("Data without id:\r\n" . print_r($Data, true), KL_ERROR);
                }
                $RuleId = $Data['id'];
                unset($Data['id']);
                $this->SendDebug('RuleId', $RuleId, 0);
                $this->SendDebug('Rule Data', $Data, 0);
                $JSON = json_encode(
                    [
                        \BoschSHC\FlowToAutomationRule::DataID   => \BoschSHC\GUID::SendToAutomationRule,
                        \BoschSHC\FlowToAutomationRule::RuleId   => $RuleId,
                        \BoschSHC\FlowToAutomationRule::Event    => $Data
                    ]
                );
                $this->SendDataToChildren($JSON);
                return;
            case \BoschSHC\EventTypes::ScenarioTriggered:
                if (!isset($Data['id'])) {
                    $this->LogMessage("Data without id:\r\n" . print_r($Data, true), KL_ERROR);
                }
                $ScenarioId = $Data['id'];
                unset($Data['id']);
                $this->SendDebug('ScenarioId', $ScenarioId, 0);
                $this->SendDebug('Scenario Data', $Data, 0);
                $JSON = json_encode(
                    [
                        \BoschSHC\FlowToScenarios::DataID     => \BoschSHC\GUID::SendToScenarios,
                        \BoschSHC\FlowToScenarios::ScenarioId => $ScenarioId,
                        \BoschSHC\FlowToScenarios::Event      => $Data
                    ]
                );
                $this->SendDataToChildren($JSON);
                return;
            case \BoschSHC\EventTypes::Message:
                $this->SendDebug('Message Data', $Data, 0);
                $JSON = json_encode(
                    [
                        \BoschSHC\FlowToMessages::DataID     => \BoschSHC\GUID::SendToMessages,
                        \BoschSHC\FlowToMessages::Event      => $Data
                    ]
                );
                $this->SendDataToChildren($JSON);
                return;
            case \BoschSHC\EventTypes::Room: //ignore
            case \BoschSHC\EventTypes::Device: //ignore
            case \BoschSHC\EventTypes::WaterAlarmSystemConfiguration: //ignore
            case \BoschSHC\EventTypes::EmergencySystemServiceData: // ignore
            case \BoschSHC\EventTypes::EmergencySupportServiceData: //ignore
            case \BoschSHC\EventTypes::Client: //ignore
                return;
            }
        $this->LogMessage("Data with unhandled EventTypes:\r\n" . print_r($Data, true), KL_ERROR);
        $this->SendDebug('Event with unknown Data', $Data, 0);
    }
    private function RequestAllStates()
    {
        $Services = $this->SendRequest(self::SHC_Api . \BoschSHC\ApiUrl::Services);
        if (!$Services) {
            return false;
        }
        foreach (json_decode($Services, true) as $Service) {
            $this->DecodeAndSendToChildren(\BoschSHC\EventTypes::DeviceServiceData, $Service);
        }
    }

    private function RequestAllAutomationRules()
    {
        $Rules = $this->SendRequest(self::SHC_Api . \BoschSHC\ApiUrl::AutomationRules);
        if (!$Rules) {
            return false;
        }
        foreach (json_decode($Rules, true) as $Rule) {
            $this->DecodeAndSendToChildren(\BoschSHC\EventTypes::AutomationRule, $Rule);
        }
    }
    private function RequestWaterAlarmSystemState()
    {
        $WaterAlarmSystemState = $this->SendRequest(self::SHC_Api . \BoschSHC\ApiUrl::WaterAlarm);
        if (!$WaterAlarmSystemState) {
            return false;
        }
        $this->DecodeAndSendToChildren(\BoschSHC\EventTypes::WaterAlarmSystemState, json_decode($WaterAlarmSystemState, true));
    }
    private function Subscribe()
    {
        // send subscribe
        $Payload = json_encode([
            'jsonrpc' => '2.0',
            'method'  => 'RE/subscribe',
            'params'  => ['com/bosch/sh/remote/*', null]

        ]);
        $Result = $this->SendRequest(self::SHC_Poll, \BoschSHC\HTTP::POST, $Payload);
        if ($Result) {
            $SHCPollId = json_decode($Result, true)['result'];
            $this->SendDebug('Subscribe successfully', $SHCPollId, 0);
            $this->SHCPollId = $SHCPollId;  //set  PollingId
                IPS_RunScriptText('IPS_RequestAction(' . $this->InstanceID . ',"PollLong",true);'); // start long polling loop
        }
        return $Result ? true : false;
    }

    private function PollLong()
    {
        if ($this->SHCPollId == '') {
            return; // not more subscribed -> exit IPS_RunScriptText PollLong loop
        }
        $this->SendDebug('START PollLong', '', 0);
        $Payload = json_encode([
            'jsonrpc' => '2.0',
            'method'  => 'RE/longPoll',
            'params'  => [$this->SHCPollId, 5] //Long poll for 5 seconds
        ]);
        $Result = $this->SendRequest(self::SHC_Poll, \BoschSHC\HTTP::POST, $Payload, 6000); //6 seconds timeout
        if (!$Result) {
            $this->SendDebug('ABORT PollLong -> Resubscribe', $Result, 0);
            if ($this->Subscribe()) { // new loop start in Subscribe()
                return;
            } //No Subscribe possible -> Connection lost :(
            $this->LogMessage($this->Translate('Connection lost'), KL_ERROR);
            $this->SendDebug('Connection lost', '', 0);
            $this->SendDebug('END PollLong', $Result, 0);
            $this->SHCPollId = '';
            $this->SetStatus(self::IS_ConnectionLost);
            return;
        }
        $Events = json_decode($Result, true)['result'];
        try {
            foreach ($Events as $Event) {
                $this->DecodeAndSendToChildren($Event['@type'], $Event);
            }
        } catch (\Throwable $th) {
            $this->LogMessage($th->getMessage(), KL_ERROR);
        }
        $this->SendDebug('END PollLong', $Result, 0);
        IPS_RunScriptText('IPS_RequestAction(' . $this->InstanceID . ',"PollLong",true);');
    }

    private function Unsubscribe()
    {
        // send unsubscribe
        $Payload = json_encode([
            'jsonrpc' => '2.0',
            'method'  => 'RE/unsubscribe',
            'params'  => [$this->SHCPollId]
        ]);
        $this->SHCPollId = ''; //delete PollingId
        $Result = $this->SendRequest(self::SHC_Poll, \BoschSHC\HTTP::POST, $Payload);
        $this->SendDebug('Unsubscribe Result', $Result, 0);
        return $Result ? true : false;
    }

    private function CheckSHC()
    {
        if ($this->Host == '') {
            return false;
        }
        $result = $this->SendRequest(self::SHC_Info);
        if (!$result) {
            $this->SHCPollId = '';
            $this->SetStatus(self::IS_NotReachable);
            return false;
        }
        $json = json_decode($result, true);
        $isPaired = in_array($this->ClientId, $json['clientIds']);
        $this->isPaired = $isPaired;
        $this->SendDebug('PairState', $isPaired, 0);
        if (!$isPaired) {
            $this->UpdateFormField('PairingPopup', 'visible', true);
            $this->SetStatus(self::IS_NotPaired);
        }
        return true;
    }

    private function StartConnection()
    {
        $this->SetStatus(IS_ACTIVE);
        $this->LogMessage($this->Translate('Connection established'), KL_MESSAGE);
        $this->Subscribe();
        IPS_RunScriptText('IPS_RequestAction(' . $this->InstanceID . ',"RequestAllStates",true);');
    }

    private function GetTempFile(string $Type)
    {
        if ($this->{'TempFile' . $Type} != '') {
            if (file_exists($this->{'TempFile' . $Type})) {
                return $this->{'TempFile' . $Type};
            }
        }
        $TmpFileName = tempnam('', $Type);

        $handle = fopen($TmpFileName, 'w');
        fwrite($handle, $this->ReadAttributeString($Type));
        fclose($handle);
        $this->{'TempFile' . $Type} = $TmpFileName;
        return $TmpFileName;
    }

    private function SendRequest(string $RequestURL, string $RequestMethod = \BoschSHC\HTTP::GET, string $Payload = '', int $Timeout = 5000, array $RequestHeader = [])
    {
        if (!$this->Host) {
            return false;
        }
        $CurlURL = $this->Host . $RequestURL;
        $this->SendDebug('RequestMethod', $RequestMethod, 0);
        $this->SendDebug('RequestURL', $CurlURL, 0);
        $this->SendDebug('RequestHeader', $RequestHeader, 0);
        $this->SendDebug('RequestData', $Payload, 0);

        $Headers = array_merge([
            'Method: ' . $RequestMethod,
            'Connection: keep-alive',
            'User-Agent: Symcon BSHC-Lib by Nall-chan',
            'Content-Type: application/json',
        ], $RequestHeader);
        $ch = curl_init($CurlURL);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_CAINFO, dirname(__DIR__) . '/libs/Cert/Smart Home Controller CA chain.crt');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        if (($RequestURL != self::SHC_Client) && ($RequestURL != self::SHC_Info)) {
            curl_setopt($ch, CURLOPT_SSLCERT, $this->GetTempFile(self::Attribute_MyCert));
            curl_setopt($ch, CURLOPT_SSLKEY, $this->GetTempFile(self::Attribute_PrivateKey));
            curl_setopt($ch, CURLOPT_SSLKEYPASSWD, IPS_GetLicensee());
        }
        if ($Payload) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $Payload);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $Headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $RequestMethod);

        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, $Timeout);
        $response = curl_exec($ch);

        $HttpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($HttpCode != 0) {
            $this->SendDebug('Request Headers', curl_getinfo($ch)['request_header'], 0);
        }
        $this->SendDebug('RAW Response', $response, 0);
        $curl_errno = curl_errno($ch);
        curl_close($ch);
        $Header = '';
        $Result = '';
        if (!is_bool($response)) {
            $Parts = explode("\r\n\r\n", $response);
            $Header = array_shift($Parts);
            $Result = implode("\r\n\r\n", $Parts);
        }
        $this->SendDebug('Result Headers', $Header, 0);
        $this->SendDebug('Result Body', $Result, 0);
        set_error_handler([$this, 'ModulErrorHandler']);
        switch ($HttpCode) {
                case 0:
                    $this->SendDebug('CURL ERROR', self::$CURL_error_codes[$curl_errno], 0);
                    trigger_error(self::$CURL_error_codes[$curl_errno], E_USER_WARNING);
                    $Result = false;
                break;
                case 204:
                    if (($RequestMethod == \BoschSHC\HTTP::PUT) || ($RequestMethod == \BoschSHC\HTTP::DELETE)) {
                        $Result = true;
                    }
                break;
                case 400:
                case 401:
                case 403:
                case 404:
                case 405:
                case 500:
                    $this->SendDebug(self::$http_error[$HttpCode], $HttpCode, 0);
                    trigger_error(self::$http_error[$HttpCode], E_USER_WARNING);
                    $Result = false;
                break;
            }
        restore_error_handler();
        return $Result;
    }

    private function CreateNewCert()
    {
        $this->SendDebug('CreateNewCert', 'start', 0);
        $basedir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $this->InstanceID;
        $configfile = $basedir . '.cnf';
        $newLine = "\r\n";
        $strCONFIG = 'default_md = sha256' . $newLine;
        $strCONFIG .= 'default_days = 3650' . $newLine;
        $strCONFIG .= $newLine;
        $strCONFIG .= '[ req ]' . $newLine;
        $strCONFIG .= 'default_bits = 2048' . $newLine;
        $strCONFIG .= 'distinguished_name = req_DN' . $newLine;
        $strCONFIG .= 'string_mask = nombstr' . $newLine;
        $strCONFIG .= 'prompt = no' . $newLine;
        $strCONFIG .= $newLine;
        $strCONFIG .= '[ req_DN ]' . $newLine;
        $strCONFIG .= '0.organizationName = "' . $this->ClientName . '"' . $newLine;
        $strCONFIG .= 'commonName = "' . $this->ClientName . '"' . $newLine;
        $strCONFIG .= $newLine;
        $fp = fopen($configfile, 'w');
        fwrite($fp, $strCONFIG);
        fclose($fp);
        $dn = [
            'organizationName'       => $this->ClientName,
            'commonName'             => $this->ClientName,
            'emailAddress'           => IPS_GetLicensee()
        ];
        $config = [
            'config'      => $configfile,
            //'encrypt_key' => true
        ];

        $configKey = [
            'config'           => $configfile,
            'private_key_bits' => 2048,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
        ];
        $pkGenerate = openssl_pkey_new($configKey);
        openssl_pkey_export($pkGenerate, $pkGeneratePrivate, IPS_GetLicensee(), $config);
        $pkGeneratePublic = openssl_pkey_get_details($pkGenerate)['key'];
        $csr = openssl_csr_new($dn, $pkGenerate, $config);
        if ($csr === false) {
            $this->SendDebug('error in ', 'openssl_csr_new', 0);
            unlink($configfile);
            return false;
        }
        $cert = openssl_csr_sign($csr, null, $pkGenerate, 730, $config);
        if ($cert === false) {
            $this->SendDebug('error in ', 'openssl_csr_sign', 0);
            unlink($configfile);
            return false;
        }
        if (!openssl_x509_export($cert, $certout)) {
            $this->SendDebug('error in ', 'openssl_x509_export', 0);
            unlink($configfile);
            return false;
        }
        unlink($configfile);
        //Prepare for JSON Payload
        $this->WriteAttributeString(self::Attribute_PrivateKey, $pkGeneratePrivate);
        $this->WriteAttributeString(self::Attribute_PublicKey, $pkGeneratePublic);
        $this->WriteAttributeString(self::Attribute_MyCert, $certout);
        $this->SendDebug('CreateNewCert ', 'finish', 0);
        return true;
    }
}
