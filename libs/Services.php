<?php

declare(strict_types=1);

namespace BoschSHC
{
    class Services
    {
        const PowerMeter = 'PowerMeter';
        const PowerSwitch = 'PowerSwitch';
        const RoomClimateControl = 'RoomClimateControl';
        const TemperatureLevel = 'TemperatureLevel';
        protected static $Services = [
            self::PowerMeter,
            self::PowerSwitch,
            self::RoomClimateControl,
            self::TemperatureLevel,
        ];
        public static function ServiceIsValid(array $Service)
        {
            return in_array($Service['id'], self::$Services);
        }
        public static function getServiceIdByProperty(string $Property)
        {
            foreach (self::$Services as $ServiceId) {
                if (('\\BoschSHC\\Services\\' . $ServiceId)::PropertyIsValid($Property)) {
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
        private static function getIPSProfile(string $Property)
        {
            return
                isset(static::$properties[$Property][IPSProfile]) ?
                static::$properties[$Property][IPSProfile] :
                '';
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
            ],
            'automaticPowerOffTime' => [
                'type'       => 'number',
                IPSProfile   => '', //todo
                IPSVarType   => VARIABLETYPE_INTEGER,
                IPSVarAction => true,
                IPSVarName   => 'Automatic power off time'
            ],
        ];
    }
    class RoomClimateControl extends ServiceBasics
    {
    }
    class TemperatureLevel extends ServiceBasics
    {
    }
}