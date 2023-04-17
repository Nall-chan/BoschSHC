<?php

declare(strict_types=1);

namespace BoschSHC
{
    class Services
    {
        const PowerMeter = 'PowerMeter';
        const PowerSwitch = 'PowerSwitch';
        const PowerSwitchProgram = 'PowerSwitchProgram';
        const RoomClimateControl = 'RoomClimateControl';
        const TemperatureLevel = 'TemperatureLevel';
        const ShutterContact = 'ShutterContact';
        const LatestMotion = 'LatestMotion';
        const HCWasher = 'HCWasher';
        const HCDishwasher = 'HCDishwasher';
        const HCOven = 'HCOven';
        const PrivacyMode = 'PrivacyMode';
        const ShutterControl = 'ShutterControl';
        const SmokeDetectorCheck = 'SmokeDetectorCheck';
        const ValveTappet = 'ValveTappet';
        const AirQualityLevel = 'AirQualityLevel';
        const Keypad = 'Keypad';
        const HumidityLevel = 'HumidityLevel';
        const CameraLight = 'CameraLight';
        protected static $Services = [
            self::PowerMeter,
            self::PowerSwitch,
            self::PowerSwitchProgram,
            self::RoomClimateControl,
            self::TemperatureLevel,
            self::ShutterContact,
            self::LatestMotion,
            self::HCWasher,
            self::HCDishwasher,
            self::HCOven,
            self::PrivacyMode,
            self::ShutterControl,
            self::SmokeDetectorCheck,
            self::ValveTappet,
            self::AirQualityLevel,
            self::Keypad,
            self::HumidityLevel,
            self::CameraLight,
        ];
        public static function ServiceIsValid(array $Service)
        {
            return in_array($Service['id'], self::$Services);
        }
        public static function getServiceIdByProperty(string $Property)
        {
            foreach (self::$Services as $ServiceId) {
                if (
                    ('\\BoschSHC\\Services\\' . $ServiceId)::PropertyIsValid($Property) &&
                    ('\\BoschSHC\\Services\\' . $ServiceId)::PropertyHasAction($Property)
                ) {
                    return $ServiceId;
                }
            }
            return false;
        }
    }
}

namespace BoschSHC\Services
{

    use BoschSHC\Services;

