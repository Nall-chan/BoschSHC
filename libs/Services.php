<?php

declare(strict_types=1);

namespace BoschSHC
{
    class Services
    {
        public const PowerMeter = 'PowerMeter';
        public const PowerSwitch = 'PowerSwitch';
        public const PowerSwitchConfiguration = 'PowerSwitchConfiguration';
        public const PowerSwitchProgram = 'PowerSwitchProgram';
        public const RoomClimateControl = 'RoomClimateControl';
        public const ClimateControl = 'ClimateControl';
        public const TemperatureLevel = 'TemperatureLevel';
        public const ShutterContact = 'ShutterContact';
        public const LatestMotion = 'LatestMotion';
        public const HCWasher = 'HCWasher';
        public const HCDishwasher = 'HCDishwasher';
        public const HCOven = 'HCOven';
        public const PrivacyMode = 'PrivacyMode';
        public const ShutterControl = 'ShutterControl';
        public const SmokeDetectorCheck = 'SmokeDetectorCheck';
        public const SmokeSensitivity = 'SmokeSensitivity';
        public const ValveTappet = 'ValveTappet';
        public const AirQualityLevel = 'AirQualityLevel';
        public const Keypad = 'Keypad';
        public const HumidityLevel = 'HumidityLevel';
        public const CameraLight = 'CameraLight';
        public const BatteryLevel = 'BatteryLevel';
        public const MultiLevelSwitch = 'MultiLevelSwitch';
        public const PresenceSimulationConfiguration = 'PresenceSimulationConfiguration';
        public const PresenceSimulationScheduling = 'PresenceSimulationScheduling';
        public const VentilationDelay = 'VentilationDelay';
        public const BlindsControl = 'BlindsControl';
        public const BlindsSceneControl = 'BlindsSceneControl';
        public const ChildLock = 'ChildLock';
        public const SilentMode = 'SilentMode';
        public const Routing = 'Routing';
        public const HueBlinking = 'HueBlinking';
        public const HueBridgeSearcher = 'HueBridgeSearcher';
        public const HueBridgeConnector = 'HueBridgeConnector';
        public const CommunicationQuality = 'CommunicationQuality';
        public const MultiswitchConfiguration = 'MultiswitchConfiguration';
        public const WalkTest = 'WalkTest';
        public const DoorSensor = 'DoorSensor';
        public const LockActuator = 'LockActuator';
        public const CameraNotification = 'CameraNotification';
        public const ColorActuator = 'ColorActuator';
        public const WaterLeakageSensor = 'WaterLeakageSensor';
        public const WaterLeakageSensorCheck = 'WaterLeakageSensorCheck';
        public const WaterLeakageSensorTilt = 'WaterLeakageSensorTilt';
        public const WaterAlarmSystem = 'WaterAlarmSystem';
        public const AutomationRule = 'AutomationRule';
        public const SoftwareUpdate = 'SoftwareUpdate';
        public const RemoteAccess = 'RemoteAccess';
        public const RemotePushNotification = 'RemotePushNotification';
        public const ArmDisarmPushNotification = 'ArmDisarmPushNotification';
        public const DisplayConfiguration = 'DisplayConfiguration';
        public const TemperatureOffset = 'TemperatureOffset';
        public const Linking = 'Linking';
        public const TerminalConfiguration = 'TerminalConfiguration';
        public const Thermostat = 'Thermostat';
        public const Bypass = 'Bypass';
        public const VibrationSensor = 'VibrationSensor';
        public const SurveillanceAlarm = 'SurveillanceAlarm';
        public const IntrusionDetectionControl = 'IntrusionDetectionControl';
        //skipped Services
        public const ThermostatSupportedControlMode = 'ThermostatSupportedControlMode';
        public const TemperatureLevelConfiguration = 'TemperatureLevelConfiguration';

        //todo
        /*
        "@type": "systemState",
    "systemAvailability": {
        "@type": "systemAvailabilityState",
        "available": false,
        "deleted": false
    }

    {
  "systemAvailability": {
    "available": true,
    "deleted": true,
    "id": "string"
  },
  "armingState": {
    "remainingTimeUntilArmed": 0,
    "state": "SYSTEM_ARMING",
    "deleted": true,
    "id": "string"
  },
  "alarmState": {
    "value": "ALARM_OFF",
    "incidents": [
      {
        "id": "string",
        "triggerName": "string",
        "type": "SYSTEM_ARMED",
        "time": 0,
        "location": "string",
        "locationId": "string"
      }
    ],
    "deleted": true,
    "id": "string"
  },
  "activeConfigurationProfile": {
    "profileId": "string",
    "deleted": true,
    "id": "string"
  },
  "deleted": true,
  "id": "string"
}
         */
        protected static $Services = [
            self::PowerMeter,
            self::PowerSwitch,
            self::PowerSwitchConfiguration,
            self::PowerSwitchProgram,
            self::RoomClimateControl,
            self::ClimateControl,
            self::TemperatureLevel,
            self::ShutterContact,
            self::LatestMotion,
            self::HCWasher,
            self::HCDishwasher,
            self::HCOven,
            self::PrivacyMode,
            self::ShutterControl,
            self::SmokeDetectorCheck,
            self::SmokeSensitivity,
            self::ValveTappet,
            self::AirQualityLevel,
            self::Keypad,
            self::HumidityLevel,
            self::CameraLight,
            self::BatteryLevel,
            self::MultiLevelSwitch,
            self::PresenceSimulationConfiguration,
            self::PresenceSimulationScheduling,
            self::VentilationDelay,
            self::BlindsControl,
            self::BlindsSceneControl,
            self::ChildLock,
            self::SilentMode,
            self::Routing,
            self::HueBlinking,
            self::HueBridgeSearcher,
            self::HueBridgeConnector,
            self::CommunicationQuality,
            self::MultiswitchConfiguration,
            self::WalkTest,
            self::DoorSensor,
            self::LockActuator,
            self::CameraNotification,
            self::ColorActuator,
            self::WaterLeakageSensor,
            self::WaterLeakageSensorCheck,
            self::WaterLeakageSensorTilt,
            self::SoftwareUpdate,
            self::RemoteAccess,
            self::RemotePushNotification,
            self::ArmDisarmPushNotification,
            self::DisplayConfiguration,
            self::TemperatureOffset,
            self::Linking,
            self::TerminalConfiguration,
            self::Thermostat,
            self::Bypass,
            self::VibrationSensor,
            self::ThermostatSupportedControlMode,
            self::TemperatureLevelConfiguration,
            self::SurveillanceAlarm,
            self::IntrusionDetectionControl
        ];

        public static function ServiceIsValid(string $Service): bool
        {
            return in_array($Service, self::$Services);
        }

