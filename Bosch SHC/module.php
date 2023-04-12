<?php

declare(strict_types=1);

eval('declare(strict_types=1);namespace BoschSHC {?>' . file_get_contents(__DIR__ . '/../libs/helper/AttributeArrayHelper.php') . '}');
/*eval('declare(strict_types=1);namespace BoschSHC {?>' . file_get_contents(__DIR__ . '/../libs/helper/WebhookHelper.php') . '}');*/
eval('declare(strict_types=1);namespace BoschSHC {?>' . file_get_contents(__DIR__ . '/../libs/helper/BufferHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHC {?>' . file_get_contents(__DIR__ . '/../libs/helper/DebugHelper.php') . '}');
eval('declare(strict_types=1);namespace BoschSHC {?>' . file_get_contents(__DIR__ . '/../libs/helper/SemaphoreHelper.php') . '}');
/**
 * @property string $Host
 * @property string $ClientId
 * @property string $ClientName
 * @property bool $isPaired
 */
    class BoschSHC extends IPSModule
    {
        use \BoschSHC\AttributeArrayHelper;
        use \BoschSHC\BufferHelper;
        use \BoschSHC\DebugHelper;
        use \BoschSHC\Semaphore;

        const IS_NotReachable = IS_EBASE + 1;
        const IS_NotPaired = IS_EBASE + 2;
        const IS_NoCert = IS_EBASE + 3;
        const SHC_Info = ':8446/smarthome/public/information';
        const SHC_Client = ':8443/smarthome/clients';
        const HTTP_GET = 'GET';
        const HTTP_POST = 'POST';

        public function Create()
        {
            //Never delete this line!
            parent::Create();
            $this->RequireParent('{4CB91589-CE01-4700-906F-26320EFCF6C4}');
            $this->RegisterAttributeString('privatekey', '');
            $this->RegisterAttributeString('publickey', '');
            $this->RegisterAttributeString('cert', '');
            $this->RegisterPropertyBoolean('Open', false);
            $this->RegisterPropertyString('Host', '');
            $this->RegisterPropertyString('Password', '');
            $this->Host = '';
            $this->ClientId = '';
            $this->ClientName = '';
            $this->isPaired = false;
        }

        public function Destroy()
        {
            //Never delete this line!
            parent::Destroy();
        }

        public function ApplyChanges()
        {
            //Never delete this line!
            $this->ClientId = 'oss_Nall-chan_' . (string) $this->InstanceID;
            $this->ClientName = 'OSS ' . IPS_GetName(0);
            $this->Host = '';
            $this->isPaired = false;
            parent::ApplyChanges();
            if (!$this->ReadPropertyBoolean('Open')) {
                $this->SetStatus(IS_INACTIVE);
                return;
            }
            if (!$this->ReadAttributeString('cert')) {
                if (!$this->CreateNewCert()) {
                    $this->SetStatus(self::IS_NoCert);
                    return;
                }
            }
            $this->Host = 'https://' . $this->ReadPropertyString('Host');
            if (!$this->CheckSHC()) {
                $this->SetStatus(self::IS_NotReachable);
            }
        }
        public function GetConfigurationForm()
        {
            $Form = json_decode(file_get_contents(__DIR__ . '/form.json'), true);
            if ($this->GetStatus() == self::IS_NotPaired) {
                $Form['actions'][1]['visible'] = true;
            }
            $this->SendDebug('FORM', json_encode($Form), 0);
            $this->SendDebug('FORM', json_last_error_msg(), 0);
            return json_encode($Form);
        }
        public function GetConfigurationForParent()
        {
            return '{"Active":true,"AuthPass":"","AuthType":0,"AuthUser":"","Interval":0,"URL":"","UseBasicAuth":false,"VerifyHost":false,"VerifyPeer":false}';
        }
        public function RequestAction($Ident, $Value)
        {
            switch ($Ident) {
                    case 'CheckSHC':
                        $this->CheckSHC();
                        return;
                }
        }
        public function ForwardData($JSONString)
        {
            $data = json_decode($JSONString);
            IPS_LogMessage('Splitter FRWD', utf8_decode($data->Buffer . ' - ' . $data->RequestMethod . ' - ' . $data->RequestURL . ' - ' . $data->RequestData . ' - ' . $data->Timeout));

            $this->SendDataToParent(json_encode(['DataID' => '{D4C1D08F-CD3B-494B-BE18-B36EF73B8F43}', 'Buffer' => $data->Buffer, $data->RequestMethod, $data->RequestURL, $data->RequestData, $data->Timeout]));

            return 'String data for device instance!';
        }

        public function ReceiveData($JSONString)
        {
            $data = json_decode($JSONString);
            IPS_LogMessage('Splitter RECV', utf8_decode($data->Buffer . ' - ' . $data->RequestMethod . ' - ' . $data->RequestURL . ' - ' . $data->RequestData . ' - ' . $data->Timeout));

            $this->SendDataToChildren(json_encode(['DataID' => '{182D359D-1C4A-5B7B-2402-54D7B2575C23}', 'Buffer' => $data->Buffer, $data->RequestMethod, $data->RequestURL, $data->RequestData, $data->Timeout]));
        }
        public function StartPairing()
        {
            $Header = ['Systempassword: ' . base64_encode($this->ReadPropertyString('Password'))];
            $Payload = json_encode(
                [
                    '@type'       => 'client',
                    'id'          => $this->ClientId,
                    'name'        => $this->ClientName,
                    'primaryRole' => 'ROLE_RESTRICTED_CLIENT',
                    'certificate' => $this->ReadAttributeString('cert')
                ]
            );
            $result = $this->SendRequest(self::HTTP_POST, $this->Host . self::SHC_Client, $Payload, 5000, $Header);
            if ($result) {
                return 'MESSAGE:Paring with SHC complete.';
            }
            return 'Paring error! Password correct?';
        }
        private function CheckSHC()
        {
            $result = $this->SendRequest(self::HTTP_GET, $this->Host . self::SHC_Info);
            if (!$result) {
                return false;
            }
            $json = json_decode($result, true);
            $this->RegisterVariableString('Firmware', 'Firmware', '', 0);
            $this->SetValue('Firmware', $json['softwareUpdateState']['swInstalledVersion']);
            $isPaired = in_array($this->ClientId, $json['clientIds']);
            $this->isPaired = $isPaired;
            $this->SendDebug('PairState', $isPaired, 0);
            if ($isPaired) {
                $this->SetStatus(IS_ACTIVE);
            } else {
                $this->UpdateFormField('PairingPopup', 'visible', true);
                $this->SetStatus(self::IS_NotPaired);
            }

            return true;
        }
        private function SendRequest(string $RequestMethod, string $RequestURL, string $RequestData = '', int $Timeout = 5000, array $Headers = [])
        {
            if (!$this->Host) {
                return false;
            }
            $this->SendDebug('RequestMethod', $RequestMethod, 0);
            $this->SendDebug('RequestURL', $RequestURL, 0);
            $this->SendDebug('RequestData', $RequestData, 0);

            $Headers = array_merge([
                'Method: ' . $RequestMethod,
                'Connection: keep-alive',
                'User-Agent: Symcon BSHC-Lib by Nall-chan',
                'Content-Type: application/json',
            ], $Headers);

            $ch = curl_init($RequestURL);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $Headers);
            if ($RequestMethod == self::HTTP_GET) {
                curl_setopt($ch, CURLOPT_HTTPGET, true);
                //todo Data als Query?
            }
            if ($RequestMethod == self::HTTP_POST) {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $RequestData);
            }
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);

            $response = curl_exec($ch);
            $http_code = curl_getinfo($ch)['http_code'];
            if ($http_code != 0) {
                $this->SendDebug('Request Headers', curl_getinfo($ch)['request_header'], 0);
            }
            $this->SendDebug('RAW Response', $response, 0);
            $curl_errno = curl_errno($ch);
            if ($curl_errno) {
                throw new \Exception(curl_error($ch), $curl_errno);
                return false;
            }
            $header = '';
            if (!is_bool($response)) {
                $Parts = explode("\r\n\r\n", $response);
                $header = array_shift($Parts);
                $response = implode("\r\n\r\n", $Parts);
            }
            $this->SendDebug('Response Headers', $header, 0);

            if ($http_code > 400) {
                throw new \Exception($http_code . ' ' . explode("\r\n", $header)[0]);
                return false;
            }

            /*
            Keine Header möglich und wie funktioniert RequestData?
            $result = $this->SendDataToParent(json_encode([
                'DataID'        => '{D4C1D08F-CD3B-494B-BE18-B36EF73B8F43}',
                'RequestMethod' => utf8_encode($RequestMethod),
                'RequestURL'    => utf8_encode($RequestURL),
                'RequestData'   => utf8_encode($RequestData),
                'Timeout'       => $Timeout
            ]));*/

            $this->SendDebug('Result', $response, 0);
            return $response;
        }

        /**
         * Erzeugt ein selbst-signiertes Zertifikat.
         *
         * @return bool True bei Erflog, sonst false
         */
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
                'encrypt_key' => true];

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
                $certout
            );
            $this->WriteAttributeString('privatekey', $pkGeneratePrivate);
            $this->WriteAttributeString('publickey', $pkGeneratePublic);
            $this->WriteAttributeString('cert', $cert);
            $this->SendDebug('CreateNewCert ', 'finish', 0);
            return true;
        }
    }

