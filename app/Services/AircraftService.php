<?php

namespace App\Services;

use App\Contracts\Service;
use App\Models\Aircraft;
use App\Models\Pirep;

class AircraftService extends Service
{
    /**
     * Recalculate all aircraft stats and hours
     */
    public function recalculateStats()
    {
        $allAircraft = Aircraft::all(); // TODO: Soft delete
        foreach ($allAircraft as $aircraft) {
            $pirep_time_total = Pirep::where('aircraft_id', $aircraft->id)
                ->sum('flight_time');
            $aircraft->flight_time = $pirep_time_total;
            $aircraft->save();
        }
    }
}
