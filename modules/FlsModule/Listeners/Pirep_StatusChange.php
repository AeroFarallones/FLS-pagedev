<?php

namespace Modules\FlsModule\Listeners;

use App\Events\PirepStatusChange;
use App\Models\Enums\PirepStatus;
use Illuminate\Support\Facades\Log;
use Modules\FlsModule\Services\Fls_PirepServices;

class Pirep_StatusChange
{

    public function handle(PirepStatusChange $event)
    {
        if (Fls_Setting('FlsModule.networkcheck', false)) {
            $pirep = $event->pirep;

            if ($pirep->status === PirepStatus::CANCELLED || $pirep->status === PirepStatus::PAUSED) {
                // Do Nothing
            } else {
                // Check Network Presence
                Log::info('Fls Basic | Pirep:' . $pirep->id . ' Status:' . $pirep->status . ' reported. Checking Network Presence');
                $Fls_PirepSvc = app(Fls_PirepServices::class);
                $Fls_PirepSvc->CheckWhazzUp($pirep);
            }
        }
    }
}