        public static function getServiceIdByProperty(string $Property): false|string
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
    const IPSPresentation = 'Presentation';
    const IPSVarType = 'VarType';
    const IPSVarFactor = 'Factor';
    const IPSVarName = 'VarName';
    const IPSVarValue = 'VarValue';
    const IPSVarAction = 'VarAction';
    const IPSVarIdent = 'VarIdent';
    const OverrideSendServiceState = 'SendService';
    abstract class ServiceBasics
    {
        protected static $properties = [];
        protected static $state = 'State';
        public static function PropertyIsValid(string $Property): bool
        {
            return isset(static::$properties[$Property]);
        }
        public static function PropertyHasAction(string $Property): bool
        {
            return static::getIPSAction($Property);
        }
        public static function getServiceStateRequest(string $Property, mixed $Value): string
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
            $Request['@type'] = (isset(static::$properties[$Property][OverrideSendServiceState])) ?
                                static::$properties[$Property][OverrideSendServiceState] :
                                static::getServiceState();
            return json_encode($Request, JSON_PRESERVE_ZERO_FRACTION);
        }
        public static function getIPSVariable(string $Property, mixed $Value): array
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
            $Result[IPSPresentation] = static::getIPSPresentation($Property);
            $Result[IPSVarName] = static::getIPSName($Property);
            $Result[IPSVarAction] = static::getIPSAction($Property);
            $Result[IPSVarIdent] = explode('\\', get_called_class())[2] . '_' . $Property;
            return $Result;
        }
        public static function TranslatePresentationValue(string $Text): string
        {
            $translation = self::GetPresentationTranslation();
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
        private static function getIPSPresentation(string $Property): array
        {
            $Presentation = [];
            if (isset(static::$properties[$Property][IPSPresentation])) {
                $Presentation = static::$properties[$Property][IPSPresentation];
                if (isset($Presentation['PREFIX'])) {
                    $Presentation['PREFIX'] = self::TranslatePresentationValue($Presentation['PREFIX']);
                }
                if (isset($Presentation['SUFFIX'])) {
                    $Presentation['SUFFIX'] = self::TranslatePresentationValue($Presentation['SUFFIX']);
                }
                if (isset($Presentation['OPTIONS'])) {
                    $Options = $Presentation['OPTIONS'];
                    foreach ($Options as &$Option) {
                        $Option['Caption'] = self::TranslatePresentationValue($Option['Caption']);
                    }
                    $Presentation['OPTIONS'] = json_encode($Options);
                }
            }
            return $Presentation;
        }
        private static function GetPresentationTranslation(): array
        {
            return json_decode(file_get_contents(__DIR__ . '/locale_profile.json'), true);
        }
        private static function getServiceState(): string
        {
            return lcfirst(explode('\\', get_called_class())[2]) . static::$state;
        }
        private static function getIPSName(string $Property): string
        {
            return
                isset(static::$properties[$Property][IPSVarName]) ?
                static::$properties[$Property][IPSVarName] :
                $Property;
        }
        private static function getIPSVarType(string $Property): int
        {
            return
                isset(static::$properties[$Property][IPSVarType]) ?
                static::$properties[$Property][IPSVarType] :
                VARIABLETYPE_STRING;
        }
        private static function getIPSAction(string $Property): bool
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
                'type'          => 'number',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'TEMPLATE'     => VARIABLE_TEMPLATE_VALUE_PRESENTATION_POWER
                ],
                IPSVarType   => VARIABLETYPE_FLOAT,
                IPSVarName   => 'Power consumption'
            ],
            'energyConsumption' => [
                'type'          => 'number',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'TEMPLATE'     => VARIABLE_TEMPLATE_VALUE_PRESENTATION_ENERGY
                ],
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
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Switch'
            ]
            /** @todo
             * 'automaticPowerOffTime' INTEGER
             */
        ];
    }
    class PowerSwitchConfiguration extends ServiceBasics
    {
        protected static $properties = [
            'stateAfterPowerOutage' => [
                'type'          => 'string',
                IPSVarType      => VARIABLETYPE_STRING,
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'OFF',
                            'Caption'     => 'off',
                            'IconActive'  => true,
                            'IconValue'   => 'plug-circle-xmark',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'LAST_STATE',
                            'Caption'     => 'laste state',
                            'IconActive'  => true,
                            'IconValue'   => 'plug-circle-check',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'ON',
                            'Caption'     => 'on',
                            'IconActive'  => true,
                            'IconValue'   => 'plug-circle-bolt',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ]
                    ]

                ],
                IPSVarAction => true,
                IPSVarName   => 'State after power outage'
            ]
        ];
    }
    class PowerSwitchProgram extends ServiceBasics
    {
        protected static $properties = [
            'operationMode' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'MANUAL',
                            'Caption'     => 'manual',
                            'IconActive'  => true,
                            'IconValue'   => 'hand-back-point-up',
                            'ColorActive' => true,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'SCHEDULE',
                            'Caption'     => 'schedule',
                            'IconActive'  => true,
                            'IconValue'   => 'calendar-check',
                            'ColorActive' => true,
                            'ColorValue'  => -1
                        ]
                    ]

                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Operation mode'
            ]
        ];
    }
    class RoomClimateControl extends ServiceBasics
    {
        protected static $properties = [
            'operationMode' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'MANUAL',
                            'Caption'     => 'manual',
                            'IconActive'  => true,
                            'IconValue'   => 'hand-back-point-up',
                            'ColorActive' => true,
                            'ColorValue'  => 0xF48D43,
                        ],
                        [
                            'Value'       => 'AUTOMATIC',
                            'Caption'     => 'automatic',
                            'IconActive'  => true,
                            'IconValue'   => 'calendar-check',
                            'ColorActive' => true,
                            'ColorValue'  => 0x00CDAB,
                        ],
                        [
                            'Value'       => 'OFF',
                            'Caption'     => 'off',
                            'IconActive'  => true,
                            'IconValue'   => 'xmark',
                            'ColorActive' => true,
                            'ColorValue'  => 0xff0000,
                        ],                            [
                            'Value'       => 'UNKNOWN',
                            'Caption'     => 'unknown',
                            'IconActive'  => true,
                            'IconValue'   => 'question',
                            'ColorActive' => true,
                            'ColorValue'  => 0xffff00,
                        ],
                    ],
                ],
                IPSVarType               => VARIABLETYPE_STRING,
                IPSVarAction             => true,
                IPSVarName               => 'Operation mode',
                OverrideSendServiceState => 'climateControlState'
            ],
            'setpointTemperature' => [
                'type'                   => 'string',
                IPSPresentation          => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_SLIDER,
                    'DIGITS'              => 1,
                    'CUSTOM_GRADIENT'     => '[]',
                    'ICON'                => 'temperature-half',
                    'DECIMAL_SEPARATOR'   => 'Client',
                    'GRADIENT_TYPE'       => 1,
                    'MAX'                 => 30,
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MIN'                 => 5,
                    'PERCENTAGE'          => false,
                    'PREFIX'              => '',
                    'STEP_SIZE'           => 0.5,
                    'SUFFIX'              => ' °C',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 0,
                ],
                IPSVarType               => VARIABLETYPE_FLOAT,
                IPSVarAction             => true,
                IPSVarName               => 'Setpoint temperature',
                OverrideSendServiceState => 'climateControlState'
            ],
            'setpointTemperatureForLevelEco' => [
                'type'                   => 'string',
                IPSPresentation          => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_SLIDER,
                    'DIGITS'              => 1,
                    'CUSTOM_GRADIENT'     => '[]',
                    'ICON'                => 'temperature-half',
                    'DECIMAL_SEPARATOR'   => 'Client',
                    'GRADIENT_TYPE'       => 1,
                    'MAX'                 => 30,
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MIN'                 => 5,
                    'PERCENTAGE'          => false,
                    'PREFIX'              => '',
                    'STEP_SIZE'           => 0.5,
                    'SUFFIX'              => ' °C',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 0,
                ],
                IPSVarType               => VARIABLETYPE_FLOAT,
                IPSVarAction             => true,
                IPSVarName               => 'Setpoint temperature eco',
                OverrideSendServiceState => 'climateControlState'
            ],
            'setpointTemperatureForLevelComfort' => [
                'type'                   => 'string',
                IPSPresentation          => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_SLIDER,
                    'DIGITS'              => 1,
                    'CUSTOM_GRADIENT'     => '[]',
                    'ICON'                => 'temperature-half',
                    'DECIMAL_SEPARATOR'   => 'Client',
                    'GRADIENT_TYPE'       => 1,
                    'MAX'                 => 30,
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MIN'                 => 5,
                    'PERCENTAGE'          => false,
                    'PREFIX'              => '',
                    'STEP_SIZE'           => 0.5,
                    'SUFFIX'              => ' °C',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 0,
                ],
                IPSVarType               => VARIABLETYPE_FLOAT,
                IPSVarAction             => true,
                IPSVarName               => 'Setpoint temperature comfort',
                OverrideSendServiceState => 'climateControlState'
            ],
            'ventilationMode' => [
                'type'                   => 'bool',
                IPSPresentation          => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType               => VARIABLETYPE_BOOLEAN,
                IPSVarAction             => true,
                IPSVarName               => 'Ventilation mode active',
                OverrideSendServiceState => 'climateControlState'
            ],
            //low
            'boostMode' => [
                'type'                   => 'bool',
                IPSPresentation          => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType               => VARIABLETYPE_BOOLEAN,
                IPSVarAction             => true,
                IPSVarName               => 'Boost mode active',
                OverrideSendServiceState => 'climateControlState'
            ],
            'summerMode' => [
                'type'                   => 'bool',
                IPSPresentation          => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType               => VARIABLETYPE_BOOLEAN,
                IPSVarAction             => true,
                IPSVarName               => 'Summer mode active',
                OverrideSendServiceState => 'climateControlState'
            ],
            //supportsBoostMode
            'roomControlMode' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'OFF',
                            'Caption'     => 'off',
                            'IconActive'  => true,
                            'IconValue'   => 'xmark',
                            'ColorActive' => true,
                            'ColorValue'  => 0xff0000,
                        ],
                        [
                            'Value'       => 'COOLING',
                            'Caption'     => 'cooling',
                            'IconActive'  => true,
                            'IconValue'   => 'temperature-arrow-down',
                            'ColorActive' => true,
                            'ColorValue'  => 0x3485EA,
                        ],
                        [
                            'Value'       => 'HEATING',
                            'Caption'     => 'heating',
                            'IconActive'  => true,
                            'IconValue'   => 'temperature-arrow-up',
                            'ColorActive' => true,
                            'ColorValue'  => 0xF48D43,
                        ],
                        [
                            'Value'       => 'UNKNOWN',
                            'Caption'     => 'unknown',
                            'IconActive'  => true,
                            'IconValue'   => 'question',
                            'ColorActive' => true,
                            'ColorValue'  => 0xffff00,
                        ],
                    ]
                ],
                IPSVarType               => VARIABLETYPE_STRING,
                IPSVarAction             => true,
                IPSVarName               => 'Room control mode',
                OverrideSendServiceState => 'climateControlState'
            ],

        ];
    }
    class ClimateControl extends ServiceBasics
    {
        protected static $properties = [
            'operationMode' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'MANUAL',
                            'Caption'     => 'manual',
                            'IconActive'  => true,
                            'IconValue'   => 'hand-back-point-up',
                            'ColorActive' => true,
                            'ColorValue'  => 0xF48D43,
                        ],
                        [
                            'Value'       => 'AUTOMATIC',
                            'Caption'     => 'automatic',
                            'IconActive'  => true,
                            'IconValue'   => 'calendar-check',
                            'ColorActive' => true,
                            'ColorValue'  => 0x00CDAB,
                        ],
                        [
                            'Value'       => 'OFF',
                            'Caption'     => 'off',
                            'IconActive'  => true,
                            'IconValue'   => 'xmark',
                            'ColorActive' => true,
                            'ColorValue'  => 0xff0000,
                        ],                            [
                            'Value'       => 'UNKNOWN',
                            'Caption'     => 'unknown',
                            'IconActive'  => true,
                            'IconValue'   => 'question',
                            'ColorActive' => true,
                            'ColorValue'  => 0xffff00,
                        ],
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Operation mode'
            ],
            'roomControlMode' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'OFF',
                            'Caption'     => 'off',
                            'IconActive'  => true,
                            'IconValue'   => 'xmark',
                            'ColorActive' => true,
                            'ColorValue'  => 0xff0000,
                        ],
                        [
                            'Value'       => 'COOLING',
                            'Caption'     => 'cooling',
                            'IconActive'  => true,
                            'IconValue'   => 'temperature-arrow-down',
                            'ColorActive' => true,
                            'ColorValue'  => 0x3485EA,
                        ],
                        [
                            'Value'       => 'HEATING',
                            'Caption'     => 'heating',
                            'IconActive'  => true,
                            'IconValue'   => 'temperature-arrow-up',
                            'ColorActive' => true,
                            'ColorValue'  => 0xF48D43,
                        ],
                        [
                            'Value'       => 'UNKNOWN',
                            'Caption'     => 'unknown',
                            'IconActive'  => true,
                            'IconValue'   => 'question',
                            'ColorActive' => true,
                            'ColorValue'  => 0xffff00,
                        ],
                    ]

                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Room control mode'
            ]
        ];
    }
    class TemperatureLevel extends ServiceBasics
    {
        protected static $properties = [
            'temperature' => [
                'type'          => 'number',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'TEMPLATE'     => VARIABLE_TEMPLATE_VALUE_PRESENTATION_ROOM_TEMPERATURE
                ],
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
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => false,
                            'Caption'          => 'open',
                            'IconActive'       => true,
                            'IconValue'        => 'window-left-open-right-open',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x0000ff
                        ],
                        [
                            'Value'            => true,
                            'Caption'          => 'closed',
                            'IconActive'       => true,
                            'IconValue'        => 'window-left-closed-right-closed',
                            'ColorActive'      => true,
                            'ColorValue'       => -1
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Shutter contact state'
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
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'washing-machine',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'RUNNING',
                            'Caption'          => 'running',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ],
                        [
                            'Value'            => 'END',
                            'Caption'          => 'end',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x0000ff
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Operation state'
            ],
            'remoteControlStartAllowed' => [
                'type'          => 'bool',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => false,
                            'Caption'          => 'off',
                            'IconActive'       => true,
                            'IconValue'        => 'xmark',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ],
                        [
                            'Value'            => true,
                            'Caption'          => 'on',
                            'IconActive'       => true,
                            'IconValue'        => 'check',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Remote control start allowed'
            ]
        ];
    }
    class HCDishwasher extends ServiceBasics
    {
        protected static $properties = [
            'operationState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'utensils',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'RUNNING',
                            'Caption'          => 'running',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ],
                        [
                            'Value'            => 'END',
                            'Caption'          => 'end',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x0000ff
                        ],
                        [
                            'Value'            => 'STANDBY',
                            'Caption'          => 'standby',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xF48D43
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Operation state'
            ],
            'remoteControlStartAllowed' => [
                'type'          => 'bool',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => false,
                            'Caption'          => 'off',
                            'IconActive'       => true,
                            'IconValue'        => 'xmark',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ],
                        [
                            'Value'            => true,
                            'Caption'          => 'on',
                            'IconActive'       => true,
                            'IconValue'        => 'check',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Remote control start allowed'
            ]
        ];
    }
    class HCOven extends ServiceBasics
    {
        protected static $properties = [
            'operationState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'oven',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'RUNNING',
                            'Caption'          => 'running',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ],
                        [
                            'Value'            => 'END',
                            'Caption'          => 'end',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x0000ff
                        ],
                        [
                            'Value'            => 'STANDBY',
                            'Caption'          => 'standby',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xF48D43
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Operation state'
            ],
            'remoteControlStartAllowed' => [
                'type'          => 'bool',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => false,
                            'Caption'          => 'off',
                            'IconActive'       => true,
                            'IconValue'        => 'xmark',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ],
                        [
                            'Value'            => true,
                            'Caption'          => 'on',
                            'IconActive'       => true,
                            'IconValue'        => 'check',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ]
                    ]
                ],
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
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Privacy mode'
            ]
        ];
    }
    class ShutterControl extends ServiceBasics
    {
        protected static $properties = [
            'level' => [
                'type'          => 'string',
                IPSVarFactor    => 0.01,
                IPSPresentation => [
                    'PRESENTATION'         => VARIABLE_PRESENTATION_SHUTTER,
                    'CLOSE_INSIDE_VALUE'   => 100,
                    'MAX_ROTATION_INSIDE'  => 0,
                    'MAX_ROTATION_OUTSIDE' => 0,
                    'OPEN_OUTSIDE_VALUE'   => 0,
                    'SUN_POSITION'         => 2,
                    'USAGE_TYPE'           => 0,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Level'
            ],
            'operationState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'ICON'         => 'shutters',
                    'OPTIONS'      => [
                        [
                            'Value'       => 'STOPPED',
                            'Caption'     => 'stopped',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'MOVING',
                            'Caption'     => 'moving',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Operation'
            ]
        ];
    }
    class SmokeDetectorCheck extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'ICON'         => 'sensor-fire',
                    'OPTIONS'      => [
                        [
                            'Value'       => 'NONE',
                            'Caption'     => 'no test',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'SMOKE_TEST_REQUESTED',
                            'Caption'     => 'test requested',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'SMOKE_TEST_OK',
                            'Caption'     => 'test ok',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'SMOKE_TEST_FAILED',
                            'Caption'     => 'test failed',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'COMMUNICATION_TEST_SENT',
                            'Caption'     => 'communication test sent',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'COMMUNICATION_TEST_OK',
                            'Caption'     => 'communication test ok',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'COMMUNICATION_TEST_REQUESTED',
                            'Caption'     => 'communication test requested',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Smoke test'
            ]
        ];
    }
    //smoke
    // IDLE_OFF,PRIMARY_ALARM, SECONDARY_ALARM and INTRUSION_ALARM,
    class SmokeSensitivity extends ServiceBasics
    {
        protected static $properties = [
            'smokeSensitivity' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'ICON'         => 'sensor-fire',
                    'OPTIONS'      => [
                        [
                            'Value'       => 'HIGH',
                            'Caption'     => 'high',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'MIDDLE',
                            'Caption'     => 'middle',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'LOW',
                            'Caption'     => 'low',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'UNKNOWN',
                            'Caption'     => 'unknown',
                            'IconActive'  => true,
                            'IconValue'   => 'question',
                            'ColorActive' => true,
                            'ColorValue'  => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Smoke sensitivity'
            ]
        ];
    }
    class ValveTappet extends ServiceBasics
    {
        protected static $properties = [
            'position' => [
                'type'          => 'string',
                IPSVarType      => VARIABLETYPE_INTEGER,
                IPSPresentation => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'COLOR'               => -1,
                    'DECIMAL_SEPARATOR'   => '',
                    'DIGITS'              => 0,
                    'ICON'                => 'Intensity',
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MAX'                 => 100,
                    'MIN'                 => 0,
                    'MULTILINE'           => false,
                    'PERCENTAGE'          => true,
                    'PREFIX'              => '',
                    'SUFFIX'              => ' %',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 0,
                ],
                IPSVarName   => 'Valve position'
            ],
            'value' => [
                'type'          => 'string',
                /**
                 * @todo Übersetzungen fehlen
                 */
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'NO_AVAILABLE',
                            'Caption'          => 'NOT_AVAILABLE',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'RUN_TO_START_POSITION',
                            'Caption'          => 'RUN_TO_START_POSITION',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'START_POSITION_REQUESTED',
                            'Caption'          => 'START_POSITION_REQUESTED',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'IN_START_POSITION',
                            'Caption'          => 'IN_START_POSITION',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'VALVE_ADAPTION_REQUESTED',
                            'Caption'          => 'VALVE_ADAPTION_REQUESTED',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'VALVE_ADAPTION_IN_PROGRESS',
                            'Caption'          => 'VALVE_ADAPTION_IN_PROGRESS',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'VALVE_ADAPTION_SUCCESSFUL',
                            'Caption'          => 'VALVE_ADAPTION_SUCCESSFUL',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'VALVE_TOO_TIGHT',
                            'Caption'          => 'VALVE_TOO_TIGHT',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'RANGE_TOO_BIG',
                            'Caption'          => 'RANGE_TOO_BIG',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'RANGE_TOO_SMALL',
                            'Caption'          => 'RANGE_TOO_SMALL',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'ERROR',
                            'Caption'          => 'ERROR',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'UNKNOWN',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Valve state'
            ]
        ];
    }
    class AirQualityLevel extends ServiceBasics
    {
        // {"temperatureRating":"GOOD","humidityRating":"MEDIUM","purity":620,"comfortZone":....,"@type":"airQualityLevelState",
        // "purityRating":"GOOD","temperature":23.77,"description":"LITTLE_DRY","humidity":32.69,"combinedRating":"MEDIUM"}
        protected static $properties = [
            'combinedRating' => [
                'type'       => 'string',
                /**
                 * @todo Übersetzung fehlt
                 */
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'OK',
                            'Caption'          => 'OK',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'COLD',
                            'Caption'          => 'COLD',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'COLD_DRY',
                            'Caption'          => 'COLD_DRY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'COLD_HUMID',
                            'Caption'          => 'COLD_HUMID',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'COLD_STUFFY',
                            'Caption'          => 'COLD_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'COLD_DRY_STUFFY',
                            'Caption'          => 'COLD_DRY_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'COLD_HUMID_STUFFY',
                            'Caption'          => 'COLD_HUMID_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'LITTLE_COLD',
                            'Caption'          => 'LITTLE_COLD',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'LITTLE_DRY',
                            'Caption'          => 'LITTLE_DRY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'LITTLE_HUMID',
                            'Caption'          => 'LITTLE_HUMID',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'LITTLE_STUFFY',
                            'Caption'          => 'LITTLE_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'LITTLE_WARM',
                            'Caption'          => 'LITTLE_WARM',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'DRY',
                            'Caption'          => 'DRY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'DRY_STUFFY',
                            'Caption'          => 'DRY_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'HUMID',
                            'Caption'          => 'HUMID',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'HUMID_STUFFY',
                            'Caption'          => 'HUMID_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'STUFFY',
                            'Caption'          => 'STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WARM',
                            'Caption'          => 'WARM',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WARM_DRY',
                            'Caption'          => 'WARM_DRY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WARM_HUMID',
                            'Caption'          => 'WARM_HUMID',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WARM_STUFFY',
                            'Caption'          => 'WARM_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WARM_HUMID_STUFFY',
                            'Caption'          => 'WARM_HUMID_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WARM_DRY_STUFFY',
                            'Caption'          => 'WARM_DRY_STUFFY',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'UNKNOWN',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Combined rating',

            ],
            'temperature' => [
                'type'          => 'number',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'TEMPLATE'     => VARIABLE_TEMPLATE_VALUE_PRESENTATION_ROOM_TEMPERATURE
                ],
                IPSVarType   => VARIABLETYPE_FLOAT,
                IPSVarName   => 'Temperature'
            ],
            'temperatureRating' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'temperature-half',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'GOOD',
                            'Caption'          => 'good',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ],
                        [
                            'Value'            => 'MEDIUM',
                            'Caption'          => 'medium',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00CDAB
                        ],
                        [
                            'Value'            => 'BAD',
                            'Caption'          => 'bad',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Temperature rating'
            ],
            'humidity' => [
                'type'          => 'number',
                IPSPresentation => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'COLOR'               => -1,
                    'DECIMAL_SEPARATOR'   => '',
                    'DIGITS'              => 0,
                    'ICON'                => 'droplet-degree',
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MAX'                 => 100,
                    'MIN'                 => 0,
                    'MULTILINE'           => false,
                    'PERCENTAGE'          => true,
                    'PREFIX'              => '',
                    'SUFFIX'              => ' %',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 0,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Humidity'
            ],
            'humidityRating' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'droplet-degree',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'GOOD',
                            'Caption'          => 'good',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ],
                        [
                            'Value'            => 'MEDIUM',
                            'Caption'          => 'medium',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00CDAB
                        ],
                        [
                            'Value'            => 'BAD',
                            'Caption'          => 'bad',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Humidity rating'
            ],
            'purity' => [
                'type'          => 'number',
                IPSPresentation => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'COLOR'               => -1,
                    'DECIMAL_SEPARATOR'   => '',
                    'DIGITS'              => 0,
                    'ICON'                => 'wind',
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MAX'                 => 100,
                    'MIN'                 => 0,
                    'MULTILINE'           => false,
                    'PERCENTAGE'          => true,
                    'PREFIX'              => '',
                    'SUFFIX'              => ' %',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 0,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Purity'
            ],
            'purityRating' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'wind',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'GOOD',
                            'Caption'          => 'good',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ],
                        [
                            'Value'            => 'MEDIUM',
                            'Caption'          => 'medium',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00CDAB
                        ],
                        [
                            'Value'            => 'BAD',
                            'Caption'          => 'bad',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Purity rating'
            ]
        ];
    }
    class Keypad extends ServiceBasics
    {
        protected static $properties = [
            'keyCode' => [
                'type'          => 'integer',
                IPSVarType      => VARIABLETYPE_INTEGER,
                IPSVarName      => 'Keycode'
            ],
            'keyName' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'hand-back-point-up',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'LOWER_BUTTON',
                            'Caption'          => 'Lower button',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UPPER_BUTTON',
                            'Caption'          => 'Upper button',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Key name'
            ],
            'eventType' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'hand-back-point-up',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'PRESS_SHORT',
                            'Caption'          => 'short',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'PRESS_LONG',
                            'Caption'          => 'long',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Event'
            ],
            'eventTimestamp' => [
                'type'       => 'integer',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Event time'
            ],
        ];
    }
    class HumidityLevel extends ServiceBasics
    {
        protected static $properties = [
            'humidity' => [
                'type'          => 'number',
                IPSPresentation => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'COLOR'               => -1,
                    'DECIMAL_SEPARATOR'   => '',
                    'DIGITS'              => 0,
                    'ICON'                => 'droplet-degree',
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MAX'                 => 100,
                    'MIN'                 => 0,
                    'MULTILINE'           => false,
                    'PERCENTAGE'          => true,
                    'PREFIX'              => '',
                    'SUFFIX'              => ' %',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 0,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Humidity'
            ]
        ];
    }
    class CameraLight extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type' => 'string',
                'enum' => [
                    true   => 'ON',
                    false  => 'OFF',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Camera light'
            ]
        ];
    }
    class BatteryLevel extends ServiceBasics
    {
        protected static $properties = [
            'batteryLevel' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'ICON'         => 'hand-back-point-up',
                    'OPTIONS'      => [
                        [
                            'Value'            => 'OK',
                            'Caption'          => 'ok',
                            'IconActive'       => true,
                            'IconValue'        => 'battery-bolt',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x22b934
                        ],
                        [
                            'Value'            => 'LOW_BATTERY',
                            'Caption'          => 'low battery',
                            'IconActive'       => true,
                            'IconValue'        => 'battery-low',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xefff04
                        ],
                        [
                            'Value'            => 'CRITICAL_LOW',
                            'Caption'          => 'critically low',
                            'IconActive'       => true,
                            'IconValue'        => 'battery-empty',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff571f
                        ],
                        [
                            'Value'            => 'CRITICALLY_LOW_BATTERY',
                            'Caption'          => 'critically low battery',
                            'IconActive'       => true,
                            'IconValue'        => 'battery-exclamation',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xea1f1f
                        ],
                        [
                            'Value'            => 'NOT_AVAILABLE',
                            'Caption'          => 'not available',
                            'IconActive'       => true,
                            'IconValue'        => 'battery-slash',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Battery state'
            ]
        ];
    }

    class MultiLevelSwitch extends ServiceBasics
    {
        protected static $properties = [ //todo
            'level' => [
                'type'       => 'number',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Illuminance level'
            ]
        ];
    }
    class PresenceSimulationConfiguration extends ServiceBasics
    {
        protected static $properties = [
            'enabled' => [
                'type'            => 'bool',
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Enabled'
            ],
            'runningStartTime' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Start time'
            ],
            'runningEndTime' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'End time'
            ]
        ];
    }
    class PresenceSimulationScheduling extends ServiceBasics
    {
    }
    class VentilationDelay extends ServiceBasics
    {
        protected static $properties = [
            'delay' => [
                'type'          => 'number',
                IPSPresentation => [
                    'PREFIX'       => '',
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_INPUT,
                    'SUFFIX'       => ' seconds',
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Delay'
            ]
        ];
    }
    class BlindsControl extends ServiceBasics
    {
        protected static $properties = [
            'targetAngle' => [
                'type'          => 'number',
                IPSVarFactor    => 0.01,
                IPSPresentation => [
                    'PRESENTATION'         => VARIABLE_PRESENTATION_SHUTTER,
                    'CLOSE_INSIDE_VALUE'   => 0,
                    'MAX_ROTATION_INSIDE'  => 0,
                    'MAX_ROTATION_OUTSIDE' => 100,
                    'OPEN_OUTSIDE_VALUE'   => 0,
                    'SUN_POSITION'         => 1,
                    'USAGE_TYPE'           => 1,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Target angle'
            ]
        ];
    }
    class BlindsSceneControl extends ServiceBasics
    {
        protected static $properties = [
            'level' => [
                'type'          => 'number',
                IPSVarFactor    => 0.01,
                IPSPresentation => [
                    'PRESENTATION'         => VARIABLE_PRESENTATION_SHUTTER,
                    'CLOSE_INSIDE_VALUE'   => 100,
                    'MAX_ROTATION_INSIDE'  => 0,
                    'MAX_ROTATION_OUTSIDE' => 0,
                    'OPEN_OUTSIDE_VALUE'   => 0,
                    'SUN_POSITION'         => 2,
                    'USAGE_TYPE'           => 0,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Level'
            ],
            'angle' => [
                'type'          => 'number',
                IPSVarFactor    => 0.01,
                IPSPresentation => [
                    'PRESENTATION'         => VARIABLE_PRESENTATION_SHUTTER,
                    'CLOSE_INSIDE_VALUE'   => 0,
                    'MAX_ROTATION_INSIDE'  => 0,
                    'MAX_ROTATION_OUTSIDE' => 100,
                    'OPEN_OUTSIDE_VALUE'   => 0,
                    'SUN_POSITION'         => 1,
                    'USAGE_TYPE'           => 1,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Angle'
            ]
        ];
    }
    class ChildLock extends ServiceBasics
    {
        protected static $properties = [
            'childLock' => [
                'type' => 'string',
                'enum' => [
                    true   => 'ON',
                    false  => 'OFF',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Child lock'
            ]
        ];
    }
    class SilentMode extends ServiceBasics
    {
        protected static $properties = [
            'mode' => [
                'type' => 'string',
                'enum' => [
                    true   => 'MODE_SILENT',
                    false  => 'MODE_NORMAL',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Silent mode'
            ]
        ];
    }
    class Routing extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type' => 'string',
                'enum' => [
                    false => 'ENABLED',
                    true  => 'DISABLED',
                ],
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => false,
                            'Caption'          => 'enabled',
                            'IconActive'       => true,
                            'IconValue'        => 'xmark',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ],
                        [
                            'Value'            => true,
                            'Caption'          => 'disabled',
                            'IconActive'       => true,
                            'IconValue'        => 'check',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Routing state'
            ]
        ];
    }
    class HueBlinking extends ServiceBasics
    {
        protected static $properties = [
            'blinkingState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'OFF',
                            'Caption'     => 'off',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'ON',
                            'Caption'     => 'on',
                            'IconActive'  => false,
                            'IconValue'   => '',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'UNKNOWN',
                            'Caption'     => 'unknown',
                            'IconActive'  => true,
                            'IconValue'   => 'question',
                            'ColorActive' => true,
                            'ColorValue'  => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Blinking state'
            ]
        ];
    }
    class HueBridgeSearcher extends ServiceBasics
    {
        protected static $properties = [
            'searcherState' => [
                'type'       => 'string',
                /**
                 * @todo Übersetzung fehlt
                 */
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'BRIDGE_SEARCH_REQUESTED',
                            'Caption'          => 'BRIDGE_SEARCH_REQUESTED',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'BRIDGE_SEARCH_STARTED',
                            'Caption'          => 'BRIDGE_SEARCH_STARTED',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'BRIDGES_FOUND',
                            'Caption'          => 'BRIDGES_FOUND',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'NO_BRIDGE_FOUND',
                            'Caption'          => 'NO_BRIDGE_FOUND',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'ERROR',
                            'Caption'          => 'ERROR',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'UNKNOWN',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Searcher state'
            ],
            'value' => [
                'type'       => 'string',
                /**
                 * @todo Übersetzung fehlt
                 */
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'BRIDGE_SEARCH_REQUESTED',
                            'Caption'          => 'BRIDGE_SEARCH_REQUESTED',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'BRIDGE_SEARCH_STARTED',
                            'Caption'          => 'BRIDGE_SEARCH_STARTED',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'BRIDGES_FOUND',
                            'Caption'          => 'BRIDGES_FOUND',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'NO_BRIDGE_FOUND',
                            'Caption'          => 'NO_BRIDGE_FOUND',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'ERROR',
                            'Caption'          => 'ERROR',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'UNKNOWN',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Search result'
            ]
        ];
    }
    class HueBridgeConnector extends ServiceBasics
    {
        protected static $properties = [
            'hueBridgeConnectorState' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Connector state'
            ]
        ];
    }
    class CommunicationQuality extends ServiceBasics
    {
        protected static $properties = [
            'quality' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'GOOD',
                            'Caption'          => 'good',
                            'IconActive'       => true,
                            'IconValue'        => 'signal-strong',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'BAD',
                            'Caption'          => 'bad',
                            'IconActive'       => true,
                            'IconValue'        => 'signal-weak',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'NORMAL',
                            'Caption'          => 'normal',
                            'IconActive'       => true,
                            'IconValue'        => 'signal-good',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ],
                        [
                            'Value'            => 'FETCHING',
                            'Caption'          => 'fetching',
                            'IconActive'       => true,
                            'IconValue'        => 'rss',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Communication quality'
            ]
        ];
    }
    class MultiswitchConfiguration extends ServiceBasics
    {
        protected static $properties = [
            'updateState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'UPDATING',
                            'Caption'          => 'updating',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UP_TO_DATE',
                            'Caption'          => 'up to date',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Update'
            ]
        ];
    }
    class WalkTest extends ServiceBasics
    {
        protected static $properties = [
            'walkState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'WALK_TEST_STARTED',
                            'Caption'          => 'started',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WALK_TEST_STOPPED',
                            'Caption'          => 'stopped',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WALK_TEST_UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Walktest'
            ],
            'petImmunityState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'WALK_TEST_STARTED',
                            'Caption'          => 'started',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WALK_TEST_STOPPED',
                            'Caption'          => 'stopped',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WALK_TEST_UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Pet immunity'
            ]
        ];
    }
    class DoorSensor extends ServiceBasics
    {
        protected static $properties = [
            'doorState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'DOOR_CLOSED',
                            'Caption'          => 'closed',
                            'IconActive'       => true,
                            'IconValue'        => 'door-closed',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'DOOR_OPEN',
                            'Caption'          => 'open',
                            'IconActive'       => true,
                            'IconValue'        => 'door-open',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'DOOR_UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Door state'
            ]
        ];
    }
    class LockActuator extends ServiceBasics
    {
        protected static $properties = [
            'lockState' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'UNLOCKED',
                            'Caption'     => 'unlocked',
                            'IconActive'  => true,
                            'IconValue'   => 'lock-open',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'LOCKED',
                            'Caption'     => 'locked',
                            'IconActive'  => true,
                            'IconValue'   => 'lock',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'LOCKING',
                            'Caption'     => 'locking',
                            'IconActive'  => true,
                            'IconValue'   => 'lock-keyhole',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 'UNLOCKING',
                            'Caption'     => 'unlocking',
                            'IconActive'  => true,
                            'IconValue'   => 'lock-keyhole-open',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Lock state'
            ]
        ];
    }
    class CameraNotification extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type'       => 'string',
                'enum'       => [
                    false => 'ENABLED',
                    true  => 'DISABLED',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Camera notification'
            ]
        ];
    }
    class ColorActuator extends ServiceBasics
    {
        /*
            public int rgb;
            String gamut;
            ColorTemperatureRange colorTemperatureRange;
         */
    }
    class WaterLeakageSensor extends ServiceBasics
    {
        protected static $properties = [
            'state' => [
                'type'       => 'string',
                'enum'       => [
                    false => 'NO_LEAKAGE',
                    true  => 'LEAKAGE_DETECTED',
                ],
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => false,
                            'Caption'          => 'off',
                            'IconActive'       => true,
                            'IconValue'        => 'droplet-slash',
                            'ColorActive'      => true,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => true,
                            'Caption'          => 'alarm',
                            'IconActive'       => true,
                            'IconValue'        => 'droplet',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xf22626
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Water leakage state'
            ]
        ];
    }
    class WaterLeakageSensorCheck extends ServiceBasics
    {
        protected static $properties = [
            'result' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                /**
                 * @todo Darstellung fehlt
                 */
                IPSVarName   => 'Water leakage sensor check'
            ]
        ];
    }
    class WaterLeakageSensorTilt extends ServiceBasics
    {
        protected static $properties = [
            'pushNotificationState' => [
                'type'       => 'string',
                'enum'       => [
                    true   => 'ENABLED',
                    false  => 'DISABLED',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Push notification state on tilt'
            ],
            'acousticSignalState' => [
                'type'       => 'string',
                'enum'       => [
                    true   => 'ENABLED',
                    false  => 'DISABLED',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Acoustic signal state on tilt'
            ]
        ];
    }
    class WaterAlarmSystem extends ServiceBasics
    {
        protected static $properties = [
            'state' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'ALARM_OFF',
                            'Caption'          => 'off',
                            'IconActive'       => true,
                            'IconValue'        => 'droplet-slash',
                            'ColorActive'      => true,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'WATER_ALARM',
                            'Caption'          => 'alarm',
                            'IconActive'       => true,
                            'IconValue'        => 'droplet',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xf22626
                        ],
                        [
                            'Value'            => 'ALARM_MUTED',
                            'Caption'          => 'muted',
                            'IconActive'       => true,
                            'IconValue'        => 'alarm-snooze',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xf2e126
                        ]
                    ]
                ],
                IPSVarType      => VARIABLETYPE_STRING,
                IPSVarName      => 'Water alarm system state'
            ],
            'mute' => [
                'type'         => 'number',
                IPSPresentation=> [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'ICON'         => 'play',
                    'OPTIONS'      => [
                        [
                            'Value'      => 0,
                            'Caption'    => 'Execute',
                            'ColorValue' => 0x3485EA,
                            'IconActive' => false,
                            'IconValue'  => ''
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Set muted'
            ]
        ];
    }
    class AutomationRule extends ServiceBasics
    {
        protected static $properties = [
            'enabled' => [
                'type'          => 'bool',
                IPSPresentation => [
                    'PRESENTATION'   => VARIABLE_PRESENTATION_SWITCH,
                    'USE_ICON_FALSE' => true,
                    'ICON_TRUE'      => 'check',
                    'ICON_FALSE'     => 'xmark',
                    'USAGE_TYPE'     => 0
                ],
                IPSVarType      => VARIABLETYPE_BOOLEAN,
                IPSVarAction    => true,
                IPSVarName      => 'Enabled'
            ]
        ];
    }
    class SoftwareUpdate extends ServiceBasics
    {
        protected static $properties = [
            'swUpdateState' => [
                'type'            => 'string',
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'NO_UPDATE_AVAILABLE',
                            'Caption'          => 'no update available',
                            'IconActive'       => true,
                            'IconValue'        => 'shield-check',
                            'ColorActive'      => true,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'UPDATE_IN_PROGRESS',
                            'Caption'          => 'update in progress',
                            'IconActive'       => true,
                            'IconValue'        => 'gear-code',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xf22626
                        ],
                        [
                            'Value'            => 'UPDATE_AVAILABLE',
                            'Caption'          => 'update available',
                            'IconActive'       => true,
                            'IconValue'        => 'font-awesome',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xf2e126
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Software update state'
            ],
            'swUpdateLastResult' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Software update last result'
            ],
            'swUpdateAvailableVersion' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Available software version'
            ],
            'swInstalledVersion' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Installed software version'
            ],
            'automaticUpdatesEnabled' => [
                'type'            => 'bool',
                IPSPresentation   => [
                    'PRESENTATION'   => VARIABLE_PRESENTATION_SWITCH,
                    'USE_ICON_FALSE' => true,
                    'ICON_TRUE'      => 'check',
                    'ICON_FALSE'     => 'xmark',
                    'USAGE_TYPE'     => 0
                ],
                IPSVarType        => VARIABLETYPE_BOOLEAN,
                IPSVarAction      => true,
                IPSVarName        => 'Automatic updates enabled'
            ]
        ];
    }
    class RemoteAccess extends ServiceBasics
    {
        protected static $properties = [
            'state' => [
                'type' => 'string',
                'enum' => [
                    true   => 'ENABLED',
                    false  => 'DISABLED',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Remote access'
            ]
        ];
    }
    class RemotePushNotification extends ServiceBasics
    {
        protected static $properties = [
            'state' => [
                'type' => 'string',
                'enum' => [
                    true   => 'ENABLED',
                    false  => 'DISABLED',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Remote push notification'
            ]
        ];
    }
    class ArmDisarmPushNotification extends ServiceBasics
    {
        protected static $properties = [
            'state' => [
                'type' => 'string',
                'enum' => [
                    true   => 'ENABLED',
                    false  => 'DISABLED',
                ],
                IPSPresentation   => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Arm/Disarm push notification'
            ]
        ];
    }
    class DisplayConfiguration extends ServiceBasics
    {
        protected static $properties = [
            'displayBrightness' => [
                'type'                   => 'number',
                IPSPresentation          => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_SLIDER,
                    'DIGITS'              => 0,
                    'CUSTOM_GRADIENT'     => '[]',
                    'ICON'                => 'brightness',
                    'DECIMAL_SEPARATOR'   => '',
                    'GRADIENT_TYPE'       => 0,
                    'MAX'                 => 100,
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MIN'                 => 10,
                    'PERCENTAGE'          => false,
                    'PREFIX'              => '',
                    'STEP_SIZE'           => 10,
                    'SUFFIX'              => ' %',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 5,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Display brightness'
            ],
            'displayOnTime' => [
                'type'                   => 'number',
                IPSPresentation          => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_SLIDER,
                    'DIGITS'              => 0,
                    'CUSTOM_GRADIENT'     => '[]',
                    'ICON'                => 'display-slash',
                    'DECIMAL_SEPARATOR'   => '',
                    'GRADIENT_TYPE'       => 0,
                    'MAX'                 => 30,
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MIN'                 => 5,
                    'PERCENTAGE'          => false,
                    'PREFIX'              => '',
                    'STEP_SIZE'           => 5,
                    'SUFFIX'              => ' s',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 5,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Display on time'
            ]
        ];
    }
    class TemperatureOffset extends ServiceBasics
    {
        protected static $properties = [
            'offset' => [
                'type'          => 'string',
                IPSPresentation => [

                    'DIGITS'              => 1,
                    'CUSTOM_GRADIENT'     => '[]',
                    'ICON'                => 'temperature-half',
                    'DECIMAL_SEPARATOR'   => 'Client',
                    'GRADIENT_TYPE'       => 1,
                    'MAX'                 => 5,
                    'PRESENTATION'        => VARIABLE_PRESENTATION_SLIDER,
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MIN'                 => -5,
                    'PERCENTAGE'          => false,
                    'PREFIX'              => '',
                    'STEP_SIZE'           => 0.1,
                    'SUFFIX'              => ' °C',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 0,

                ],
                IPSVarType   => VARIABLETYPE_FLOAT,
                IPSVarAction => true,
                IPSVarName   => 'Temperature offset'
            ]
        ];
    }
    class Linking extends ServiceBasics // ignore
    {
    }
    class TerminalConfiguration extends ServiceBasics
    {
        protected static $properties = [
            'type' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'OUTDOOR_SENSOR_CONNECTED',
                            'Caption'          => 'outdoor sensor connected',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'FLOOR_SENSOR_DISPLAYED_AND_USED_FOR_REGULATION',
                            'Caption'          => 'floor sensor (displayed & used)',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'FLOOR_SENSOR_DISPLAYED',
                            'Caption'          => 'floor sensor displayed',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => 'NOT_CONNECTED',
                            'Caption'          => 'not connected',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => false,
                            'ColorValue'       => -1
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Terminal configuration'
            ]
        ];
    }
    class Thermostat extends ServiceBasics
    {
        protected static $properties = [
            'childLock' => [
                'type' => 'string',
                'enum' => [
                    true   => 'ON',
                    false  => 'OFF',
                ],
                IPSPresentation          => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType               => VARIABLETYPE_BOOLEAN,
                IPSVarAction             => true,
                IPSVarName               => 'Child lock',
                OverrideSendServiceState => 'childLockState'
            ]
        ];
    }
    class Bypass extends ServiceBasics
    {
        protected static $properties = [
            'state' => [
                'type' => 'string',
                'enum' => [
                    true   => 'BYPASS_ACTIVE',
                    false  => 'BYPASS_INACTIVE',
                ],
                IPSPresentation         => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_SWITCH
                ],
                IPSVarType              => VARIABLETYPE_BOOLEAN,
                IPSVarAction            => true,
                IPSVarName              => 'Bypass'
            ]
        ];
    }
    class VibrationSensor extends ServiceBasics
    {
        protected static $properties = [
            'state' => [
                'type' => 'string',
                'enum' => [
                    true   => 'VIBRATION',
                    false  => 'NO_VIBRATION',
                ],
                IPSPresentation         => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => false,
                            'Caption'          => 'off',
                            'IconActive'       => true,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => -1
                        ],
                        [
                            'Value'            => true,
                            'Caption'          => 'alarm',
                            'IconActive'       => true,
                            'IconValue'        => 'warning',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xf22626
                        ]
                    ]
                ],
                IPSVarType              => VARIABLETYPE_BOOLEAN,
                IPSVarName              => 'Vibration sensor'
            ]
        ];
    }
    class SurveillanceAlarm extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type'                  => 'string',
                IPSPresentation         => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_VALUE_PRESENTATION,
                    'OPTIONS'      => [
                        [
                            'Value'            => 'ALARM_ON',
                            'Caption'          => 'on',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xff0000
                        ],
                        [
                            'Value'            => 'ALARM_OFF',
                            'Caption'          => 'off',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x00ff00
                        ],
                        [
                            'Value'            => 'ALARM_MUTED',
                            'Caption'          => 'muted',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x0000ff
                        ],
                        [
                            'Value'            => 'PRE_ALARM',
                            'Caption'          => 'Pre-alarm',
                            'IconActive'       => false,
                            'IconValue'        => '',
                            'ColorActive'      => true,
                            'ColorValue'       => 0x900000
                        ],
                        [
                            'Value'            => 'UNKNOWN',
                            'Caption'          => 'unknown',
                            'IconActive'       => true,
                            'IconValue'        => 'question',
                            'ColorActive'      => true,
                            'ColorValue'       => 0xffff00
                        ]
                    ]
                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Surveillance alarm status'
            ]
        ];
    }
    class IntrusionDetectionControl extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type'          => 'string',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 'SYSTEM_ARMING',
                            'Caption'     => 'is arming',
                            'IconActive'  => true,
                            'IconValue'   => 'shield',
                            'ColorActive' => true,
                            'ColorValue'  => 0x900000
                        ],
                        [
                            'Value'       => 'SYSTEM_ARMED',
                            'Caption'     => 'armed',
                            'IconActive'  => true,
                            'IconValue'   => 'shield-check',
                            'ColorActive' => true,
                            'ColorValue'  => 0xff0000
                        ],
                        [
                            'Value'       => 'SYSTEM_DISARMED',
                            'Caption'     => 'disarmed',
                            'IconActive'  => true,
                            'IconValue'   => 'shield-xmark',
                            'ColorActive' => true,
                            'ColorValue'  => 0x00ff00
                        ],
                        [
                            'Value'       => 'MUTE_ALARM',
                            'Caption'     => 'muted',
                            'IconActive'  => true,
                            'IconValue'   => 'shield-slash',
                            'ColorActive' => true,
                            'ColorValue'  => 0x0000ff
                        ]
                    ]

                ],
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Control'
            ],
            'activeProfile'           => [
                'type'          => 'number',
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_ENUMERATION,
                    'OPTIONS'      => [
                        [
                            'Value'       => 0,
                            'Caption'     => 'full protection',
                            'IconActive'  => true,
                            'IconValue'   => 'shield',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 1,
                            'Caption'     => 'partial protection',
                            'IconActive'  => true,
                            'IconValue'   => 'shield-halved',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ],
                        [
                            'Value'       => 2,
                            'Caption'     => 'customized protection',
                            'IconActive'  => true,
                            'IconValue'   => 'shield-quartered',
                            'ColorActive' => false,
                            'ColorValue'  => -1
                        ]
                    ]

                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Active profile'
            ],
            'armActivationDelayTime'  => [
                'type'                   => 'number',
                IPSPresentation          => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_SLIDER,
                    'DIGITS'              => 0,
                    'CUSTOM_GRADIENT'     => '[]',
                    'ICON'                => 'timer',
                    'DECIMAL_SEPARATOR'   => '',
                    'GRADIENT_TYPE'       => 0,
                    'MAX'                 => 600,
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MIN'                 => 0,
                    'PERCENTAGE'          => false,
                    'PREFIX'              => '',
                    'STEP_SIZE'           => 1,
                    'SUFFIX'              => ' s',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 5,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Activation delay time'
            ],
            'alarmActivationDelayTime' => [
                'type'                   => 'number',
                IPSPresentation          => [
                    'PRESENTATION'        => VARIABLE_PRESENTATION_SLIDER,
                    'DIGITS'              => 0,
                    'CUSTOM_GRADIENT'     => '[]',
                    'ICON'                => 'timer',
                    'DECIMAL_SEPARATOR'   => '',
                    'GRADIENT_TYPE'       => 0,
                    'MAX'                 => 600,
                    'INTERVALS'           => '[]',
                    'INTERVALS_ACTIVE'    => false,
                    'MIN'                 => 0,
                    'PERCENTAGE'          => false,
                    'PREFIX'              => '',
                    'STEP_SIZE'           => 1,
                    'SUFFIX'              => ' s',
                    'THOUSANDS_SEPARATOR' => '',
                    'USAGE_TYPE'          => 5,
                ],
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Alarm delay time'
            ],
            'remainingTimeUntilArmed' => [
                'type'          => 'number',
                IPSVarFactor    => 1000,
                IPSVarType      => VARIABLETYPE_INTEGER,
                IPSPresentation => [
                    'PRESENTATION' => VARIABLE_PRESENTATION_DURATION
                ],
                IPSVarName   => 'Remaining until armed'
            ],
        ];
    }
    /**
     * ThermostatSupportedControlMode
     *
     * empty, noting to do
     */
    class ThermostatSupportedControlMode extends ServiceBasics
    {
    }
    /**
     * TemperatureLevelConfiguration
     *
     * empty, noting to do
     */
    class TemperatureLevelConfiguration extends ServiceBasics
    {
    }
    /**
     * @method void UnregisterProfile(string $Name)
     */
    trait IPSProfile
    {
        protected function UnregisterProfiles()
        {
            $this->UnregisterProfile('BSH.PowerSwitchConfiguration.stateAfterPowerOutage');
            $this->UnregisterProfile('BSH.PowerSwitchProgram.operationMode');
            $this->UnregisterProfile('BSH.RoomClimateControl.setpointTemperature');
            $this->UnregisterProfile('BSH.RoomClimateControl.operationMode');
            $this->UnregisterProfile('BSH.RoomClimateControl.roomControlMode');
            $this->UnregisterProfile('BSH.HCWasher.operationState');
            $this->UnregisterProfile('BSH.HCDishwasher.operationState');
            $this->UnregisterProfile('BSH.HCOven.operationState');
            $this->UnregisterProfile('BSH.ShutterControl.operationState');
            $this->UnregisterProfile('BSH.SmokeDetectorCheck.value');
            $this->UnregisterProfile('BSH.SmokeSensitivity.smokeSensitivity');
            $this->UnregisterProfile('BSH.ValveTappet.value');
            $this->UnregisterProfile('BSH.AirQualityLevel.combinedRating');
            $this->UnregisterProfile('BSH.AirQualityLevel.temperatureRating');
            $this->UnregisterProfile('BSH.Keypad.keyName');
            $this->UnregisterProfile('BSH.Keypad.eventType');
            $this->UnregisterProfile('BSH.BatteryLevel.batteryLevel');
            $this->UnregisterProfile('BSH.VentilationDelay.delay');
            $this->UnregisterProfile('BSH.HueBlinking.blinkingState');
            $this->UnregisterProfile('BSH.HueBridgeSearcher.searcherState');
            $this->UnregisterProfile('BSH.CommunicationQuality.quality');
            $this->UnregisterProfile('BSH.MultiswitchConfiguration.updateState');
            $this->UnregisterProfile('BSH.WalkTest.walkState');
            $this->UnregisterProfile('BSH.DoorSensor.doorState');
            $this->UnregisterProfile('BSH.LockActuator.lockState');
            $this->UnregisterProfile('BSH.WaterAlarmSystem.state');
            $this->UnregisterProfile('BSH.WaterAlarmSystem.mute');
            $this->UnregisterProfile('BSH.Scenario.Trigger');
            $this->UnregisterProfile('BSH.SoftwareUpdate.swUpdateState');
            $this->UnregisterProfile('BSH.DisplayConfiguration.displayBrightness');
            $this->UnregisterProfile('BSH.DisplayConfiguration.displayOnTime');
            $this->UnregisterProfile('BSH.TemperatureOffset.offset');
            $this->UnregisterProfile('BSH.TerminalConfiguration.type');
            $this->UnregisterProfile('BSH.SurveillanceAlarm.value');
            $this->UnregisterProfile('BSH.IntrusionDetectionControl.value');
            $this->UnregisterProfile('BSH.IntrusionDetectionControl.activeProfile');
            $this->UnregisterProfile('BSH.IntrusionDetectionControl.DelayTime');
        }
    }
}
