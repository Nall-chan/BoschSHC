<?php

declare(strict_types=1);
//SmartPlug
$f = [
    'paths' => [
        '/devices/{deviceId}/services/PowerMeter' => [
            'get' => [
                'summary'     => 'Retrieve the PowerMeter service of the SmartPlug.',
                'description' => 'With this service you always have an eye on energy consumption.',
                'tags'        => [
                    0 => 'Services',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The PowerMeter was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PowerMeterService',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/PowerMeter/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the PowerMeter service.',
                'description' => 'Retrieve the state of the PowerMeter service identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The state of PowerMeter was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PowerMeterServiceStates',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/PowerSwitch' => [
            'get' => [
                'summary'     => 'Retrieve the PowerSwitch service of the SmartPlug.',
                'description' => 'Switch electrical appliances on and off. Can be used with electrical appliances with high ratings of up to 3680 W.',
                'tags'        => [
                    0 => 'Services',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The PowerSwitch was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PowerSwitchService',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/PowerSwitch/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the PowerSwitch service.',
                'description' => 'Retrieve the state of the PowerSwitch service identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The state of PowerSwitch was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PowerSwitchServiceStates',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'put' => [
                'summary'     => 'Executes the powerSwitchState on the device.',
                'description' => 'Executes the powerSwitchState on the device identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    204 => [
                        'description' => 'Accepted request.',
                    ],
                    400 => [
                        'description' => 'One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined path parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                    405 => [
                        'description' => 'The method was not allowed.',
                    ],
                    422 => [
                        'description' => 'Mapping of defined query parameter failed.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
                'requestBody' => [
                    '$ref' => '#/components/requestBodies/PowerSwitchServicePowerSwitchStatePayload',
                ],
            ],
        ],
    ],
    'components' => [
        'schemas' => [
            'AdvancedError' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type'        => 'string',
                        'description' => 'The type of the Object.',
                        'example'     => 'JsonRestExceptionResponseEntity',
                    ],
                    'errorCode' => [
                        'type'        => 'string',
                        'description' => 'The error code of the occurred Exception.',
                    ],
                    'statusCode' => [
                        'type'        => 'integer',
                        'description' => 'The HTTP status of the error.',
                    ],
                ],
            ],
            'ServiceDefinition' => [
                'type'        => 'array',
                'minItems'    => 1,
                'uniqueItems' => true,
                'items'       => [
                    'type'        => 'string',
                    'description' => 'A single fully qualified identifier of the Service of a Device.',
                ],
                'example' => [
                    0 => 'PowerMeter',
                    1 => 'PowerSwitch',
                ],
            ],
            'PowerMeterServiceStates' => [
                'type'        => 'object',
                'description' => 'PowerMeterService states of SmartPlug',
                'properties'  => [
                    'powerConsumption' => [
                        'type' => 'number',
                    ],
                    'energyConsumption' => [
                        'type' => 'number',
                    ],
                ],
            ],
            'PowerMeterService' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'DeviceServiceData',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'id' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'deviceServiceId',
                        ],
                        'description' => 'A single fully qualified identifier of the Service of a Device.',
                    ],
                    'deviceId' => [
                        'type'        => 'string',
                        'description' => 'A single fully qualified identifier of the Device.',
                    ],
                    'state' => [
                        '$ref' => '#/components/schemas/PowerMeterServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
                        'description' => 'The path to the Property.',
                    ],
                ],
            ],
            'PowerSwitchServiceStates' => [
                'type'        => 'object',
                'description' => 'PowerSwitchService states of SmartPlug',
                'properties'  => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'powerSwitchState',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'switchState' => [
                        '$ref' => '#/components/schemas/PowerSwitchState',
                    ],
                ],
            ],
            'PowerSwitchService' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'DeviceServiceData',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'id' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'deviceServiceId',
                        ],
                        'description' => 'A single fully qualified identifier of the Service of a Device.',
                    ],
                    'deviceId' => [
                        'type'        => 'string',
                        'description' => 'A single fully qualified identifier of the Device.',
                    ],
                    'state' => [
                        '$ref' => '#/components/schemas/PowerSwitchServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
                        'description' => 'The path to the Property.',
                    ],
                ],
            ],
            'PowerSwitchState' => [
                'type' => 'string',
                'enum' => [
                    0 => 'ON',
                    1 => 'OFF',
                ],
            ],
        ],
        'requestBodies' => [
            'PowerSwitchServicePowerSwitchStatePayload' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type'       => 'object',
                            'properties' => [
                                '@type' => [
                                    'type' => 'string',
                                    'enum' => [
                                        0 => 'powerSwitchState',
                                    ],
                                    'description' => 'The type of the Object.',
                                ],
                                'switchState' => [
                                    '$ref' => '#/components/schemas/PowerSwitchState',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'parameters' => [
            'apiVersionHeaderParam' => [
                'in'          => 'header',
                'name'        => 'api-version',
                'description' => 'The version of the API.',
                'schema'      => [
                    'type'    => 'string',
                    'example' => '1.0',
                ],
            ],
            'deviceIdPathParam' => [
                'name'        => 'deviceId',
                'in'          => 'path',
                'description' => 'A single fully qualified identifier of the Device.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
            'propertyPathPathParam' => [
                'name'        => 'propertyPath',
                'in'          => 'path',
                'description' => 'The path to the Property.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
        ],
    ],
];
//Climate Control
$d = [
    'paths' => [
        '/devices/{deviceId}/services/RoomClimateControl' => [
            'get' => [
                'summary'     => 'Retrieve the RoomClimateControl service of the ClimateControl.',
                'description' => 'Control of up to six Bosch Smart Home radiator thermostats per room with this virtual device.',
                'tags'        => [
                    0 => 'Services',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The RoomClimateControl was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/RoomClimateControlService',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/RoomClimateControl/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the RoomClimateControl service.',
                'description' => 'Retrieve the state of the RoomClimateControl service identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The state of RoomClimateControl was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/RoomClimateControlServiceStates',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'put' => [
                'summary'     => 'Executes the climateControlState on the device.',
                'description' => 'Executes the climateControlState on the device identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    204 => [
                        'description' => 'Accepted request.',
                    ],
                    400 => [
                        'description' => 'One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined path parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                    405 => [
                        'description' => 'The method was not allowed.',
                    ],
                    422 => [
                        'description' => 'Mapping of defined query parameter failed.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
                'requestBody' => [
                    '$ref' => '#/components/requestBodies/RoomClimateControlServiceClimateControlStatePayload',
                ],
            ],
        ],
        '/devices/{deviceId}/services/TemperatureLevel' => [
            'get' => [
                'summary'     => 'Retrieve the TemperatureLevel service of the ClimateControl.',
                'description' => 'Measures the temperature at a central point in the room.',
                'tags'        => [
                    0 => 'Services',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The TemperatureLevel was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/TemperatureLevelService',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/TemperatureLevel/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the TemperatureLevel service.',
                'description' => 'Retrieve the state of the TemperatureLevel service identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The state of TemperatureLevel was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/TemperatureLevelServiceStates',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'schemas' => [
            'AdvancedError' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type'        => 'string',
                        'description' => 'The type of the Object.',
                        'example'     => 'JsonRestExceptionResponseEntity',
                    ],
                    'errorCode' => [
                        'type'        => 'string',
                        'description' => 'The error code of the occurred Exception.',
                    ],
                    'statusCode' => [
                        'type'        => 'integer',
                        'description' => 'The HTTP status of the error.',
                    ],
                ],
            ],
            'ServiceDefinition' => [
                'type'        => 'array',
                'minItems'    => 1,
                'uniqueItems' => true,
                'items'       => [
                    'type'        => 'string',
                    'description' => 'A single fully qualified identifier of the Service of a Device.',
                ],
                'example' => [
                    0 => 'RoomClimateControl',
                    1 => 'TemperatureLevel',
                ],
            ],
            'RoomClimateControlServiceStates' => [
                'type'        => 'object',
                'description' => 'RoomClimateControlService states of ClimateControl',
                'properties'  => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'climateControlState',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'setpointTemperature' => [
                        '$ref' => '#/components/schemas/SetpointTemperatureState',
                    ],
                ],
            ],
            'RoomClimateControlService' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'DeviceServiceData',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'id' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'deviceServiceId',
                        ],
                        'description' => 'A single fully qualified identifier of the Service of a Device.',
                    ],
                    'deviceId' => [
                        'type'        => 'string',
                        'description' => 'A single fully qualified identifier of the Device.',
                    ],
                    'state' => [
                        '$ref' => '#/components/schemas/RoomClimateControlServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
                        'description' => 'The path to the Property.',
                    ],
                ],
            ],
            'TemperatureLevelServiceStates' => [
                'type'        => 'object',
                'description' => 'TemperatureLevelService states of ClimateControl',
                'properties'  => [
                    'temperature' => [
                        'type' => 'number',
                    ],
                ],
            ],
            'TemperatureLevelService' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'DeviceServiceData',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'id' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'deviceServiceId',
                        ],
                        'description' => 'A single fully qualified identifier of the Service of a Device.',
                    ],
                    'deviceId' => [
                        'type'        => 'string',
                        'description' => 'A single fully qualified identifier of the Device.',
                    ],
                    'state' => [
                        '$ref' => '#/components/schemas/TemperatureLevelServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
                        'description' => 'The path to the Property.',
                    ],
                ],
            ],
            'SetpointTemperatureState' => [
                'type' => 'string',
                'enum' => [
                    0 => '5.0',
                    1 => '5.5',
                    2 => '...',
                    3 => '29.5',
                    4 => '30.0',
                ],
            ],
        ],
        'requestBodies' => [
            'RoomClimateControlServiceClimateControlStatePayload' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type'       => 'object',
                            'properties' => [
                                '@type' => [
                                    'type' => 'string',
                                    'enum' => [
                                        0 => 'climateControlState',
                                    ],
                                    'description' => 'The type of the Object.',
                                ],
                                'setpointTemperature' => [
                                    '$ref' => '#/components/schemas/SetpointTemperatureState',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'parameters' => [
            'apiVersionHeaderParam' => [
                'in'          => 'header',
                'name'        => 'api-version',
                'description' => 'The version of the API.',
                'schema'      => [
                    'type'    => 'string',
                    'example' => '1.0',
                ],
            ],
            'deviceIdPathParam' => [
                'name'        => 'deviceId',
                'in'          => 'path',
                'description' => 'A single fully qualified identifier of the Device.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
            'propertyPathPathParam' => [
                'name'        => 'propertyPath',
                'in'          => 'path',
                'description' => 'The path to the Property.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
        ],
    ],
];
//Window Contact
$w = [
    'paths' => [
        '/devices/{deviceId}/services/ShutterContact' => [
            'get' => [
                'summary'     => 'Retrieve the ShutterContact service of the DoorWindowContact.',
                'description' => 'Detects open windows and doors. In combination with the Radiator Thermostat the temperature in the room is lowered during airing so no energy is wasted.',
                'tags'        => [
                    0 => 'Services',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The ShutterContact was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ShutterContactService',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/ShutterContact/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the ShutterContact service.',
                'description' => 'Retrieve the state of the ShutterContact service identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The state of ShutterContact was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/ShutterContactServiceStates',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'schemas' => [
            'AdvancedError' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type'        => 'string',
                        'description' => 'The type of the Object.',
                        'example'     => 'JsonRestExceptionResponseEntity',
                    ],
                    'errorCode' => [
                        'type'        => 'string',
                        'description' => 'The error code of the occurred Exception.',
                    ],
                    'statusCode' => [
                        'type'        => 'integer',
                        'description' => 'The HTTP status of the error.',
                    ],
                ],
            ],
            'ServiceDefinition' => [
                'type'        => 'array',
                'minItems'    => 1,
                'uniqueItems' => true,
                'items'       => [
                    'type'        => 'string',
                    'description' => 'A single fully qualified identifier of the Service of a Device.',
                ],
                'example' => [
                    0 => 'ShutterContact',
                ],
            ],
            'ShutterContactServiceStates' => [
                'type'        => 'object',
                'description' => 'ShutterContactService states of DoorWindowContact',
                'properties'  => [
                    'value' => [
                        '$ref' => '#/components/schemas/ShutterContactState',
                    ],
                ],
            ],
            'ShutterContactService' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'DeviceServiceData',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'id' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'deviceServiceId',
                        ],
                        'description' => 'A single fully qualified identifier of the Service of a Device.',
                    ],
                    'deviceId' => [
                        'type'        => 'string',
                        'description' => 'A single fully qualified identifier of the Device.',
                    ],
                    'state' => [
                        '$ref' => '#/components/schemas/ShutterContactServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
                        'description' => 'The path to the Property.',
                    ],
                ],
            ],
            'ShutterContactState' => [
                'type' => 'string',
                'enum' => [
                    0 => 'OPEN',
                    1 => 'CLOSED',
                ],
            ],
        ],
        'parameters' => [
            'apiVersionHeaderParam' => [
                'in'          => 'header',
                'name'        => 'api-version',
                'description' => 'The version of the API.',
                'schema'      => [
                    'type'    => 'string',
                    'example' => '1.0',
                ],
            ],
            'deviceIdPathParam' => [
                'name'        => 'deviceId',
                'in'          => 'path',
                'description' => 'A single fully qualified identifier of the Device.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
            'propertyPathPathParam' => [
                'name'        => 'propertyPath',
                'in'          => 'path',
                'description' => 'The path to the Property.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
        ],
    ],
];
//Intrusion Detection Alarm System
$I = [
    'paths' => [
        '/intrusion/states/system' => [
            'get' => [
                'summary'     => 'Get the alarm system\'s combined state.',
                'description' => 'Returns the combined system sate of the intrusion detection alarm system.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The IntrusionDetectionControl was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/SystemStateData',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/intrusion/actions/arm' => [
            'post' => [
                'summary'     => 'Activates a profile of the Intrusion Detection Alarm System.',
                'description' => 'Activates the profile of the Intrusion Detection Alarm System identified by the `profileId` body parameter.',
                'tags'        => [
                    0 => 'Actions',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                ],
                'responses' => [
                    202 => [
                        'description' => 'Accepted request.',
                    ],
                    400 => [
                        'description' => 'One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined path parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                    405 => [
                        'description' => 'The method was not allowed.',
                    ],
                    422 => [
                        'description' => 'Mapping of defined query parameter failed.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
                'requestBody' => [
                    '$ref' => '#/components/requestBodies/IntrusionDetectionControlServiceArmRequestPayload',
                ],
            ],
        ],
        '/intrusion/actions/disarm' => [
            'post' => [
                'tags' => [
                    0 => 'Actions',
                ],
                'summary'     => 'Disarms the intrusion detection alarm system.',
                'description' => 'Sets the intrusion detection alarm system\'s state to disarmed.',
                'parameters'  => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                ],
                'responses' => [
                    202 => [
                        'description' => 'Accepted',
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined path parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/intrusion/actions/mute' => [
            'post' => [
                'tags' => [
                    0 => 'Actions',
                ],
                'summary'     => 'Mutes the intrusion detection alarm system.',
                'description' => 'Sets the intrusion detection alarm system\'s state to muted.',
                'parameters'  => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                ],
                'responses' => [
                    202 => [
                        'description' => 'Accepted',
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined path parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'schemas' => [
            'AdvancedError' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type'        => 'string',
                        'description' => 'The type of the Object.',
                        'example'     => 'JsonRestExceptionResponseEntity',
                    ],
                    'errorCode' => [
                        'type'        => 'string',
                        'description' => 'The error code of the occurred Exception.',
                    ],
                    'statusCode' => [
                        'type'        => 'integer',
                        'description' => 'The HTTP status of the error.',
                    ],
                ],
            ],
            'SystemAvailabilityStateData' => [
                'type'       => 'object',
                'properties' => [
                    'available' => [
                        'type'     => 'boolean',
                        'readOnly' => true,
                    ],
                    'deleted' => [
                        'type' => 'boolean',
                    ],
                    'id' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'ArmingStateData' => [
                'type'       => 'object',
                'properties' => [
                    'remainingTimeUntilArmed' => [
                        'type'     => 'integer',
                        'format'   => 'int64',
                        'readOnly' => true,
                    ],
                    'state' => [
                        'type'     => 'string',
                        'readOnly' => true,
                        'enum'     => [
                            0 => 'SYSTEM_ARMING',
                            1 => 'SYSTEM_ARMED',
                            2 => 'SYSTEM_DISARMED',
                        ],
                    ],
                    'deleted' => [
                        'type' => 'boolean',
                    ],
                    'id' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'AlarmStateData' => [
                'type'       => 'object',
                'properties' => [
                    'value' => [
                        'type'     => 'string',
                        'readOnly' => true,
                        'enum'     => [
                            0 => 'ALARM_OFF',
                            1 => 'PRE_ALARM',
                            2 => 'ALARM_ON',
                            3 => 'ALARM_MUTED',
                            4 => 'UNKNOWN',
                        ],
                    ],
                    'incidents' => [
                        'type'     => 'array',
                        'readOnly' => true,
                        'items'    => [
                            '$ref' => '#/components/schemas/IncidentData',
                        ],
                    ],
                    'deleted' => [
                        'type' => 'boolean',
                    ],
                    'id' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'ActiveConfigurationProfileData' => [
                'type'       => 'object',
                'properties' => [
                    'profileId' => [
                        'type'     => 'string',
                        'readOnly' => true,
                    ],
                    'deleted' => [
                        'type' => 'boolean',
                    ],
                    'id' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'SystemStateData' => [
                'type'       => 'object',
                'properties' => [
                    'systemAvailability' => [
                        'readOnly' => true,
                        '$ref'     => '#/components/schemas/SystemAvailabilityStateData',
                    ],
                    'armingState' => [
                        'readOnly' => true,
                        '$ref'     => '#/components/schemas/ArmingStateData',
                    ],
                    'alarmState' => [
                        'readOnly' => true,
                        '$ref'     => '#/components/schemas/AlarmStateData',
                    ],
                    'activeConfigurationProfile' => [
                        'readOnly' => true,
                        '$ref'     => '#/components/schemas/ActiveConfigurationProfileData',
                    ],
                    'deleted' => [
                        'type' => 'boolean',
                    ],
                    'id' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'IncidentData' => [
                'type'       => 'object',
                'properties' => [
                    'id' => [
                        'type'     => 'string',
                        'readOnly' => true,
                    ],
                    'triggerName' => [
                        'type'     => 'string',
                        'readOnly' => true,
                    ],
                    'type' => [
                        'type'     => 'string',
                        'readOnly' => true,
                        'enum'     => [
                            0 => 'SYSTEM_ARMED',
                            1 => 'INTRUSION_DETECTED',
                            2 => 'ALARM_MUTED',
                            3 => 'SYSTEM_DISARMED',
                            4 => 'UNKNOWN',
                        ],
                    ],
                    'time' => [
                        'type'     => 'integer',
                        'format'   => 'int64',
                        'readOnly' => true,
                    ],
                    'location' => [
                        'type'     => 'string',
                        'readOnly' => true,
                    ],
                    'locationId' => [
                        'type'     => 'string',
                        'readOnly' => true,
                    ],
                ],
            ],
            'ArmRequest' => [
                'type' => 'string',
                'enum' => [
                    0 => '0',
                    1 => '1',
                    2 => '2',
                ],
            ],
        ],
        'requestBodies' => [
            'IntrusionDetectionControlServiceArmRequestPayload' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type'       => 'object',
                            'properties' => [
                                '@type' => [
                                    'type' => 'string',
                                    'enum' => [
                                        0 => 'armRequest',
                                    ],
                                    'description' => 'The type of the Object.',
                                ],
                                'profileId' => [
                                    '$ref' => '#/components/schemas/ArmRequest',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'parameters' => [
            'apiVersionHeaderParam' => [
                'in'          => 'header',
                'name'        => 'api-version',
                'description' => 'The version of the API.',
                'schema'      => [
                    'type'    => 'string',
                    'example' => '1.0',
                ],
            ],
            'deviceIdPathParam' => [
                'name'        => 'deviceId',
                'in'          => 'path',
                'description' => 'A single fully qualified identifier of the Device.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
            'propertyPathPathParam' => [
                'name'        => 'propertyPath',
                'in'          => 'path',
                'description' => 'The path to the Property.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
        ],
    ],
];
//LightControl
$L = [
    'paths' => [
        '/devices/{deviceId}/services/PowerMeter' => [
            'get' => [
                'summary'     => 'Retrieve the PowerMeter service of the LightControl.',
                'description' => 'With this service you always have an eye on energy consumption.',
                'tags'        => [
                    0 => 'Services',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The PowerMeter was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PowerMeterService',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/PowerMeter/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the PowerMeter service.',
                'description' => 'Retrieve the state of the PowerMeter service identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The state of PowerMeter was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PowerMeterServiceStates',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/PowerSwitch' => [
            'get' => [
                'summary'     => 'Retrieve the PowerSwitch service of the LightControl.',
                'description' => 'Switch electrical appliances on and off. Can be used with electrical appliances with high ratings of up to 3680 W.',
                'tags'        => [
                    0 => 'Services',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The PowerSwitch was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PowerSwitchService',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/PowerSwitch/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the PowerSwitch service.',
                'description' => 'Retrieve the state of the PowerSwitch service identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The state of PowerSwitch was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PowerSwitchServiceStates',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'put' => [
                'summary'     => 'Executes the powerSwitchState on the device.',
                'description' => 'Executes the powerSwitchState on the device identified by the `deviceId` path parameter.',
                'tags'        => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    204 => [
                        'description' => 'Accepted request.',
                    ],
                    400 => [
                        'description' => 'One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined path parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                    405 => [
                        'description' => 'The method was not allowed.',
                    ],
                    422 => [
                        'description' => 'Mapping of defined query parameter failed.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
                'requestBody' => [
                    '$ref' => '#/components/requestBodies/PowerSwitchServicePowerSwitchStatePayload',
                ],
            ],
        ],
    ],
    'components' => [
        'schemas' => [
            'AdvancedError' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type'        => 'string',
                        'description' => 'The type of the Object.',
                        'example'     => 'JsonRestExceptionResponseEntity',
                    ],
                    'errorCode' => [
                        'type'        => 'string',
                        'description' => 'The error code of the occurred Exception.',
                    ],
                    'statusCode' => [
                        'type'        => 'integer',
                        'description' => 'The HTTP status of the error.',
                    ],
                ],
            ],
            'ServiceDefinition' => [
                'type'        => 'array',
                'minItems'    => 1,
                'uniqueItems' => true,
                'items'       => [
                    'type'        => 'string',
                    'description' => 'A single fully qualified identifier of the Service of a Device.',
                ],
                'example' => [
                    0 => 'PowerMeter',
                    1 => 'PowerSwitch',
                ],
            ],
            'PowerMeterServiceStates' => [
                'type'        => 'object',
                'description' => 'PowerMeterService states of LightControl',
                'properties'  => [
                    'powerConsumption' => [
                        'type' => 'number',
                    ],
                    'energyConsumption' => [
                        'type' => 'number',
                    ],
                ],
            ],
            'PowerMeterService' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'DeviceServiceData',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'id' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'deviceServiceId',
                        ],
                        'description' => 'A single fully qualified identifier of the Service of a Device.',
                    ],
                    'deviceId' => [
                        'type'        => 'string',
                        'description' => 'A single fully qualified identifier of the Device.',
                    ],
                    'state' => [
                        '$ref' => '#/components/schemas/PowerMeterServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
                        'description' => 'The path to the Property.',
                    ],
                ],
            ],
            'PowerSwitchServiceStates' => [
                'type'        => 'object',
                'description' => 'PowerSwitchService states of LightControl',
                'properties'  => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'powerSwitchState',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'switchState' => [
                        '$ref' => '#/components/schemas/PowerSwitchState',
                    ],
                ],
            ],
            'PowerSwitchService' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'DeviceServiceData',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'id' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'deviceServiceId',
                        ],
                        'description' => 'A single fully qualified identifier of the Service of a Device.',
                    ],
                    'deviceId' => [
                        'type'        => 'string',
                        'description' => 'A single fully qualified identifier of the Device.',
                    ],
                    'state' => [
                        '$ref' => '#/components/schemas/PowerSwitchServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
                        'description' => 'The path to the Property.',
                    ],
                ],
            ],
            'PowerSwitchState' => [
                'type' => 'string',
                'enum' => [
                    0 => 'ON',
                    1 => 'OFF',
                ],
            ],
        ],
        'requestBodies' => [
            'PowerSwitchServicePowerSwitchStatePayload' => [
                'content' => [
                    'application/json' => [
                        'schema' => [
                            'type'       => 'object',
                            'properties' => [
                                '@type' => [
                                    'type' => 'string',
                                    'enum' => [
                                        0 => 'powerSwitchState',
                                    ],
                                    'description' => 'The type of the Object.',
                                ],
                                'switchState' => [
                                    '$ref' => '#/components/schemas/PowerSwitchState',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'parameters' => [
            'apiVersionHeaderParam' => [
                'in'          => 'header',
                'name'        => 'api-version',
                'description' => 'The version of the API.',
                'schema'      => [
                    'type'    => 'string',
                    'example' => '1.0',
                ],
            ],
            'deviceIdPathParam' => [
                'name'        => 'deviceId',
                'in'          => 'path',
                'description' => 'A single fully qualified identifier of the Device.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
            'propertyPathPathParam' => [
                'name'        => 'propertyPath',
                'in'          => 'path',
                'description' => 'The path to the Property.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
        ],
    ],
];
// Motion Detector
$M = [
    'paths' => [
        '/devices/{deviceId}/services/LatestMotion' => [
            'get' => [
                'summary'     => 'Retrieve the LatestMotion service of the MotionDetector.',
                'description' => 'Detects every movement through an intelligent combination of passive infra-red technology and an additional temperature sensor.',
                'tags'        => [
                    0 => 'Services',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The LatestMotion was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/LatestMotionService',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        '/devices/{deviceId}/services/LatestMotion/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the LatestMotion service.',
                'description' => 'Retrieve the state of the LatestMotion service identified by the `deviceId` path parameter.',
                'tags' => [
                    0 => 'States',
                ],
                'parameters' => [
                    0 => [
                        '$ref' => '#/components/parameters/apiVersionHeaderParam',
                    ],
                    1 => [
                        '$ref' => '#/components/parameters/deviceIdPathParam',
                    ],
                ],
                'responses' => [
                    200 => [
                        'description' => 'The state of LatestMotion was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/LatestMotionServiceStates',
                                ],
                            ],
                        ],
                    ],
                    404 => [
                        'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/AdvancedError',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'components' => [
        'schemas' => [
            'AdvancedError' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type'        => 'string',
                        'description' => 'The type of the Object.',
                        'example'     => 'JsonRestExceptionResponseEntity',
                    ],
                    'errorCode' => [
                        'type'        => 'string',
                        'description' => 'The error code of the occurred Exception.',
                    ],
                    'statusCode' => [
                        'type'        => 'integer',
                        'description' => 'The HTTP status of the error.',
                    ],
                ],
            ],
            'ServiceDefinition' => [
                'type'        => 'array',
                'minItems'    => 1,
                'uniqueItems' => true,
                'items'       => [
                    'type'        => 'string',
                    'description' => 'A single fully qualified identifier of the Service of a Device.',
                ],
                'example' => [
                    0 => 'LatestMotion',
                ],
            ],
            'LatestMotionServiceStates' => [
                'type'        => 'object',
                'description' => 'LatestMotionService states of MotionDetector',
                'properties'  => [
                    'latestMotionDetected' => [
                        'type' => 'string',
                    ],
                ],
            ],
            'LatestMotionService' => [
                'type'       => 'object',
                'properties' => [
                    '@type' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'DeviceServiceData',
                        ],
                        'description' => 'The type of the Object.',
                    ],
                    'id' => [
                        'type' => 'string',
                        'enum' => [
                            0 => 'deviceServiceId',
                        ],
                        'description' => 'A single fully qualified identifier of the Service of a Device.',
                    ],
                    'deviceId' => [
                        'type'        => 'string',
                        'description' => 'A single fully qualified identifier of the Device.',
                    ],
                    'state' => [
                        '$ref' => '#/components/schemas/LatestMotionServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
                        'description' => 'The path to the Property.',
                    ],
                ],
            ],
        ],
        'parameters' => [
            'apiVersionHeaderParam' => [
                'in'          => 'header',
                'name'        => 'api-version',
                'description' => 'The version of the API.',
                'schema'      => [
                    'type'    => 'string',
                    'example' => '1.0',
                ],
            ],
            'deviceIdPathParam' => [
                'name'        => 'deviceId',
                'in'          => 'path',
                'description' => 'A single fully qualified identifier of the Device.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
            'propertyPathPathParam' => [
                'name'        => 'propertyPath',
                'in'          => 'path',
                'description' => 'The path to the Property.',
                'required'    => true,
                'schema'      => [
                    'type' => 'string',
                ],
            ],
        ],
    ],
];
//Presence Simulation System
$P=[
  'paths' => [
    '/devices/{deviceId}/services/PresenceSimulationConfiguration' => [
      'get' => [
        'summary' => 'Retrieve the PresenceSimulationConfiguration service of the PresenceSimulationSystem.',
        'description' => 'Presence is simulated by automatically controlling lights and electrical devices connected to Smart Plugs like the radio or television. A random algorithm changes the switching times just as if you were at home to give you peace of mind even when you are not there.',
        'tags' => [
          0 => 'Services',
        ],
        'parameters' => [
          0 => [
            '$ref' => '#/components/parameters/apiVersionHeaderParam',
          ],
          1 => [
            '$ref' => '#/components/parameters/deviceIdPathParam',
          ],
        ],
        'responses' => [
          200 => [
            'description' => 'The PresenceSimulationConfiguration was successfully retrieved.',
            'content' => [
              'application/json' => [
                'schema' => [
                  '$ref' => '#/components/schemas/PresenceSimulationService',
                ],
              ],
            ],
          ],
          404 => [
            'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
            'content' => [
              'application/json' => [
                'schema' => [
                  '$ref' => '#/components/schemas/AdvancedError',
                ],
              ],
            ],
          ],
        ],
      ],
    ],
    '/devices/{deviceId}/services/PresenceSimulationConfiguration/state' => [
      'get' => [
        'summary' => 'Retrieve the state of the PresenceSimulationConfiguration service.',
        'description' => 'Retrieve the state of the PresenceSimulationConfiguration service identified by the `deviceId` path parameter.',
        'tags' => [
          0 => 'States',
        ],
        'parameters' => [
          0 => [
            '$ref' => '#/components/parameters/apiVersionHeaderParam',
          ],
          1 => [
            '$ref' => '#/components/parameters/deviceIdPathParam',
          ],
        ],
        'responses' => [
          200 => [
            'description' => 'The state of PresenceSimulationConfiguration was successfully retrieved.',
            'content' => [
              'application/json' => [
                'schema' => [
                  '$ref' => '#/components/schemas/PresenceSimulationServiceStates',
                ],
              ],
            ],
          ],
          404 => [
            'description' => 'The entity could not be found. One of the defined query parameters was invalid.',
            'content' => [
              'application/json' => [
                'schema' => [
                  '$ref' => '#/components/schemas/AdvancedError',
                ],
              ],
            ],
          ],
        ],
      ],
      'put' => [
        'summary' => 'Executes the presenceSimulationConfigurationState on the device.',
        'description' => 'Executes the presenceSimulationConfigurationState on the device identified by the `deviceId` path parameter.',
        'tags' => [
          0 => 'States',
        ],
        'parameters' => [
          0 => [
            '$ref' => '#/components/parameters/apiVersionHeaderParam',
          ],
          1 => [
            '$ref' => '#/components/parameters/deviceIdPathParam',
          ],
        ],
        'responses' => [
          204 => [
            'description' => 'Accepted request.',
          ],
          400 => [
            'description' => 'One of the defined query parameters was invalid.',
            'content' => [
              'application/json' => [
                'schema' => [
                  '$ref' => '#/components/schemas/AdvancedError',
                ],
              ],
            ],
          ],
          404 => [
            'description' => 'The entity could not be found. One of the defined path parameters was invalid.',
            'content' => [
              'application/json' => [
                'schema' => [
                  '$ref' => '#/components/schemas/AdvancedError',
                ],
              ],
            ],
          ],
          405 => [
            'description' => 'The method was not allowed.',
          ],
          422 => [
            'description' => 'Mapping of defined query parameter failed.',
            'content' => [
              'application/json' => [
                'schema' => [
                  '$ref' => '#/components/schemas/AdvancedError',
                ],
              ],
            ],
          ],
        ],
        'requestBody' => [
          '$ref' => '#/components/requestBodies/PresenceSimulationServicePresenceSimulationConfigurationStatePayload',
        ],
      ],
    ],
  ],
  'components' => [
    'schemas' => [
      'AdvancedError' => [
        'type' => 'object',
        'properties' => [
          '@type' => [
            'type' => 'string',
            'description' => 'The type of the Object.',
            'example' => 'JsonRestExceptionResponseEntity',
          ],
          'errorCode' => [
            'type' => 'string',
            'description' => 'The error code of the occurred Exception.',
          ],
          'statusCode' => [
            'type' => 'integer',
            'description' => 'The HTTP status of the error.',
          ],
        ],
      ],
      'ServiceDefinition' => [
        'type' => 'array',
        'minItems' => 1,
        'uniqueItems' => true,
        'items' => [
          'type' => 'string',
          'description' => 'A single fully qualified identifier of the Service of a Device.',
        ],
        'example' => [
          0 => 'PresenceSimulationConfiguration',
        ],
      ],
      'PresenceSimulationServiceStates' => [
        'type' => 'object',
        'description' => 'PresenceSimulationService states of PresenceSimulationSystem',
        'properties' => [
          '@type' => [
            'type' => 'string',
            'enum' => [
              0 => 'presenceSimulationConfigurationState',
            ],
            'description' => 'The type of the Object.',
          ],
          'enabled' => [
            'type' => 'boolean',
          ],
        ],
      ],
      'PresenceSimulationService' => [
        'type' => 'object',
        'properties' => [
          '@type' => [
            'type' => 'string',
            'enum' => [
              0 => 'DeviceServiceData',
            ],
            'description' => 'The type of the Object.',
          ],
          'id' => [
            'type' => 'string',
            'enum' => [
              0 => 'deviceServiceId',
            ],
            'description' => 'A single fully qualified identifier of the Service of a Device.',
          ],
          'deviceId' => [
            'type' => 'string',
            'description' => 'A single fully qualified identifier of the Device.',
          ],
          'state' => [
            '$ref' => '#/components/schemas/PresenceSimulationServiceStates',
          ],
          'path' => [
            'type' => 'string',
            'description' => 'The path to the Property.',
          ],
        ],
      ],
    ],
    'requestBodies' => [
      'PresenceSimulationServicePresenceSimulationConfigurationStatePayload' => [
        'content' => [
          'application/json' => [
            'schema' => [
              'type' => 'object',
              'properties' => [
                '@type' => [
                  'type' => 'string',
                  'enum' => [
                    0 => 'presenceSimulationConfigurationState',
                  ],
                  'description' => 'The type of the Object.',
                ],
                'enabled' => [
                  'type' => 'boolean',
                ],
              ],
            ],
          ],
        ],
      ],
    ],
    'parameters' => [
      'apiVersionHeaderParam' => [
        'in' => 'header',
        'name' => 'api-version',
        'description' => 'The version of the API.',
        'schema' => [
          'type' => 'string',
          'example' => '1.0',
        ],
      ],
      'deviceIdPathParam' => [
        'name' => 'deviceId',
        'in' => 'path',
        'description' => 'A single fully qualified identifier of the Device.',
        'required' => true,
        'schema' => [
          'type' => 'string',
        ],
      ],
      'propertyPathPathParam' => [
        'name' => 'propertyPath',
        'in' => 'path',
        'description' => 'The path to the Property.',
        'required' => true,
        'schema' => [
          'type' => 'string',
        ],
      ],
    ],
  ],
];