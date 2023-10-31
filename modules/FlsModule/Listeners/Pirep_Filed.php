<?php

namespace Modules\FlsModule\Listeners;

use App\Events\PirepFiled;
use App\Models\Airline;
use App\Models\PirepFieldValue;
use App\Models\Enums\AircraftState;
use App\Models\Enums\PirepSource;
use Illuminate\Support\Facades\Log;
use Modules\FlsModule\Models\Fls_WhazzUpCheck;
use Modules\FlsModule\Services\Fls_NotificationServices;

class Pirep_Filed
{
    public function handle(PirepFiled $event)
    {
        $pirep = $event->pirep;

        if (Fls_Setting('FlsModule.discord_pirepmsg')) {
            // Send Discord Notification
            $NotificationSvc = app(Fls_NotificationServices::class);
            $NotificationSvc->PirepMessage($pirep, 'New flight report received');
        }

        if (Fls_Setting('FlsModule.acstate_control') && $pirep->aircraft) {
            // Change Aircraft State: PARKED
            $aircraft = $pirep->aircraft;
            $aircraft->state = AircraftState::PARKED;
            $aircraft->save();
            Log::info('Fls Basic | Pirep:' . $pirep->id . ' FILED, Change STATE of ' . $aircraft->registration . ' to PARKED');
        }

        if (Fls_Setting('FlsModule.networkcheck', false)) {
            // Pirep is Filed, calculate network presence percentage
            $results = Fls_WhazzUpCheck::select('is_online')->where('pirep_id', $pirep->id)->get();
            $check_count = $results->count();
            if ($check_count > 0) {
                $check_online = $results->where('is_online', 1)->count();
                $check_result = round((100 * $check_online) / $check_count);
            } else {
                $check_online = 0;
                $check_result = 0;
            }

            // Save the result
            PirepFieldValue::updateOrCreate(
                ['pirep_id' => $pirep->id, 'slug' => 'network-presence-check'],
                ['name' => 'Network Presence Check', 'value' => $check_result, 'source' => PirepSource::ACARS]
            );

            // Update network name back to OFFLINE if result is 0
            if ($check_result == 0) {
                PirepFieldValue::updateOrCreate(
                    ['pirep_id' => $pirep->id, 'slug' => 'network-online'],
                    ['name' => 'Network Online', 'value' => 'OFFLINE', 'source' => PirepSource::ACARS]
                );
            }

            Log::debug('Fls Basic | Pirep:' . $pirep->id . ' FILED, C:' . $check_count . ' P:' . $check_online . ' Calculated Presence %:' . $check_result);

            if (Fls_Setting('FlsModule.networkcheck_callsign', false)) {
                // Pirep is Filed, read recorded callsigns and write the result
                // Skipping null records to eliminate possible problems when boarding starts but connection is delayed
                $callsigns = Fls_WhazzUpCheck::select('callsign')->where('pirep_id', $pirep->id)->whereNotNull('callsign')->get();
                $callsigns_count = $callsigns->count();
                if ($callsigns_count > 0) {
                    // Get Core Airlines and check each callsign against them
                    $airline_codes = Airline::where('active', 1)->pluck('icao')->toArray();
                    $i = 0;
                    foreach ($callsigns as $cs) {
                        if (in_array(substr($cs->callsign, 0, 3), $airline_codes)) {
                            $i++;
                        }
                    }
                    $callsign_check = $i;
                    $callsign_result = round((100 * $callsign_check) / $callsigns_count);
                } else {
                    $callsign_check = 0;
                    $callsign_result = 0;
                }

                Log::debug('Fls Basic | Pirep:' . $pirep->id . ' FILED, C:' . $callsigns_count . ' P:' . $callsign_check . ' Calculated Callsign Match %:' . $callsign_result);
                PirepFieldValue::updateOrCreate(
                    ['pirep_id' => $pirep->id, 'slug' => 'network-callsign-check'],
                    ['name' => 'Network Callsign Check', 'value' => $callsign_result, 'source' => PirepSource::ACARS]
                );
            }

            // $pirep->save();
        }
    }
}
