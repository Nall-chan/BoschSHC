<?php

declare(strict_types=1);

namespace BoschSHC;

class ApiUrl
{
    const Devices = '/devices';
    const Services = '/services';
    const Rooms = '/rooms';
    const Scenarios = '/scenarios';
    const Messages = '/messages';
    const OpenWindows = '/doors-windows/openwindows';
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
    const SendToIO = '{FCC91718-B5E6-FD03-A393-7BAF6E4A7EEF}';
    const SendToChild = '{182D359D-1C4A-5B7B-2402-54D7B2575C23}';
}