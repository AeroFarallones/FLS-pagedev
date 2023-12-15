<?php

namespace Modules\FlsModule\Widgets;

use App\Contracts\Widget;
use Modules\FlsModule\Models\Fls_StableApproach;

class StableApproach extends Widget
{
    protected $config = ['pirep' => null, 'button' => false];

    public function run()
    {
        $pirep = $this->config['pirep'];

        if ($pirep) {
            $where = ['user_id' => $pirep->user_id, 'pirep_id' => $pirep->id];
            $sap = Fls_StableApproach::where($where)->first();
        }

        return view('FlsModule::widgets.stable_approach', [
            'is_visible'      => isset($sap) ? true : false,
            'is_stable'       => isset($sap) ? $sap->stable : false,
            'sap'             => isset($sap) ? $sap : null,
            'report'          => (isset($sap) && filled($sap->report)) ? $sap->report : null,
            'use_button'      => is_bool($this->config['button']) ? $this->config['button'] : false,
            'approach_lights' => Fls_XPlane_SDK('applights'),
            'runway_marking'  => Fls_XPlane_SDK('markings'),
            'runway_surface'  => Fls_XPlane_SDK('surface'),
        ]);
    }
}
