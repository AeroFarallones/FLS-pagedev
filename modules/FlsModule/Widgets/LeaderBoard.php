<?php

namespace Modules\FlsModule\Widgets;

use App\Contracts\Widget;
use Carbon\Carbon;
use Modules\FlsModule\Services\Fls_StatServices;

class LeaderBoard extends Widget
{
    protected $config = ['source' => 'pilot', 'count' => 3, 'type' => 'flights', 'period' => null, 'hub' => null];

    public function run()
    {
        $now = Carbon::now();
        $source = $this->config['source'];
        $count = is_numeric($this->config['count']) ? $this->config['count'] : 3;
        $type = $this->config['type'];
        $period = $this->config['period'];
        $hub = $this->config['hub'];

        // Title and icon
        if ($source === 'airline') {
            $title = ($count === 1) ? __('FlsModule::widgets.best_airline') : __('FlsModule::widgets.top_airlines');
            $icon = ($count === 1) ? 'fa-trophy' : 'fa-list';
        } elseif ($source === 'arr') {
            $title = ($count === 1) ? __('FlsModule::widgets.best_airport') : __('FlsModule::widgets.top_airports');
            $footer_note = __('FlsModule::common.arrival');
            $icon = 'fa-plane-arrival';
        } elseif ($source === 'dep') {
            $title = ($count === 1) ? __('FlsModule::widgets.best_airport') : __('FlsModule::widgets.top_airports');
            $footer_note = __('FlsModule::common.departure');
            $icon = 'fa-plane-departure';
        } else {
            $title = ($count === 1) ? __('FlsModule::widgets.best_pilot') : __('FlsModule::widgets.top_pilots');
            $footer_note = isset($hub) ? $hub . ' (' . __('FlsModule::common.hub') . ')' : null;
            $icon = ($count === 1) ? 'fa-crown' : 'fa-list-ol';
        }

        // Period text (visible at Card Header)
        if ($period === 'currentm') {
            $period_text = $now->startOfMonth()->format('F');
        } elseif ($period === 'lastm') {
            $period_text = $now->subMonthNoOverflow()->startOfMonth()->format('F');
        } elseif ($period === 'prevm') {
            $period_text = $now->subMonthsNoOverflow(2)->startOfMonth()->format('F');
        } elseif ($period === 'currenty') {
            $period_text = $now->startOfYear()->format('Y');
        } elseif ($period === 'lasty') {
            $period_text = $now->subYearNoOverflow()->startOfYear()->format('Y');
        } elseif ($period === 'prevy') {
            $period_text = $now->subYearsNoOverflow(2)->startOfYear()->format('Y');
        }

        if (isset($period_text)) {
            $title = $title . ' | ' . $period_text;
        }

        // Type text (visible at Card Footer)
        if ($type === 'distance') {
            $type_text = __('FlsModule::common.distance');
        } elseif ($type === 'time') {
            $type_text = __('FlsModule::common.btime');
        } elseif ($type === 'lrate') {
            $type_text = __('FlsModule::common.lrate');
        } elseif ($type === 'lrate_low') {
            $type_text = __('FlsModule::widgets.lrate_low');
        } elseif ($type === 'lrate_high') {
            $type_text = __('FlsModule::widgets.lrate_hgh');
        } elseif ($type === 'score') {
            $type_text = __('FlsModule::common.score');
        } else {
            $type_text = __('FlsModule::common.flights');
        }

        $StatSvc = app(Fls_StatServices::class);
        $leader_board = $StatSvc->LeaderBoard($source, $count, $type, $period, $hub);

        return view('FlsModule::widgets.leader_board', [
            'column_title' => ($type === 'lrate' || $type === 'score') ? __('FlsModule::common.avg') : __('FlsModule::common.record'),
            'count'        => $count,
            'footer_type'  => $type_text,
            'footer_note'  => isset($footer_note) ? $footer_note : null,
            'header_icon'  => $icon,
            'header_title' => $title,
            'leader_board' => $leader_board,
        ]);
    }

    public function placeholder()
    {
        $loading_style = '<div class="alert alert-info mb-2 p-1 px-2 small fw-bold"><div class="spinner-border spinner-border-sm text-dark me-2" role="status"></div>Loading Leader Board data...</div>';
        return $loading_style;
    }
}
