<?php

namespace Client\Websocket\Enums;

use Client\Websocket\Commands\{
    Ping,
    // TraceRoute,
    IPerf3,
    Shell,
    Speedtest
};

/**
 * The websocket command map
 */
enum WebsocketCommandEnum: int
{
    /**
     * function code
     *
     * base logic code
     */
    case End = 0;
    case StreamInterfaceTraffic = 100;
    case InterfaceTraffic_10s = 101;
    case Config = 1000;

    /**
     * commands code
     *
     * add your feature to here
     *
     * don't forget add class to getClass() method
     */
    case Ping = 1;
        // case TraceRoute = 2;
    case IPerf3 = 4;
    case SpeedTest = 5;
    case Shell = 6;


    public function getClass(): ?string
    {
        return match ($this) {
            self::Ping => Ping::class,
            // self::TraceRoute => TraceRoute::class,
            self::IPerf3 => IPerf3::class,
            self::SpeedTest => Speedtest::class,
            self::Shell => Shell::class,
            default => null
        };
    }

    public function isEnable(): bool
    {
        return match ($this) {
            self::Ping => env('UTILITIES_PING', true),
            // self::TraceRoute => env('UTILITIES_TRACEROUTE', true),
            self::IPerf3 => env('UTILITIES_IPERF3', true),
            self::SpeedTest => env('UTILITIES_SPEEDTESTDOTNET', true),
            self::Shell => env('UTILITIES_FAKESHELL', true),
            default => false
        };
    }
}
