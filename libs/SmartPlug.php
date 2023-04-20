<?php

declare(strict_types=1);
//Intrusion Detection Alarm System
// global Service !
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

//Presence Simulation System
$P = [
    'paths' => [
        '/devices/{deviceId}/services/PresenceSimulationConfiguration' => [
            'get' => [
                'summary'     => 'Retrieve the PresenceSimulationConfiguration service of the PresenceSimulationSystem.',
                'description' => 'Presence is simulated by automatically controlling lights and electrical devices connected to Smart Plugs like the radio or television. A random algorithm changes the switching times just as if you were at home to give you peace of mind even when you are not there.',
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
                        'description' => 'The PresenceSimulationConfiguration was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PresenceSimulationService',
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
        '/devices/{deviceId}/services/PresenceSimulationConfiguration/state' => [
            'get' => [
                'summary'     => 'Retrieve the state of the PresenceSimulationConfiguration service.',
                'description' => 'Retrieve the state of the PresenceSimulationConfiguration service identified by the `deviceId` path parameter.',
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
                        'description' => 'The state of PresenceSimulationConfiguration was successfully retrieved.',
                        'content'     => [
                            'application/json' => [
                                'schema' => [
                                    '$ref' => '#/components/schemas/PresenceSimulationServiceStates',
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
                'summary'     => 'Executes the presenceSimulationConfigurationState on the device.',
                'description' => 'Executes the presenceSimulationConfigurationState on the device identified by the `deviceId` path parameter.',
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
                    '$ref' => '#/components/requestBodies/PresenceSimulationServicePresenceSimulationConfigurationStatePayload',
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
                    0 => 'PresenceSimulationConfiguration',
                ],
            ],
            'PresenceSimulationServiceStates' => [
                'type'        => 'object',
                'description' => 'PresenceSimulationService states of PresenceSimulationSystem',
                'properties'  => [
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
                        '$ref' => '#/components/schemas/PresenceSimulationServiceStates',
                    ],
                    'path' => [
                        'type'        => 'string',
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
                            'type'       => 'object',
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

//Special instances for:
  // Scenarios
  // Messages
  // Doors/Windows
  //intrusion ?!
  //PresenceSimulation ?!
