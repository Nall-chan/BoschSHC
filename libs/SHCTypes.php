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
    const DDNS = '{780B2D48-916C-4D59-AD35-5A429B2355A5}';
    const Discovery = '{98281B33-2867-4A31-9D21-DFEC24D4ECCF}';
    const IO = '{8D1D21A7-FDE3-EB16-B5B3-6D38D0673B62}';
    const Configurator = '{D9479A03-8726-B4E2-FFD1-2CC390CFE166}';
    const Device = '{6595716D-84D6-807C-E0E8-365568AD8217}';
    const System = '{100F2205-145A-434E-BAF1-6FD64528A6BA}';
    const WaterAlarmSystem = '{C2EF63F8-549A-43B2-B51E-5170129E84CB}';
    const AutomationRule = '{10999DC2-2A1E-4D34-95BB-885CD9B7F584}';
    const Scenarios = '{6E721ADA-F07D-4C17-9BAD-AC2087DE2F74}';
    const Messages = '{02661809-F3CE-4D12-95B0-C81123084A12}';
    const DoorsWindows = '{1080892A-31C2-4234-A1FB-D88E6C14118C}';
    const SendToIO = '{FCC91718-B5E6-FD03-A393-7BAF6E4A7EEF}';
    const SendToDevice = '{182D359D-1C4A-5B7B-2402-54D7B2575C23}';
    const SendToWaterAlarmSystem = '{60A2DA90-9DF0-45C5-B7CF-CAEE3A5503B6}';
    const SendToAutomationRule = '{6653626B-F757-4A14-B60A-4124420E1F11}';
    const SendToScenarios = '{602677ED-7193-4E26-841D-3069FDB9F7B1}';
    const SendToMessages = '{5B21375F-D895-4F7B-A42A-E176FFFBA4F2}';
    const SendToDoorsWindows = '{18F26C0E-B5E8-4BAF-9539-674B4A6FF841}';
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

class FlowToMessages
{
    const DataID = 'DataID';
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
    const EmergencySystemServiceData = 'EmergencySystemServiceData';
    const EmergencySupportServiceData = 'emergencySupportServiceData';
}