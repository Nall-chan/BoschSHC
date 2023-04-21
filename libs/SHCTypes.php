<?php

declare(strict_types=1);

namespace BoschSHC;

class ApiUrl
{
    const System = '/system';
    const Devices = '/devices';
    const Services = '/services';
    const State = '/state';
    const Rooms = '/rooms';
    const Scenarios = '/scenarios';
    const Trigger = '/triggers';
    const Messages = '/messages';
    const AutomationRules = '/automation/rules';
    const Enabled = '/enabled';
    const OpenWindows = '/doors-windows/openwindows';
    const WaterAlarm = '/wateralarm';
    const ActionMute = '/actions/mute';
}

class HTTP
{
    const GET = 'GET';
    const PUT = 'PUT';
    const POST = 'POST';
}

class GUID
{
    const IO = '{8D1D21A7-FDE3-EB16-B5B3-6D38D0673B62}';
    const Configurator = '{D9479A03-8726-B4E2-FFD1-2CC390CFE166}';
    const Device = '{6595716D-84D6-807C-E0E8-365568AD8217}';
    const System = '{100F2205-145A-434E-BAF1-6FD64528A6BA}';
    const WaterAlarmSystem = '{C2EF63F8-549A-43B2-B51E-5170129E84CB}';
    const AutomationRule = '{10999DC2-2A1E-4D34-95BB-885CD9B7F584}';
    const Scenarios = '{6E721ADA-F07D-4C17-9BAD-AC2087DE2F74}';
    const SendToIO = '{FCC91718-B5E6-FD03-A393-7BAF6E4A7EEF}';
    const SendToDevice = '{182D359D-1C4A-5B7B-2402-54D7B2575C23}';
    const SendToWaterAlarmSystem = '{60A2DA90-9DF0-45C5-B7CF-CAEE3A5503B6}';
    const SendToAutomationRule = '{6653626B-F757-4A14-B60A-4124420E1F11}';
    const SendToScenarios = '{602677ED-7193-4E26-841D-3069FDB9F7B1}';
}

class Property
{
    const IO_Property_Open = 'Open';
    const IO_Property_Host = 'Host';
    const Device_Property_DeviceId = 'DeviceId';
    const System_Property_SystemMAC = 'SystemMAC';
    const AutomationRule_Property_RuleId = 'AutomationRuleId';
    const Scenario_Property_ScenarioId = 'ScenarioId';
}
class FlowToParent
{
    const DataID = 'DataID';
    const Call = 'ApiCall';
    const Method = 'Method';
    const Payload = 'Payload';
}

class FlowToDevice
{
    const DataID = 'DataID';
    const DeviceId = 'DeviceId';
    const Event = 'Event';
}

class FlowToAutomationRule
{
    const DataID = 'DataID';
    const RuleId = 'AutomationRuleId';
    const Event = 'Event';
}

class FlowToScenarios
{
    const DataID = 'DataID';
    const ScenarioId = 'ScenarioId';
    const Event = 'Event';
}

class EventTypes
{
    const Device = 'device';
    const Room = 'room';
    const DeviceServiceData = 'DeviceServiceData';
    const Message = 'message';
    const WaterAlarmSystemConfiguration = 'waterAlarmSystemConfiguration';
    const WaterAlarmSystemState = 'waterAlarmSystemState';
    const Client = 'client';
    const AutomationRule = 'automationRule';
    const ScenarioTriggered = 'scenarioTriggered';
}
/*
Array
(
    [automationConditions] => Array
        (
        )

    [automationTriggers] => Array
        (
            [0] => Array
                (
                    [configuration] => {"smartPlugId":"hdm:ZigBee:385b44fffeaefde8","triggerState":"ON"}
                    [type] => SmartPlugOnOffTrigger
                )

        )

    [@type] => automationRule
    [name] => Stecker testen
    [automationActions] => Array
        (
            [0] => Array
                (
                    [configuration] => {"smartPlugId":"hdm:ZigBee:385b44fffeaefde8","action":"TURN_OFF"}
                    [delayInSeconds] => 300
                    [type] => SmartPlugOnOffAction
                )

        )

    [id] => bd8a0ebb-6f5a-41be-b9f0-cc2cf87abf71
    [conditionLogicalOp] => AND
    [enabled] => bool
)
 */
/*
20.04.2023, 11:10:28 | Bosch SmartHome IO   | Event with unhandled EventTypes:
Array
(
    [@type] => scenarioTriggered
    [name] => Nach Hause kommen
    [id] => 1f7fbb71-c6a6-4541-931e-dddf942237ca
    [lastTimeTriggered] => 1681981828485
)
 */
