<?php

namespace Modules\FlsModule\Listeners;

use App\Contracts\Listener;
use App\Events\CronFiveMinute;
use App\Events\CronFifteenMinute;
use App\Events\CronThirtyMinute;
use App\Events\CronHourly;
use App\Events\CronNightly;
use App\Events\CronWeekly;
use App\Events\CronMonthly;
use Illuminate\Support\Facades\Log;
use Modules\FlsModule\Services\Fls_CronServices;
use Modules\FlsModule\Services\Fls_OnlineServices;

class Gen_Cron extends Listener
{
    public static $callbacks = [
        CronFiveMinute::class => 'cron_05min',
        CronFifteenMinute::class => 'cron_15min',
        CronThirtyMinute::class => 'cron_30min',
        CronHourly::class  => 'cron_hourly',
        CronNightly::class => 'cron_nightly',
        CronWeekly::class => 'cron_weekly',
        CronMonthly::class => 'cron_monthly',
    ];

    public function cron_05min()
    {
        // $this->Fls_WriteToLog('05 mins test');
        if (Fls_Setting('FlsModule.networkcheck_cron', false)) {
            // If enabled this will speed up check time, on the other hand will increase server traffic
            $server_name = Fls_Setting('FlsModule.networkcheck_server', 'AUTO');

            $url_vatsim = 'https://data.vatsim.net/v3/vatsim-data.json';
            $url_ivao = 'https://api.ivao.aero/v2/tracker/whazzup';

            $Fls_OnlineSVC = app(Fls_OnlineServices::class);

            if ($server_name === 'IVAO') {
                $Fls_OnlineSVC->DownloadWhazzUp($server_name, $url_ivao);
            } elseif ($server_name === 'VATSIM') {
                $Fls_OnlineSVC->DownloadWhazzUp($server_name, $url_vatsim);
            } else {
                $Fls_OnlineSVC->DownloadWhazzUp('IVAO', $url_ivao);
                $Fls_OnlineSVC->DownloadWhazzUp('VATSIM', $url_vatsim);
            }
        }
    }

    public function cron_15min()
    {
        // $this->Fls_WriteToLog('15 mins test');
        $Fls_CronSVC = app(Fls_CronServices::class);
        $Fls_CronSVC->ReleaseStuckAircraft();
    }

    public function cron_30min()
    {
        // $this->Fls_WriteToLog('30 mins test');
    }

    public function cron_hourly()
    {
        // $this->Fls_WriteToLog('Hourly test');
    }

    public function cron_nightly()
    {
        // $this->Fls_WriteToLog('Nightly test');
        if (Fls_Setting('FlsModule.networkcheck', false)) {
            $Fls_CronSVC = app(Fls_CronServices::class);
            $Fls_CronSVC->CleanUpWhazzUpChecks();
        }
    }

    public function cron_weekly()
    {
        // $this->Fls_WriteToLog('Weekly test');
    }

    public function cron_monthly()
    {
        // $this->Fls_WriteToLog('Monthly test');
    }

    // Test Method
    public function Fls_WriteToLog($text = null)
    {
        Log::debug('Fls Basic | ' . $text);
    }
}
