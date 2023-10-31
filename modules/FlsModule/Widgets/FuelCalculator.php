<?php

namespace Modules\FlsModule\Widgets;

use App\Contracts\Widget;
use Modules\FlsModule\Services\Fls_FleetServices;

class FuelCalculator extends Widget
{
    protected $config = ['aircraft' => null];

    public function run()
    {
        $aircraft_id = is_numeric($this->config['aircraft']) ? $this->config['aircraft'] : null;
        $is_metric = (setting('units.fuel') === 'kg') ? true : false;

        $FleetSvc = app(Fls_FleetServices::class);
        $fuel_data = $FleetSvc->AverageFuelBurn($aircraft_id);

        return view('FlsModule::widgets.fuel_calculator', [
            'avg_metric' => isset($fuel_data['avg_metric']) ? $fuel_data['avg_metric'] : null,
            'avg_pounds' => isset($fuel_data['avg_pounds']) ? $fuel_data['avg_pounds'] : null,
            'fuel_data'  => $fuel_data,
            'is_metric'  => $is_metric,
        ]);
    }
}
