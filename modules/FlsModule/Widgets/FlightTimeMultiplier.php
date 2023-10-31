<?php

namespace Modules\FlsModule\Widgets;

use App\Contracts\Widget;

class FlightTimeMultiplier extends Widget
{
    public function run()
    {
        return view('FlsModule::widgets.flight_time_multiplier');
    }
}
