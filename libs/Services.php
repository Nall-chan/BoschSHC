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
    },
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
    const IPSProfile = 'Profile';
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
            $Result[IPSProfile] = static::getIPSProfile($Property);
            $Result[IPSVarName] = static::getIPSName($Property);
            $Result[IPSVarAction] = static::getIPSAction($Property);
            $Result[IPSVarIdent] = explode('\\', get_called_class())[2] . '_' . $Property;
            return $Result;
        }
        public static function getIPSProfile(string $Property): string
        {
            return
                isset(static::$properties[$Property][IPSProfile]) ?
                static::$properties[$Property][IPSProfile] :
                '';
        }
        protected static function getServiceState(): string
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
            //todo
            //'automaticPowerOffTime' INTEGER

        ];
    }
    class PowerSwitchConfiguration extends ServiceBasics
    {
        protected static $properties = [
            'stateAfterPowerOutage' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.PowerSwitchConfiguration.stateAfterPowerOutage',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'State after power outage'
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
            'operationMode' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.RoomClimateControl.operationMode',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Operation mode'
            ],
            'setpointTemperature' => [
                'type'                   => 'string',
                IPSProfile               => 'BSH.RoomClimateControl.setpointTemperature',
                IPSVarType               => VARIABLETYPE_FLOAT,
                IPSVarAction             => true,
                IPSVarName               => 'Setpoint temperature',
                OverrideSendServiceState => 'climateControlState'
            ],
            'setpointTemperatureForLevelEco' => [
                'type'                   => 'string',
                IPSProfile               => 'BSH.RoomClimateControl.setpointTemperature',
                IPSVarType               => VARIABLETYPE_FLOAT,
                IPSVarAction             => true,
                IPSVarName               => 'Setpoint temperature eco',
                OverrideSendServiceState => 'climateControlState'
            ],
            'setpointTemperatureForLevelComfort' => [
                'type'                   => 'string',
                IPSProfile               => 'BSH.RoomClimateControl.setpointTemperature',
                IPSVarType               => VARIABLETYPE_FLOAT,
                IPSVarAction             => true,
                IPSVarName               => 'Setpoint temperature comfort',
                OverrideSendServiceState => 'climateControlState',
                OverrideSendServiceState => 'climateControlState'
            ],
            'ventilationMode' => [
                'type'                   => 'bool',
                IPSProfile               => '~Switch',
                IPSVarType               => VARIABLETYPE_BOOLEAN,
                IPSVarAction             => true,
                IPSVarName               => 'Ventilation mode active',
                OverrideSendServiceState => 'climateControlState'
            ],
            //low
            'boostMode' => [
                'type'                   => 'bool',
                IPSProfile               => '~Switch',
                IPSVarType               => VARIABLETYPE_BOOLEAN,
                IPSVarAction             => true,
                IPSVarName               => 'Boost mode active',
                OverrideSendServiceState => 'climateControlState'
            ],
            'summerMode' => [
                'type'                   => 'bool',
                IPSProfile               => '~Switch',
                IPSVarType               => VARIABLETYPE_BOOLEAN,
                IPSVarAction             => true,
                IPSVarName               => 'Summer mode active',
                OverrideSendServiceState => 'climateControlState'
            ],
            //supportsBoostMode
            'roomControlMode' => [
                'type'                   => 'string',
                IPSProfile               => 'BSH.RoomClimateControl.roomControlMode',
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
                'type'       => 'string',
                IPSProfile   => 'BSH.RoomClimateControl.operationMode',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Operation mode'
            ],
            'roomControlMode' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.RoomClimateControl.roomControlMode',
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
                IPSVarName   => 'Privacy mode'
            ]
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
                IPSVarName   => 'Level'
            ],
            'operationState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.ShutterControl.operationState',
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
                'type'       => 'string',
                IPSProfile   => 'BSH.SmokeDetectorCheck.value',
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
                'type'       => 'string',
                IPSProfile   => 'BSH.SmokeSensitivity.smokeSensitivity',
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
                'type'       => 'string',
                IPSProfile   => '~Intensity.100',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Valve position'
            ],
            'value' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.ValveTappet.value',
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
                IPSProfile   => 'BSH.AirQualityLevel.combinedRating',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Combined rating'
            ],
            'temperature' => [
                'type'       => 'number',
                IPSProfile   => '~Temperature',
                IPSVarType   => VARIABLETYPE_FLOAT,
                IPSVarName   => 'Temperature'
            ],
            'temperatureRating' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.AirQualityLevel.temperatureRating',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Temperature rating'
            ],
            'humidity' => [
                'type'       => 'number',
                IPSProfile   => '~Humidity',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Humidity'
            ],
            'humidityRating' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.AirQualityLevel.temperatureRating',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Humidity rating'
            ],
            'purity' => [ //todo profile
                'type'       => 'number',
                IPSProfile   => '',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Purity'
            ],
            'purityRating' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.AirQualityLevel.temperatureRating',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Purity rating'
            ]
        ];
    }
    class Keypad extends ServiceBasics
    {
        protected static $properties = [
            'keyCode' => [
                'type'       => 'integer',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Keycode'
            ],
            'keyName' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.Keypad.keyName',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Key name'
            ],
            'eventType' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.Keypad.eventType',
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
                'type'       => 'number',
                IPSProfile   => '~Humidity',
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
                IPSProfile   => '~Switch',
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
                'type'       => 'string',
                IPSProfile   => 'BSH.BatteryLevel.batteryLevel',
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
                'type'       => 'bool',
                IPSProfile   => '~Switch',
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
                'type'       => 'number',
                IPSProfile   => 'BSH.VentilationDelay.delay',
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
                'type'       => 'number',
                IPSVarFactor => 0.01,
                IPSProfile   => '~Lamella',
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
                'type'       => 'number',
                IPSVarFactor => 0.01,
                IPSProfile   => '~Shutter',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Level'
            ],
            'angle' => [
                'type'       => 'number',
                IPSVarFactor => 0.01,
                IPSProfile   => '~Lamella',
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
                IPSProfile   => '~Switch',
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
                IPSProfile   => '~Switch',
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
                IPSProfile   => '~Switch',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Routing state'
            ]
        ];
    }
    class HueBlinking extends ServiceBasics
    {
        protected static $properties = [
            'blinkingState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.HueBlinking.blinkingState',
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
                IPSProfile   => 'BSH.HueBridgeSearcher.searcherState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Searcher state'
            ],
            'value' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.HueBridgeSearcher.searcherState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Search result'
            ]
        ];
    }
    class HueBridgeConnector extends ServiceBasics
    {
        protected static $properties = [
            'hueBridgeConnectorState' => [ //todo Profile kein VALUE bekannt
                'type'       => 'string',
                IPSProfile   => '',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Connector state'
            ]
        ];
    }
    class CommunicationQuality extends ServiceBasics
    {
        protected static $properties = [
            'quality' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.CommunicationQuality.quality',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Communication quality'
            ]
        ];
    }
    class MultiswitchConfiguration extends ServiceBasics
    {
        protected static $properties = [
            'updateState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.MultiswitchConfiguration.updateState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Update'
            ]
        ];
    }
    class WalkTest extends ServiceBasics
    {
        protected static $properties = [
            'walkState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.WalkTest.walkState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Walktest'
            ],
            'petImmunityState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.WalkTest.walkState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Pet immunity'
            ]
        ];
    }
    class DoorSensor extends ServiceBasics
    {
        protected static $properties = [
            'doorState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.DoorSensor.doorState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Door state'
            ]
        ];
    }
    class LockActuator extends ServiceBasics
    {
        protected static $properties = [
            'lockState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.LockActuator.lockState',
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
                IPSProfile   => '~Switch',
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
                IPSProfile   => '~Alert',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Water leakage state'
            ]
        ];
    }
    class WaterLeakageSensorCheck extends ServiceBasics
    {
        protected static $properties = [
            'result' => [  //todo Profile
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
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
                IPSProfile   => '~Switch',
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
                IPSProfile   => '~Switch',
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
                'type'       => 'string',
                IPSProfile   => 'BSH.WaterAlarmSystem.state',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Water alarm system state'
            ],
            'mute' => [
                'type'       => 'number',
                IPSProfile   => 'BSH.WaterAlarmSystem.mute',
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
                'type'       => 'bool',
                IPSProfile   => '~Switch',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarName   => 'Enabled'
            ]
        ];
    }
    class SoftwareUpdate extends ServiceBasics
    {
        protected static $properties = [
            'swUpdateState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.SoftwareUpdate.swUpdateState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Software update state'
            ],
            'swUpdateLastResult' => [
                'type'       => 'string',
                //UPDATE_SUCCESS
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
                'type'       => 'bool',
                IPSProfile   => '~Switch',
                IPSVarType   => VARIABLETYPE_BOOLEAN,
                IPSVarAction => true,
                IPSVarName   => 'Automatic updates enabled'
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
                IPSProfile   => '~Switch',
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
                IPSProfile   => '~Switch',
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
                IPSProfile   => '~Switch',
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
                'type'       => 'number',
                IPSProfile   => 'BSH.DisplayConfiguration.displayBrightness',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Display brightness'
            ],
            'displayOnTime' => [
                'type'       => 'number',
                IPSProfile   => 'BSH.DisplayConfiguration.displayOnTime',
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
                'type'       => 'string',
                IPSProfile   => 'BSH.TemperatureOffset.offset',
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
                'type'       => 'string',
                IPSProfile   => 'BSH.TerminalConfiguration.type',
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
                IPSProfile               => '~Switch',
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
                IPSProfile              => '~Switch',
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
                IPSProfile              => '~Alert',
                IPSVarType              => VARIABLETYPE_BOOLEAN,
                IPSVarName              => 'Vibration sensor'
            ]
        ];
    }
    class SurveillanceAlarm extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.SurveillanceAlarm.value',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Surveillance alarm status'
            ]
        ];
    }
    class IntrusionDetectionControl extends ServiceBasics
    {
        protected static $properties = [
            'value' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.IntrusionDetectionControl.value',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Control'
            ],
            'activeProfile'           => [
                'type'       => 'number',
                IPSProfile   => 'BSH.IntrusionDetectionControl.activeProfile',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Active profile'
            ],
            'armActivationDelayTime'  => [
                'type'       => 'number',
                IPSProfile   => 'BSH.IntrusionDetectionControl.DelayTime',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Activation delay time'
            ],
            'alarmActivationDelayTime'=> [
                'type'       => 'number',
                IPSProfile   => 'BSH.IntrusionDetectionControl.DelayTime',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Alarm delay time'
            ]
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
     * @method void RegisterProfileStringEx(string $Name, string $Icon, string $Prefix, string $Suffix, array $Associations)
     * @method void RegisterProfileFloat(string $Name, string $Icon, string $Prefix, string $Suffix, float $MinValue, float $MaxValue, float $StepSize, int $Digits)
     * @method void RegisterProfileInteger(string $Name, string $Icon, string $Prefix, string $Suffix, int $MinValue, int $MaxValue, int $StepSize)
     * @method void RegisterProfileIntegerEx(string $Name, string $Icon, string $Prefix, string $Suffix, array $Associations, int $MaxValue = -1, float $StepSize = 0)
     * @method string TranslateProfile(string $Text)
     */
    trait IPSProfile
    {
        protected function RegisterProfiles()
        {
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\PowerSwitchConfiguration::getIPSProfile('stateAfterPowerOutage'),
                '',
                '',
                '',
                [
                    ['OFF', $this->TranslateProfile('off'), '', -1],
                    ['LAST_STATE', $this->TranslateProfile('laste state'), '', -1],
                    ['ON', $this->TranslateProfile('on'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\PowerSwitchProgram::getIPSProfile('operationMode'),
                'Clock',
                '',
                '',
                [
                    ['MANUAL', $this->TranslateProfile('manual'), '', -1],
                    ['SCHEDULE', $this->TranslateProfile('schedule'), '', -1]
                ]
            );
            $this->RegisterProfileFloat(
                \BoschSHC\Services\RoomClimateControl::getIPSProfile('setpointTemperature'),
                'Temperature',
                '',
                ' °C',
                5,
                30,
                0.5,
                1
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\RoomClimateControl::getIPSProfile('operationMode'),
                '',
                '',
                '',
                [
                    ['MANUAL', $this->TranslateProfile('manual'), '', -1],
                    ['AUTOMATIC', $this->TranslateProfile('automatic'), '', -1],
                    ['OFF', $this->TranslateProfile('off'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\RoomClimateControl::getIPSProfile('roomControlMode'),
                '',
                '',
                '',
                [
                    ['OFF', $this->TranslateProfile('off'), '', -1],
                    ['HEATING', $this->TranslateProfile('heating'), '', -1],
                    ['COOLING', $this->TranslateProfile('cooling'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\HCWasher::getIPSProfile('operationState'),
                'Menu',
                '',
                '',
                [
                    ['RUNNING', $this->TranslateProfile('running'), '', -1],
                    ['END', $this->TranslateProfile('end'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\HCDishwasher::getIPSProfile('operationState'),
                'Menu',
                '',
                '',
                [
                    ['RUNNING', $this->TranslateProfile('running'), '', -1],
                    ['END', $this->TranslateProfile('end'), '', -1],
                    ['STANDBY',  $this->TranslateProfile('standby'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\HCOven::getIPSProfile('operationState'),
                'Menu',
                '',
                '',
                [
                    ['RUNNING', $this->TranslateProfile('running'), '', -1],
                    ['END', $this->TranslateProfile('end'), '', -1],
                    ['STANDBY',  $this->TranslateProfile('standby'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\ShutterControl::getIPSProfile('operationState'),
                'Execute',
                '',
                '',
                [
                    ['STOPPED', $this->TranslateProfile('stopped'), '', -1],
                    ['MOVING', $this->TranslateProfile('moving'), '', -1]
                ]
            );

            $this->RegisterProfileStringEx(
                \BoschSHC\Services\SmokeDetectorCheck::getIPSProfile('value'),
                'Alert',
                '',
                '',
                [
                    ['NONE', $this->TranslateProfile('no test'), '', -1],
                    ['SMOKE_TEST_REQUESTED', $this->TranslateProfile('test requested'), '', -1],
                    ['SMOKE_TEST_OK', $this->TranslateProfile('test ok'), '', -1],
                    ['SMOKE_TEST_FAILED', $this->TranslateProfile('test failed'), '', -1],
                    ['COMMUNICATION_TEST_SENT', $this->TranslateProfile('communication test sent'), '', -1],
                    ['COMMUNICATION_TEST_OK', $this->TranslateProfile('communication test ok'), '', -1],
                    ['COMMUNICATION_TEST_REQUESTED', $this->TranslateProfile('communication test requested'), '', -1]
                ]
            );

            $this->RegisterProfileStringEx(
                \BoschSHC\Services\SmokeSensitivity::getIPSProfile('smokeSensitivity'),
                'Alert',
                '',
                '',
                [
                    ['HIGH', $this->TranslateProfile('high'), '', -1],
                    ['MIDDLE', $this->TranslateProfile('middle'), '', -1],
                    ['LOW', $this->TranslateProfile('low'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\ValveTappet::getIPSProfile('value'),
                '',
                '',
                '',
                [
                    ['NO_AVAILABLE', 'NOT_AVAILABLE', '', -1],
                    ['RUN_TO_START_POSITION', 'RUN_TO_START_POSITION', '', -1],
                    ['START_POSITION_REQUESTED', 'START_POSITION_REQUESTED', '', -1],
                    ['IN_START_POSITION', 'IN_START_POSITION', '', -1],
                    ['VALVE_ADAPTION_REQUESTED', 'VALVE_ADAPTION_REQUESTED', '', -1],
                    ['VALVE_ADAPTION_IN_PROGRESS', 'VALVE_ADAPTION_IN_PROGRESS', '', -1],
                    ['VALVE_ADAPTION_SUCCESSFUL', 'VALVE_ADAPTION_SUCCESSFUL', '', -1],
                    ['VALVE_TOO_TIGHT', 'VALVE_TOO_TIGHT', '', -1],
                    ['RANGE_TOO_BIG', 'RANGE_TOO_BIG', '', -1],
                    ['RANGE_TOO_SMALL', 'RANGE_TOO_SMALL', '', -1],
                    ['ERROR', 'ERROR', '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\AirQualityLevel::getIPSProfile('combinedRating'),
                '',
                '',
                '',
                [
                    ['OK', 'OK', '', -1],
                    ['COLD', 'COLD', '', -1],
                    ['COLD_DRY', 'COLD_DRY', '', -1],
                    ['COLD_HUMID', 'COLD_HUMID', '', -1],
                    ['COLD_STUFFY', 'COLD_STUFFY', '', -1],
                    ['COLD_DRY_STUFFY', 'COLD_DRY_STUFFY', '', -1],
                    ['COLD_HUMID_STUFFY', 'COLD_HUMID_STUFFY', '', -1],
                    ['LITTLE_COLD', 'LITTLE_COLD', '', -1],
                    ['LITTLE_DRY', 'LITTLE_DRY', '', -1],
                    ['LITTLE_HUMID', 'LITTLE_HUMID', '', -1],
                    ['LITTLE_STUFFY', 'LITTLE_STUFFY', '', -1],
                    ['LITTLE_WARM', 'LITTLE_WARM', '', -1],
                    ['DRY', 'DRY', '', -1],
                    ['DRY_STUFFY', 'DRY_STUFFY', '', -1],
                    ['HUMID', 'HUMID', '', -1],
                    ['HUMID_STUFFY', 'HUMID_STUFFY', '', -1],
                    ['STUFFY', 'STUFFY', '', -1],
                    ['WARM', 'WARM', '', -1],
                    ['WARM_DRY', 'WARM_DRY', '', -1],
                    ['WARM_HUMID', 'WARM_HUMID', '', -1],
                    ['WARM_STUFFY', 'WARM_STUFFY', '', -1],
                    ['WARM_HUMID_STUFFY', 'WARM_HUMID_STUFFY', '', -1],
                    ['WARM_DRY_STUFFY', 'WARM_DRY_STUFFY', '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\AirQualityLevel::getIPSProfile('temperatureRating'),
                '',
                '',
                '',
                [
                    ['GOOD', $this->TranslateProfile('good'), '', -1],
                    ['MEDIUM', $this->TranslateProfile('medium'), '', -1],
                    ['BAD', $this->TranslateProfile('bad'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\Keypad::getIPSProfile('keyName'),
                'Execute',
                '',
                '',
                [
                    ['LOWER_BUTTON', $this->TranslateProfile('Lower button'), '', -1],
                    ['UPPER_BUTTON', $this->TranslateProfile('Upper button'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\Keypad::getIPSProfile('eventType'),
                'Execute',
                '',
                '',
                [
                    ['PRESS_SHORT', $this->TranslateProfile('short'), '', -1],
                    ['PRESS_LONG', $this->TranslateProfile('long'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\BatteryLevel::getIPSProfile('batteryLevel'),
                'Execute',
                '',
                '',
                [
                    ['OK', $this->TranslateProfile('ok'), '', -1],
                    ['LOW_BATTERY', $this->TranslateProfile('low battery'), '', -1],
                    ['CRITICAL_LOW', $this->TranslateProfile('critically low'), '', -1],
                    ['CRITICALLY_LOW_BATTERY', $this->TranslateProfile('critically low battery'), '', -1],
                    ['NOT_AVAILABLE', $this->TranslateProfile('not available'), '', -1],
                ]
            );
            $this->RegisterProfileInteger(
                \BoschSHC\Services\VentilationDelay::getIPSProfile('delay'),
                'Clock',
                '',
                $this->TranslateProfile(' seconds'),
                0,
                3600,
                1
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\HueBlinking::getIPSProfile('blinkingState'),
                '',
                '',
                '',
                [
                    ['OFF', $this->TranslateProfile('off'), '', -1],
                    ['ON', $this->TranslateProfile('on'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\HueBridgeSearcher::getIPSProfile('searcherState'),
                '',
                '',
                '',
                [
                    ['BRIDGE_SEARCH_REQUESTED', 'BRIDGE_SEARCH_REQUESTED', '', -1],
                    ['BRIDGE_SEARCH_STARTED', 'BRIDGE_SEARCH_STARTED', '', -1],
                    ['BRIDGES_FOUND', 'BRIDGES_FOUND', '', -1],
                    ['NO_BRIDGE_FOUND', 'NO_BRIDGE_FOUND', '', -1],
                    ['ERROR', 'ERROR', '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\CommunicationQuality::getIPSProfile('quality'),
                '',
                '',
                '',
                [
                    ['GOOD', $this->TranslateProfile('good'), '', -1],
                    ['BAD', $this->TranslateProfile('bad'), '', -1],
                    ['NORMAL', $this->TranslateProfile('normal'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1],
                    ['FETCHING', $this->TranslateProfile('fetching'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\MultiswitchConfiguration::getIPSProfile('updateState'),
                '',
                '',
                '',
                [
                    ['UPDATING', $this->TranslateProfile('updating'), '', -1],
                    ['UP_TO_DATE', $this->TranslateProfile('up to date'), '', -1],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\WalkTest::getIPSProfile('walkState'),
                '',
                '',
                '',
                [
                    ['WALK_TEST_STARTED', $this->TranslateProfile('started'), '', -1],
                    ['WALK_TEST_STOPPED', $this->TranslateProfile('stopped'), '', -1],
                    ['WALK_TEST_UNKNOWN', $this->TranslateProfile('unknown'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\DoorSensor::getIPSProfile('doorState'),
                '',
                '',
                '',
                [
                    ['DOOR_CLOSED', $this->TranslateProfile('closed'), '', -1],
                    ['DOOR_OPEN', $this->TranslateProfile('open'), '', -1],
                    ['DOOR_UNKNOWN', $this->TranslateProfile('unknown'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\LockActuator::getIPSProfile('lockState'),
                '',
                '',
                '',
                [
                    ['UNLOCKED', $this->TranslateProfile('unlocked'), '', -1],
                    ['LOCKED', $this->TranslateProfile('locked'), '', -1],
                    ['LOCKING', $this->TranslateProfile('locking'), '', -1],
                    ['UNLOCKING', $this->TranslateProfile('unlocking'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\WaterAlarmSystem::getIPSProfile('state'),
                'Alert',
                '',
                '',
                [
                    ['ALARM_OFF', $this->TranslateProfile('off'), '', -1],
                    ['WATER_ALARM', $this->TranslateProfile('alarm'), '', -1],
                    ['ALARM_MUTED', $this->TranslateProfile('muted'), '', -1]
                ]
            );
            $this->RegisterProfileIntegerEx(
                \BoschSHC\Services\WaterAlarmSystem::getIPSProfile('mute'),
                '',
                '',
                '',
                [
                    [0, $this->TranslateProfile('Execute'), '', -1]
                ]
            );
            $this->RegisterProfileIntegerEx(
                'BSH.Scenario.Trigger',
                '',
                '',
                '',
                [
                    [0, $this->TranslateProfile('Execute'), '', -1]
                ]
            );
            $this->RegisterProfileInteger(
                \BoschSHC\Services\DisplayConfiguration::getIPSProfile('displayBrightness'),
                '',
                '',
                ' %',
                10,
                100,
                10
            );
            $this->RegisterProfileInteger(
                \BoschSHC\Services\DisplayConfiguration::getIPSProfile('displayOnTime'),
                '',
                '',
                $this->TranslateProfile(' seconds'),
                5,
                30,
                5
            );
            $this->RegisterProfileFloat(
                \BoschSHC\Services\TemperatureOffset::getIPSProfile('offset'),
                '',
                '',
                '',
                -5,
                5,
                0.1,
                1
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\TerminalConfiguration::getIPSProfile('type'),
                '',
                '',
                '',
                [
                    ['OUTDOOR_SENSOR_CONNECTED', $this->TranslateProfile('outdoor sensor connected'), '', -1],
                    ['FLOOR_SENSOR_DISPLAYED_AND_USED_FOR_REGULATION', $this->TranslateProfile('floor sensor (displayed & used)'), '', -1],
                    ['FLOOR_SENSOR_DISPLAYED', $this->TranslateProfile('floor sensor displayed'), '', -1],
                    ['NOT_CONNECTED', $this->TranslateProfile('not connected'), '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\SoftwareUpdate::getIPSProfile('swUpdateState'),
                '',
                '',
                '',
                [
                    ['NO_UPDATE_AVAILABLE', $this->TranslateProfile('no update available'), '', -1],
                    ['UPDATE_IN_PROGRESS', $this->TranslateProfile('update in progress'), '', -1],
                    ['UPDATE_AVAILABLE', $this->TranslateProfile('update available'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\SurveillanceAlarm::getIPSProfile('value'),
                '',
                '',
                '',
                [
                    ['ALARM_ON', $this->TranslateProfile('on'), '', 0xff0000],
                    ['ALARM_OFF', $this->TranslateProfile('off'), '', 0x00ff00],
                    ['ALARM_MUTED', $this->TranslateProfile('muted'), '', 0x0000ff],
                    ['PRE_ALARM', $this->TranslateProfile('Pre-alarm'), '', 0x900000],
                    ['UNKNOWN', $this->TranslateProfile('unknown'), '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\IntrusionDetectionControl::getIPSProfile('value'),
                '',
                '',
                '',
                [
                    ['SYSTEM_ARMING', $this->TranslateProfile('is arming'), '', 0x900000],
                    ['SYSTEM_ARMED', $this->TranslateProfile('armed'), '', 0xff0000],
                    ['SYSTEM_DISARMED', $this->TranslateProfile('disarmed'), '', 0x00ff00],
                    ['MUTE_ALARM', $this->TranslateProfile('muted'), '', 0x0000ff]
                ]
            );
            $this->RegisterProfileIntegerEx(
                \BoschSHC\Services\IntrusionDetectionControl::getIPSProfile('activeProfile'),
                '',
                '',
                '',
                [
                    [0, $this->TranslateProfile('full protection'), '', -1],
                    [1, $this->TranslateProfile('partial protection'), '', -1],
                    [2, $this->TranslateProfile('customized protection'), '', -1]
                ]
            );
            $this->RegisterProfileInteger(
                \BoschSHC\Services\IntrusionDetectionControl::getIPSProfile('DelayTime'),
                'Clock',
                '',
                $this->TranslateProfile(' seconds'),
                0,
                600,
                1
            );
        }
        protected function UnregisterProfiles()
        {
            $this->UnregisterProfile(\BoschSHC\Services\PowerSwitchConfiguration::getIPSProfile('stateAfterPowerOutage'));
            $this->UnregisterProfile(\BoschSHC\Services\PowerSwitchProgram::getIPSProfile('operationMode'));
            $this->UnregisterProfile(\BoschSHC\Services\RoomClimateControl::getIPSProfile('setpointTemperature'));
            $this->UnregisterProfile(\BoschSHC\Services\RoomClimateControl::getIPSProfile('operationMode'));
            $this->UnregisterProfile(\BoschSHC\Services\RoomClimateControl::getIPSProfile('roomControlMode'));
            $this->UnregisterProfile(\BoschSHC\Services\HCWasher::getIPSProfile('operationState'));
            $this->UnregisterProfile(\BoschSHC\Services\HCDishwasher::getIPSProfile('operationState'));
            $this->UnregisterProfile(\BoschSHC\Services\HCOven::getIPSProfile('operationState'));
            $this->UnregisterProfile(\BoschSHC\Services\ShutterControl::getIPSProfile('operationState'));
            $this->UnregisterProfile(\BoschSHC\Services\SmokeDetectorCheck::getIPSProfile('value'));
            $this->UnregisterProfile(\BoschSHC\Services\SmokeSensitivity::getIPSProfile('smokeSensitivity'));
            $this->UnregisterProfile(\BoschSHC\Services\ValveTappet::getIPSProfile('value'));
            $this->UnregisterProfile(\BoschSHC\Services\AirQualityLevel::getIPSProfile('combinedRating'));
            $this->UnregisterProfile(\BoschSHC\Services\AirQualityLevel::getIPSProfile('temperatureRating'));
            $this->UnregisterProfile(\BoschSHC\Services\Keypad::getIPSProfile('keyName'));
            $this->UnregisterProfile(\BoschSHC\Services\Keypad::getIPSProfile('eventType'));
            $this->UnregisterProfile(\BoschSHC\Services\BatteryLevel::getIPSProfile('batteryLevel'));
            $this->UnregisterProfile(\BoschSHC\Services\VentilationDelay::getIPSProfile('delay'));
            $this->UnregisterProfile(\BoschSHC\Services\HueBlinking::getIPSProfile('blinkingState'));
            $this->UnregisterProfile(\BoschSHC\Services\HueBridgeSearcher::getIPSProfile('searcherState'));
            $this->UnregisterProfile(\BoschSHC\Services\CommunicationQuality::getIPSProfile('quality'));
            $this->UnregisterProfile(\BoschSHC\Services\MultiswitchConfiguration::getIPSProfile('updateState'));
            $this->UnregisterProfile(\BoschSHC\Services\WalkTest::getIPSProfile('walkState'));
            $this->UnregisterProfile(\BoschSHC\Services\DoorSensor::getIPSProfile('doorState'));
            $this->UnregisterProfile(\BoschSHC\Services\LockActuator::getIPSProfile('lockState'));
            $this->UnregisterProfile(\BoschSHC\Services\WaterAlarmSystem::getIPSProfile('state'));
            $this->UnregisterProfile(\BoschSHC\Services\WaterAlarmSystem::getIPSProfile('mute'));
            $this->UnregisterProfile('BSH.Scenario.Trigger');
            $this->UnregisterProfile(\BoschSHC\Services\DisplayConfiguration::getIPSProfile('displayBrightness'));
            $this->UnregisterProfile(\BoschSHC\Services\DisplayConfiguration::getIPSProfile('displayOnTime'));
            $this->UnregisterProfile(\BoschSHC\Services\TemperatureOffset::getIPSProfile('offset'));
            $this->UnregisterProfile(\BoschSHC\Services\TerminalConfiguration::getIPSProfile('type'));
            $this->UnregisterProfile(\BoschSHC\Services\SoftwareUpdate::getIPSProfile('swUpdateState'));
            $this->UnregisterProfile(\BoschSHC\Services\SurveillanceAlarm::getIPSProfile('value'));
            $this->UnregisterProfile(\BoschSHC\Services\IntrusionDetectionControl::getIPSProfile('value'));
            $this->UnregisterProfile(\BoschSHC\Services\IntrusionDetectionControl::getIPSProfile('activeProfile'));
            $this->UnregisterProfile(\BoschSHC\Services\IntrusionDetectionControl::getIPSProfile('DelayTime'));
        }
    }
}
