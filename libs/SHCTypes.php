<?php

declare(strict_types=1);

namespace BoschSHC;

class ApiUrl
{
    public const System = '/system';
    public const Devices = '/devices';
    public const Services = '/services';
    public const State = '/state';
    public const Rooms = '/rooms';
    public const Scenarios = '/scenarios';
    public const Trigger = '/triggers';
    public const Messages = '/messages';
    public const AutomationRules = '/automation/rules';
    public const Enabled = '/enabled';
    public const OpenWindows = '/doors-windows/openwindows';
    public const WaterAlarm = '/wateralarm';
    public const ActionMute = '/actions/mute';
}

class HTTP
{
    public const GET = 'GET';
    public const PUT = 'PUT';
    public const POST = 'POST';
    public const DELETE = 'DELETE';
}

class GUID
{
    // Symcon
    public const DDNS = '{780B2D48-916C-4D59-AD35-5A429B2355A5}';

    // BoschSHC
    public const Discovery = '{98281B33-2867-4A31-9D21-DFEC24D4ECCF}';
    public const IO = '{8D1D21A7-FDE3-EB16-B5B3-6D38D0673B62}';
    public const Configurator = '{D9479A03-8726-B4E2-FFD1-2CC390CFE166}';
    public const Device = '{6595716D-84D6-807C-E0E8-365568AD8217}';
    public const System = '{100F2205-145A-434E-BAF1-6FD64528A6BA}';
    public const WaterAlarmSystem = '{C2EF63F8-549A-43B2-B51E-5170129E84CB}';
    public const AutomationRule = '{10999DC2-2A1E-4D34-95BB-885CD9B7F584}';
    public const Scenarios = '{6E721ADA-F07D-4C17-9BAD-AC2087DE2F74}';
    public const Messages = '{02661809-F3CE-4D12-95B0-C81123084A12}';
    public const DoorsWindows = '{1080892A-31C2-4234-A1FB-D88E6C14118C}';

    //Dataflow
    public const SendToIO = '{FCC91718-B5E6-FD03-A393-7BAF6E4A7EEF}';
    public const SendToDevice = '{182D359D-1C4A-5B7B-2402-54D7B2575C23}';
    public const SendToWaterAlarmSystem = '{60A2DA90-9DF0-45C5-B7CF-CAEE3A5503B6}';
    public const SendToAutomationRule = '{6653626B-F757-4A14-B60A-4124420E1F11}';
    public const SendToScenarios = '{602677ED-7193-4E26-841D-3069FDB9F7B1}';
    public const SendToMessages = '{5B21375F-D895-4F7B-A42A-E176FFFBA4F2}';
    public const SendToDoorsWindows = '{18F26C0E-B5E8-4BAF-9539-674B4A6FF841}';
}

class Property
{
    public const IO_Property_Open = 'Open';
    public const IO_Property_Host = 'Host';
    public const Device_Property_DeviceId = 'DeviceId';
    public const System_Property_SystemMAC = 'SystemMAC';
    public const AutomationRule_Property_RuleId = 'AutomationRuleId';
    public const Scenario_Property_ScenarioId = 'ScenarioId';
}
class FlowToParent
{
    public const DataID = 'DataID';
    public const Call = 'ApiCall';
    public const Method = 'Method';
    public const Payload = 'Payload';
}

class FlowToDevice
{
    public const DataID = 'DataID';
    public const DeviceId = 'DeviceId';
    public const Event = 'Event';
}

class FlowToAutomationRule
{
    public const DataID = 'DataID';
    public const RuleId = 'AutomationRuleId';
    public const Event = 'Event';
}

class FlowToScenarios
{
    public const DataID = 'DataID';
    public const ScenarioId = 'ScenarioId';
    public const Event = 'Event';
}

class FlowToMessages
{
    public const DataID = 'DataID';
    public const Event = 'Event';
}
class EventTypes
{
    public const Device = 'device';
    public const Room = 'room';
    public const DeviceServiceData = 'DeviceServiceData';
    public const Message = 'message';
    public const WaterAlarmSystemConfiguration = 'waterAlarmSystemConfiguration';
    public const WaterAlarmSystemState = 'waterAlarmSystemState';
    public const Client = 'client';
    public const AutomationRule = 'automationRule';
    public const ScenarioTriggered = 'scenarioTriggered';
    public const EmergencySystemServiceData = 'EmergencySystemServiceData';
    public const EmergencySupportServiceData = 'emergencySupportServiceData';
    public const ArmingState = 'armingState';
}