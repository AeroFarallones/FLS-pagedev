<?php

namespace Modules\FlsModule\Listeners;

use App\Events\PirepCancelled;
use App\Models\Enums\AircraftState;
use Illuminate\Support\Facades\Log;
use Modules\FlsModule\Models\Fls_WhazzUpCheck;

class Pirep_Cancelled
{
    public function handle(PirepCancelled $event)
    {
        if (Fls_Setting('FlsModule.acstate_control') && $event->pirep->aircraft) {
            // Park Aircraft
            $aircraft = $event->pirep->aircraft;
            $aircraft->state = AircraftState::PARKED;
            $aircraft->save();
            Log::info('Fls Basic | Pirep:' . $event->pirep->id . ' CANCELLED, Changed STATE of ' . $aircraft->registration . ' to PARKED');
        }

        if (Fls_Setting('FlsModule.networkcheck', false)) {
            // Delete Crap Data
            $pirep = $event->pirep;
            Log::info('Fls Basic | Pirep:' . $pirep->id . ' Status:' . $pirep->status . ' reported. Deleting Network Presence Check Data');
            Fls_WhazzUpCheck::where('pirep_id', $pirep->id)->delete();
        }
    }
}
