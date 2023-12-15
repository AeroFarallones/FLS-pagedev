<?php

namespace Modules\FlsModule\Listeners;

use App\Events\PirepUpdated;
use App\Models\Enums\AircraftState;
use App\Models\Enums\PirepStatus;
use Illuminate\Support\Facades\Log;
use Modules\FlsModule\Models\Fls_WhazzUpCheck;
use Modules\FlsModule\Services\Fls_PirepServices;
use Carbon\Carbon;

class Pirep_Updated
{
    public function handle(PirepUpdated $event)
    {
        if (Fls_Setting('FlsModule.acstate_control', false) && $event->pirep->aircraft) {
            // Change Aircraft State
            $pirep = $event->pirep;
            $aircraft = $pirep->aircraft;

            if ($pirep->status === PirepStatus::BOARDING) {
                $aircraft->state = AircraftState::IN_USE;
                $aircraft->save();
                Log::info('Fls Basic | Pirep:' . $pirep->id . ' BOARDING started, Changed STATE of ' . $aircraft->registration . ' to IN USE');
            } elseif ($pirep->status === PirepStatus::TAKEOFF) {
                $aircraft->state = AircraftState::IN_AIR;
                $aircraft->save();
                Log::info('Fls Basic | Pirep:' . $pirep->id . ' TAKE OFF reported, Changed STATE of ' . $aircraft->registration . ' to IN AIR');
            } elseif ($pirep->status === PirepStatus::LANDED) {
                $aircraft->state = AircraftState::IN_USE;
                $aircraft->save();
                Log::info('Fls Basic | Pirep:' . $pirep->id . ' LANDING reported, Changed STATE of ' . $aircraft->registration . ' to IN USE');
            }
        }

        if (Fls_Setting('FlsModule.networkcheck', false)) {
            $pirep = $event->pirep;

            if ($pirep->status === PirepStatus::ENROUTE || $pirep->status === PirepStatus::APPROACH || $pirep->status === PirepStatus::APPROACH_ICAO) {
                // Get last check
                $enroute_diff = Fls_Setting('FlsModule.networkcheck_enroute_margin', 300);
                $last_check = Fls_WhazzUpCheck::where('pirep_id', $pirep->id)->orderBy('created_at', 'DESC')->first();
                // Compare the time difference and check Network presence
                if (empty($last_check) || isset($last_check) && ($last_check->created_at->diffInSeconds(Carbon::now()) >= $enroute_diff)) {
                    Log::info('Fls Basic | Pirep:' . $pirep->id . ' updated. Checking Network Presence');
                    $Fls_PirepSvc = app(Fls_PirepServices::class);
                    $Fls_PirepSvc->CheckWhazzUp($pirep);
                }
            }
        }
    }
}
