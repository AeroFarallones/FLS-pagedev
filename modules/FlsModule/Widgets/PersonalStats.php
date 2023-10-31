<?php

namespace Modules\FlsModule\Widgets;

use App\Contracts\Widget;
use Illuminate\Support\Facades\Auth;
use Modules\FlsModule\Services\Fls_StatServices;

class PersonalStats extends Widget
{
    protected $config = ['disp' => null, 'user' => null, 'period' => null, 'type' => 'avglanding'];

    public function run()
    {
        $user_id = $this->config['user'] ?? Auth::id();
        $period = $this->config['period'];
        $type = $this->config['type'];

        $StatSvc = app(Fls_StatServices::class);
        $personal = $StatSvc->PersonalStats($user_id, $period, $type);

        if ($type === 'fdm') {
            $is_visible = Fls_SapReports($user_id);
        } else {
            $is_visible = true;
        }

        return view('FlsModule::widgets.personal_stats', [
            'config'  => $this->config,
            'pstat'   => isset($personal['formatted']) ? $personal['formatted'] : __('FlsModule::widgets.noreports'),
            'rstat'   => isset($personal['raw']) ? $personal['raw'] : null,
            'sname'   => isset($personal['stat_name']) ? $personal['stat_name'] : null,
            'speriod' => isset($personal['period_text']) ? '(' . $personal['period_text'] . ')' : null,
            'visible' => $is_visible,
        ]);
    }
}
