<?php

declare(strict_types=1);
    class BoschSmartHomeDevice extends IPSModule
    {
        public function Create()
        {
            //Never delete this line!
            parent::Create();

            $this->RequireParent('{8D1D21A7-FDE3-EB16-B5B3-6D38D0673B62}');
        }

        public function Destroy()
        {
            //Never delete this line!
            parent::Destroy();
        }

        public function ApplyChanges()
        {
            //Never delete this line!
            parent::ApplyChanges();
        }

        public function Send()
        {
            $this->SendDataToParent(json_encode(['DataID' => '{FCC91718-B5E6-FD03-A393-7BAF6E4A7EEF}']));
        }

        public function ReceiveData($JSONString)
        {
            $data = json_decode($JSONString);
            IPS_LogMessage('Device RECV', utf8_decode($data->Buffer));
        }
    }