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
        const SmokeSensitivity = 'SmokeSensitivity';
        const ValveTappet = 'ValveTappet';
        const AirQualityLevel = 'AirQualityLevel';
        const Keypad = 'Keypad';
        const HumidityLevel = 'HumidityLevel';
        const CameraLight = 'CameraLight';
        const BatteryLevel = 'BatteryLevel';
        const MultiLevelSwitch = 'MultiLevelSwitch';
        const PresenceSimulationConfiguration = 'PresenceSimulationConfiguration';
        const PresenceSimulationScheduling = 'PresenceSimulationScheduling';
        const VentilationDelay = 'VentilationDelay';
        const BlindsControl = 'BlindsControl';
        const BlindsSceneControl = 'BlindsSceneControl';
        const ChildLock = 'ChildLock';
        const SilentMode = 'SilentMode';
        const Routing = 'Routing';
        const HueBlinking = 'HueBlinking';
        const HueBridgeSearcher = 'HueBridgeSearcher';
        const HueBridgeConnector = 'HueBridgeConnector'; //todo
        const CommunicationQuality = 'CommunicationQuality';
        const MultiswitchConfiguration = 'MultiswitchConfiguration';
        const WalkTest = 'WalkTest';
        const ClimateControl = 'ClimateControl';
        const DoorSensor = 'DoorSensor';
        const LockActuator = 'LockActuator';
        const CameraNotification = 'CameraNotification';
        const ColorActuator = 'ColorActuator';
        const WaterLeakageSensor = 'WaterLeakageSensor';
        const WaterLeakageSensorCheck = 'WaterLeakageSensorCheck';
        const WaterLeakageSensorTilt = 'WaterLeakageSensorTilt';
        const WaterAlarmSystem = 'WaterAlarmSystem';
        const AutomationRule = 'AutomationRule';
        const SoftwareUpdate = 'SoftwareUpdate';
        const RemoteAccess = 'RemoteAccess';
        const RemotePushNotification = 'RemotePushNotification';
        const ArmDisarmPushNotification = 'ArmDisarmPushNotification';

        //todo
        const Thermostat = 'Thermostat';
        const VibrationSensor = 'VibrationSensor';
        const Bypass = 'Bypass';
        const IntrusionDetectionControl = 'IntrusionDetectionControl';
        /*
            intrusionDetectionControlState: {
        value: {
            'SYSTEM_ARMING': 'SYSTEM_ARMING',
            'SYSTEM_ARMED': 'SYSTEM_ARMED',
            'SYSTEM_DISARMED': 'SYSTEM_DISARMED',
            'MUTE_ALARM': 'MUTE_ALARM'
        }*/
        const SurveillanceAlarm = 'SurveillanceAlarm';
        /*
            surveillanceAlarmState: {
        value: {
            'ALARM_ON': 'ALARM_ON',
            'ALARM_OFF': 'ALARM_OFF',
            'ALARM_MUTED': 'ALARM_MUTED',
            'PRE_ALARM': 'PRE_ALARM',
            'UNKNOWN': 'UNKNOWN'
        }
    },*/
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
            self::CommunicationQuality,
            self::MultiswitchConfiguration,
            self::WalkTest,
            self::ClimateControl,
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
        ];

        public static function ServiceIsValid(string $Service)
        {
            return in_array($Service, self::$Services);
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
    const IPSProfile = 'Profile';
    const IPSVarType = 'VarType';
    const IPSVarFactor = 'Factor';
    const IPSVarName = 'VarName';
    const IPSVarValue = 'VarValue';
    const IPSVarAction = 'VarAction';
    const IPSVarIdent = 'VarIdent';

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
            $Result[IPSVarIdent] = explode('\\', get_called_class())[2] . '_' . $Property;
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
            'purity' => [ //todo
                'type' => 'number',
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
                IPSVarName   => 'Keycode'
            ],
            'eventType' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.Keypad.eventType',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Keycode'
            ],
            'eventTimestamp' => [
                'type'       => 'integer',
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarName   => 'Timestamp'
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
                IPSVarName   => 'Camera light state'
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
                IPSVarName   => 'Battery level'
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
                IPSVarName   => 'State'
            ],
            'runningStartTime' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Running start time'
            ],
            'runningEndTime' => [
                'type'       => 'string',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Running end time'
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
                IPSVarName   => 'Searcher value'
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
                IPSVarName   => 'Update state'
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
                IPSVarName   => 'Walk state'
            ],
            'petImmunityState' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.WalkTest.walkState',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarName   => 'Pet immunity state'
            ]
        ];
    }
    class ClimateControl extends ServiceBasics
    {
        protected static $properties = [
            'operationMode' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.ClimateControl.operationMode',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Operation mode'
            ],
            'roomControlMode' => [
                'type'       => 'string',
                IPSProfile   => 'BSH.ClimateControl.roomControlMode',
                IPSVarType   => VARIABLETYPE_STRING,
                IPSVarAction => true,
                IPSVarName   => 'Operation mode'
            ]
        ];
    }
    // todo roomClimateControl_hz_xy
    // Yes, right, you can only set the temperature for the entire room and not for individual devices.
    // If you want to do this, you have to separate them into individual rooms.
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
            'result' => [
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
                //NO_UPDATE_AVAILABLE
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
                ],                IPSProfile   => '~Switch',
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
    trait IPSProfile
    {
        protected function RegisterProfiles()
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
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\ShutterControl::getIPSProfile('operationState'),
                'Execute',
                '',
                '',
                [
                    ['STOPPED', 'stopped', '', -1],
                    ['MOVING', 'moving', '', -1]
                ]
            );

            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\SmokeDetectorCheck::getIPSProfile('value'),
                'Alert',
                '',
                '',
                [
                    ['NONE', 'none', '', -1],
                    ['SMOKE_TEST_REQUESTED', 'test requested', '', -1],
                    ['SMOKE_TEST_OK', 'test ok', '', -1],
                    ['SMOKE_TEST_FAILED', 'test failed', '', -1],
                    ['COMMUNICATION_TEST_SENT', 'COMMUNICATION_TEST_SENT', '', -1],
                    ['COMMUNICATION_TEST_OK', 'COMMUNICATION_TEST_OK', '', -1],
                    ['COMMUNICATION_TEST_REQUESTED', 'COMMUNICATION_TEST_REQUESTED', '', -1]
                ]
            );

            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\SmokeSensitivity::getIPSProfile('smokeSensitivity'),
                'Alert',
                '',
                '',
                [
                    ['HIGH', 'HIGH', '', -1],
                    ['MIDDLE', 'MIDDLE', '', -1],
                    ['LOW', 'LOW', '', -1],
                    ['UNKNOWN', 'UNKNOWN', '', -1]
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
                    ['UNKNOWN', 'UNKNOWN', '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
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
                    ['UNKNOWN', 'unknown', '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\AirQualityLevel::getIPSProfile('temperatureRating'),
                '',
                '',
                '',
                [
                    ['GOOD', 'good', '', -1],
                    ['MEDIUM', 'medium', '', -1],
                    ['BAD', 'bad', '', -1],
                    ['UNKNOWN', 'unknown', '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\Keypad::getIPSProfile('keyName'),
                'Execute',
                '',
                '',
                [
                    ['LOWER_BUTTON', 'Lower button', '', -1],
                    ['UPPER_BUTTON', 'Upper button', '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\Keypad::getIPSProfile('eventType'),
                'Execute',
                '',
                '',
                [
                    ['PRESS_SHORT', 'Short press', '', -1],
                    ['PRESS_LONG', 'Long press', '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\BatteryLevel::getIPSProfile('batteryLevel'),
                'Execute',
                '',
                '',
                [
                    ['OK', 'ok', '', -1],
                    ['LOW_BATTERY', 'low battery', '', -1],
                    ['CRITICAL_LOW', 'critically low', '', -1],
                    ['CRITICALLY_LOW_BATTERY', 'critically low battery', '', -1],
                    ['NOT_AVAILABLE', 'not available', '', -1],
                ]
            );
            $this->RegisterProfileInteger(
                \BoschSHC\Services\VentilationDelay::getIPSProfile('delay'),
                'Clock',
                '',
                ' seconds',
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
                    ['OFF', 'off', '', -1],
                    ['ON', 'on', '', -1],
                    ['UNKNOWN', 'unknown', '', -1]
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
                    ['UNKNOWN', 'UNKNOWN', '', -1]
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\CommunicationQuality::getIPSProfile('quality'),
                '',
                '',
                '',
                [
                    ['GOOD', 'GOOD', '', -1],
                    ['BAD', 'BAD', '', -1],
                    ['NORMAL', 'NORMAL', '', -1],
                    ['UNKNOWN', 'UNKNOWN', '', -1],
                    ['FETCHING', 'FETCHING', '', -1]
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\MultiswitchConfiguration::getIPSProfile('updateState'),
                '',
                '',
                '',
                [
                    ['UPDATING', 'UPDATING', '', -1],
                    ['UP_TO_DATE', 'UP_TO_DATE', '', -1],
                    ['UNKNOWN', 'UNKNOWN', '', -1]
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\WalkTest::getIPSProfile('walkState'),
                '',
                '',
                '',
                [
                    ['WALK_TEST_STARTED', 'WALK_TEST_STARTED', '', -1],
                    ['WALK_TEST_STOPPED', 'WALK_TEST_STOPPED', '', -1],
                    ['WALK_TEST_UNKNOWN', 'WALK_TEST_UNKNOWN', '', -1]
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\ClimateControl::getIPSProfile('operationMode'),
                '',
                '',
                '',
                [
                    ['MANUAL', 'MANUAL', '', -1],
                    ['AUTOMATIC', 'AUTOMATIC', '', -1],
                    ['OFF', 'OFF', '', -1],
                    ['UNKNOWN', 'UNKNOWN', '', -1],
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\ClimateControl::getIPSProfile('roomControlMode'),
                '',
                '',
                '',
                [
                    ['OFF', 'OFF', '', -1],
                    ['HEATING', 'HEATING', '', -1],
                    ['COOLING', 'COOLING', '', -1],
                    ['UNKNOWN', 'UNKNOWN', '', -1],
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\DoorSensor::getIPSProfile('doorState'),
                '',
                '',
                '',
                [
                    ['DOOR_CLOSED', 'DOOR_CLOSED', '', -1],
                    ['DOOR_OPEN', 'DOOR_OPEN', '', -1],
                    ['DOOR_UNKNOWN', 'DOOR_UNKNOWN', '', -1]
                ]
            );
            $this->RegisterProfileStringEx( //todo
                \BoschSHC\Services\LockActuator::getIPSProfile('lockState'),
                '',
                '',
                '',
                [
                    ['UNLOCKED', 'UNLOCKED', '', -1],
                    ['LOCKED', 'LOCKED', '', -1],
                    ['LOCKING', 'LOCKING', '', -1],
                    ['UNLOCKING', 'UNLOCKING', '', -1],
                ]
            );
            $this->RegisterProfileStringEx(
                \BoschSHC\Services\WaterAlarmSystem::getIPSProfile('state'),
                '',
                '',
                '',
                [
                    ['ALARM_OFF', 'ALARM_OFF', '', -1],
                    ['WATER_ALARM', 'WATER_ALARM', '', -1],
                    ['ALARM_OFF', 'ALARM_OFF', '', -1],
                    ['ALARM_MUTED', 'ALARM_MUTED', '', -1]
                ]
            );
            $this->RegisterProfileIntegerEx(
                \BoschSHC\Services\WaterAlarmSystem::getIPSProfile('mute'),
                '',
                '',
                '',
                [
                    [0, 'Execute', '', -1]
                ]
            );
            $this->RegisterProfileIntegerEx(
                'BSH.Scenario.Trigger',
                '',
                '',
                '',
                [
                    [0, 'Execute', '', -1]
                ]
            );
        }
        protected function UnregisterProfiles()
        {
            $this->UnregisterProfile(\BoschSHC\Services\PowerSwitchProgram::getIPSProfile('operationMode'));
            $this->UnregisterProfile(\BoschSHC\Services\RoomClimateControl::getIPSProfile('setpointTemperature'));
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
            $this->UnregisterProfile(\BoschSHC\Services\ClimateControl::getIPSProfile('operationMode'));
            $this->UnregisterProfile(\BoschSHC\Services\ClimateControl::getIPSProfile('roomControlMode'));
            $this->UnregisterProfile(\BoschSHC\Services\DoorSensor::getIPSProfile('doorState'));
            $this->UnregisterProfile(\BoschSHC\Services\LockActuator::getIPSProfile('lockState'));
            $this->UnregisterProfile(\BoschSHC\Services\WaterAlarmSystem::getIPSProfile('mute'));
            $this->UnregisterProfile(\BoschSHC\Services\WaterAlarmSystem::getIPSProfile('mute'));
            $this->UnregisterProfile('BSH.Scenario.Trigger');
        }
    }

}