    const IPSProfile = 'Profile';
    const IPSVarType = 'VarType';
    const IPSVarFactor = 'Factor';
    const IPSVarName = 'VarName';
    const IPSVarValue = 'VarValue';
    const IPSVarAction = 'VarAction';
    abstract class ServiceBasics
    {
        protected static $properties = [];
        protected static $state = 'State';
        public static function PropertyIsValid(string $Property)
        {
            return isset(static::$properties[$Property]);
        }
        public static function PropertyHasAction(string $Property)
        {
            return static::getIPSAction($Property);
        }
        public static function getServiceStateRequest(string $Property, $Value)
        {
            $VarType = static::getIPSVarType($Property);
            $Factor = isset(static::$properties[$Property][IPSVarFactor]) ?
                      static::$properties[$Property][IPSVarFactor] :
                      1;
            switch ($VarType) {
                case VARIABLETYPE_FLOAT:
                case VARIABLETYPE_INTEGER:
                    $Request[$Property] = $Value * $Factor;
                    break;
                default:
                    if (isset(static::$properties[$Property]['enum'])) {
                        $Request[$Property] = static::$properties[$Property]['enum'][$Value];
                    } else {
                        $Request[$Property] = $Value;
                    }
                    break;
            }
            if (static::$properties[$Property]['type'] == 'string') {
                $Request[$Property] = (string) $Request[$Property];
            }
            $Request['@type'] = static::getServiceState();
            return json_encode($Request);
        }
        public static function getIPSVariable(string $Property, $Value)
        {
            $Result[IPSVarType] = static::getIPSVarType($Property);
            $Factor = isset(static::$properties[$Property][IPSVarFactor]) ?
                      static::$properties[$Property][IPSVarFactor] :
                      1;
            switch ($Result[IPSVarType]) {
                case VARIABLETYPE_FLOAT:
                    $Result[IPSVarValue] = $Value / $Factor;
                    break;
                case VARIABLETYPE_INTEGER:
                    $Result[IPSVarValue] = intval($Value / $Factor);
                    break;
                default:
                    if (isset(static::$properties[$Property]['enum'])) {
                        $Result[IPSVarValue] = array_search($Value, static::$properties[$Property]['enum']);
                    } else {
                        $Result[IPSVarValue] = $Value;
                    }
                    break;
            }
            $Result[IPSProfile] = static::getIPSProfile($Property);
            $Result[IPSVarName] = static::getIPSName($Property);
            $Result[IPSVarAction] = static::getIPSAction($Property);
            return $Result;
        }
        public static function getIPSProfile(string $Property)
        {
            return
                isset(static::$properties[$Property][IPSProfile]) ?
                static::$properties[$Property][IPSProfile] :
                '';
        }
        protected static function getServiceState()
        {
            return lcfirst(explode('\\', get_called_class())[2]) . static::$state;
        }
        private static function getIPSName(string $Property)
        {
            return
                isset(static::$properties[$Property][IPSVarName]) ?
                static::$properties[$Property][IPSVarName] :
                $Property;
        }
        private static function getIPSVarType(string $Property)
        {
            return
                isset(static::$properties[$Property][IPSVarType]) ?
                static::$properties[$Property][IPSVarType] :
                VARIABLETYPE_STRING;
        }
        private static function getIPSAction(string $Property)
        {
            return
                isset(static::$properties[$Property][IPSVarAction]) ?
                static::$properties[$Property][IPSVarAction] :
                false;
        }
    }
    class PowerMeter extends ServiceBasics
    {
        protected static $properties = [
            'powerConsumption' => [
                'type'       => 'number',
                IPSVarFactor => 1000,
                IPSProfile   => '~Watt',
                IPSVarType   => VARIABLETYPE_FLOAT,
                IPSVarName   => 'Power consumption'
            ],
            'energyConsumption' => [
                'type'       => 'number',
                IPSVarFactor => 1000,
                IPSProfile   => '~Electricity',
                IPSVarType   => VARIABLETYPE_FLOAT,
                IPSVarName   => 'Energy consumption'
            ],
        ];
    }
    class PowerSwitch extends ServiceBasics
    {
        protected static $properties = [
            'switchState' => [
                'type' => 'string',
                'enum' => [
                    true   => 'ON',
                    false  => 'OFF',
                ],
                IPSProfile   => '~Switch',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Switch'
            ]
        ];
    }
    class PowerSwitchProgram extends ServiceBasics
    {
        protected static $properties = [
            'operationMode' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.PowerSwitchProgram.operationMode',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Operation mode'
            ]
        ];
    }
    class RoomClimateControl extends ServiceBasics
    {
        protected static $properties = [
            'setpointTemperature' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.PowerSwitchProgram.setpointTemperature',
                IPSVarType   => VARIABLETYPE_FLOAT,
                IPSVarAction => true,
                IPSVarName   => 'Setpoint temperature'
            ]
        ];
    }
    class TemperatureLevel extends ServiceBasics
    {
        protected static $properties = [
            'temperature' => [
                'type'       => 'number',
                IPSProfile   => '~Temperature',
                IPSVarType   => VARIABLETYPE_FLOAT,
                IPSVarName   => 'Current temperature'
            ]
        ];
    }
    class ShutterContact extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type' => 'string',
                'enum' => [
                    true   => 'CLOSED',
                    false  => 'OPEN',
                ],
                IPSProfile   => '~Window.Reversed',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'State'
            ]
        ];
    }
    class LatestMotion extends ServiceBasics
    {
        protected static $properties = [
            'latestMotionDetected' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'latest motion detected'
            ]
        ];
    }
    class HCWasher extends ServiceBasics
    {
        protected static $properties = [
            'operationState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.HCWasher.operationState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Operation state'
            ],
            'remoteControlStartAllowed' => [
                'type'       => 'bool',
                IPSProfile   => '~Switch',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Remote control start allowed'
            ]
        ];
    }
    class HCDishwasher extends ServiceBasics
    {
        protected static $properties = [
            'operationState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.HCDishwasher.operationState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Operation state'
            ],
            'remoteControlStartAllowed' => [
                'type'       => 'bool',
                IPSProfile   => '~Switch',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Remote control start allowed'
            ]
        ];
    }
    class HCOven extends ServiceBasics
    {
        protected static $properties = [
            'operationState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.HCOven.operationState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Operation state'
            ],
            'remoteControlStartAllowed' => [
                'type'       => 'bool',
                IPSProfile   => '~Switch',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Remote control start allowed'
            ]

        ];
    }
    class PrivacyMode extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type' => 'string',
                'enum' => [
                    false => 'ENABLED',
                    true  => 'DISABLED',
                ],
                IPSProfile   => '~Switch',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Privacy mode']
        ];
    }
    class ShutterControl extends ServiceBasics
    {
        protected static $properties = [
            'level' => [
                'type'       => 'string',
                IPSVarFactor => 0.01,
                IPSProfile   => '~Shutter',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Level']
            // operationState
            // STOPPED, ..., ... ???
        ];
    }
    class SmokeDetectorCheck extends ServiceBasics
    {
        // buhu.. value again -> need service in device/ident?
        //value
        /*'enum' => [
            0 => 'SMOKE_TEST_REQUESTED',
            1 => 'NONE']
            IPSVarAction => true,
        ],*/
    }
    class ValveTappet extends ServiceBasics
    {
        /*'position' => [
            'type' => 'integer',
        ],*/
    }
    class AirQualityLevel extends ServiceBasics
    {
        /*'properties'  => [
            'combinedRating' => [
                                'type' => 'string',
                'enum' => [
                    0 => 'GOOD',
                    1 => 'MEDIUM',
                    2 => 'BAD',
                ],
            ],
            'description' => [
                'type' => 'string',
            ],
            'temperature' => [
                'type' => 'number',
            ],
            'temperatureRating' => [
                                'type' => 'string',
                'enum' => [
                    0 => 'GOOD',
                    1 => 'MEDIUM',
                    2 => 'BAD',
                ],
            ],
            'humidity' => [
                'type' => 'number',
            ],
            'humidityRating' => [
                              'type' => 'string',
                'enum' => [
                    0 => 'GOOD',
                    1 => 'MEDIUM',
                    2 => 'BAD',
                ],
            ],
            'purity' => [
                'type' => 'number',
            ],
            'purityRating' => [
                'type' => 'string',
            ],
        ],*/
    }
    class Keypad extends ServiceBasics
    {
        /*
        'properties'  => [
            'keyCode' => [
                'type' => 'integer',
            ],
            'keyName' => [
                'type' => 'string',
                'enum' => [
                    0 => 'LOWER_BUTTON',
                    1 => 'UPPER_BUTTON',
                ],
            ],
            'eventType' => [
                'type' => 'string',
                'enum' => [
                    0 => 'PRESS_SHORT',
                    1 => 'PRESS_LONG',
                ],
            ],
            'eventTimestamp' => [
                'type' => 'integer',
            ],
        ],*/
    }
    class HumidityLevel extends ServiceBasics
    {
        /*'humidity' => [
            'type' => 'number',
        ],*/
    }
    class CameraLight extends ServiceBasics
    {
        //'value'
        //OFF/ON
        //IPSVarAction => true,
    }
    trait IPSProfile
    {
        public function RegisterProfiles()
        {
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\PowerSwitchProgram::getIPSProfile('operationMode'),
                'Clock',
                '',
                '',
                [
                    ['MANUAL', 'manual', '', -1],
                    ['SCHEDULE', 'schedule', '', -1]
                ]
            );
            $this->RegisterProfileFloat(
                \BoschSHC\Services\RoomClimateControl::getIPSProfile('setpointTemperature'),
                'Temperature',
                '',
                '',
                5,
                30,
                0.5,
                1
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\HCWasher::getIPSProfile('operationState'),
                'Menu',
                '',
                '',
                [
                    ['RUNNING', 'running', '', -1],
                    ['END', 'end', '', -1],
                    ['UNKNOWN', 'unknown', '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\HCDishwasher::getIPSProfile('operationState'),
                'Menu',
                '',
                '',
                [
                    ['RUNNING', 'running', '', -1],
                    ['END', 'end', '', -1],
                    ['STANDBY', 'standby', '', -1],
                    ['UNKNOWN', 'unknown', '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\HCOven::getIPSProfile('operationState'),
                'Menu',
                '',
                '',
                [
                    ['RUNNING', 'running', '', -1],
                    ['END', 'end', '', -1],
                    ['STANDBY', 'standby', '', -1],
                    ['UNKNOWN', 'unknown', '', -1],
                ]
            );
        }
    }
}