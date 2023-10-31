<?php

namespace Modules\FlsModule\Services;

use App\Models\Aircraft;
use App\Models\Pirep;
use App\Models\Enums\AircraftState;
use App\Models\Enums\PirepState;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Modules\FlsModule\Models\Fls_WhazzUpCheck;

class Fls_CronServices
{
    // Release Stuck Aircraft ("in use" or "in air" without an active pirep)
    public function ReleaseStuckAircraft()
    {
        $live_aircraft = Pirep::where('state', PirepState::IN_PROGRESS)->orWhere('state', PirepState::PAUSED)->pluck('aircraft_id')->toArray();
        $blocked_aircraft = Aircraft::where('state', '!=', AircraftState::PARKED)->whereNotIn('id', $live_aircraft)->get();

        foreach ($blocked_aircraft as $aircraft) {
            $aircraft->state = AircraftState::PARKED;
            $aircraft->save();
            Log::info('Fls Basic | ' . $aircraft->registration . ' state changed to PARKED (On Ground)');
        }
    }

    // Cleanup Network Presence Data
    public function CleanUpWhazzUpChecks()
    {
        if (Fls_Setting('FlsModule.networkcheck_cleanup', '48') > 0) {
            $cleanup_margin = Fls_Setting('FlsModule.networkcheck_cleanup', '48');
            $cleanup_time = Carbon::now()->subHours($cleanup_margin);

            Fls_WhazzUpCheck::where('created_at', '<', $cleanup_time)->delete();
            Log::info('Fls Basic | Network Presence check data cleanup completed');
        }
    }
}
