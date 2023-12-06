<?php

namespace Modules\FlsModule\Widgets;

use App\Contracts\Widget;
use Illuminate\Support\Facades\Lang;
use Modules\FlsModule\Models\Fls_Session;
use Illuminate\View\Component;

class FleetInfo extends Widget
{
    protected $config = ['aircraft' => null, 'visible' => true];

    public function run()
    {
        $is_visible = $this->config['visible'];
        $aircraft = strtoupper($this->config['aircraft']);



        $title = "";
        $aircraftDescription = "";
        $spcMtow = "";
        $spcZfw  = "";
        $spcCeiling = "";
        $spcMaxPayload = "";
        $spcSpeed = "";
        $range = "";


        if (Lang::has('FlsModule::fls.aircraft.' . $aircraft)) {
            $title = __('FlsModule::fls.aircraft.' . $aircraft . '.title');
            $aircraftDescription = __('FlsModule::fls.aircraft.' . $aircraft . '.description');
            $spcMtow = __('FlsModule::fls.aircraft.' . $aircraft . '.spcMtow');
            $spcZfw = __('FlsModule::fls.aircraft.' . $aircraft . '.spcZfw');
            $spcCeiling = __('FlsModule::fls.aircraft.' . $aircraft . '.spcCeiling');
            $spcMaxPayload = __('FlsModule::fls.aircraft.' . $aircraft . '.spcMaxPayload');
            $spcSpeed = __('FlsModule::fls.aircraft.' . $aircraft . '.spcSpeed');
            $range = __('FlsModule::fls.aircraft.' . $aircraft . '.range');
        } else {
            $is_visible = false;
        }

        return view('FlsModule::widgets.fleet_info', [
            'aircraft' => $aircraft,
            'title' => $title,
            'description' => $aircraftDescription,
            'mtow' => $spcMtow,
            'Zfw' => $spcZfw,
            'Ceiling' => $spcCeiling,
            'MaxPayload' => $spcMaxPayload,
            'Speed' => $spcSpeed,
            'range' => $range,
            'is_visible' => $is_visible
        ]);
    }
}
