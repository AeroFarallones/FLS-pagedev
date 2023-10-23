<?php

namespace Modules\AeroFarallonesTheme\Widgets;

use App\Contracts\Widget;
use Carbon\Carbon;
use Modules\AeroFarallonesTheme\Services\Fls_StatServices;

class LeaderBoard extends Widget
{
    /**
     * The configuration array.
     */
    protected $config = ['source' => 'pilot', 'count' => 3, 'type' => 'flights', 'period' => null, 'hub' => null];


    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
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
            $title = ($count === 1) ? __('Fls::widgets.best_airline') : __('Fls::widgets.top_airlines');
            $icon = ($count === 1) ? 'fa-trophy' : 'fa-list';
        } elseif ($source === 'arr') {
            $title = ($count === 1) ? __('Fls::widgets.best_airport') : __('Fls::widgets.top_airports');
            $footer_note = __('Fls::common.arrival');
            $icon = 'fa-plane-arrival';
        } elseif ($source === 'dep') {
            $title = ($count === 1) ? __('Fls::widgets.best_airport') : __('Fls::widgets.top_airports');
            $footer_note = __('Fls::common.departure');
            $icon = 'fa-plane-departure';
        } else {
            $title = ($count === 1) ? __('Fls::widgets.best_pilot') : __('Fls::widgets.top_pilots');
            $footer_note = isset($hub) ? $hub . ' (' . __('Fls::common.hub') . ')' : null;
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
            $type_text = __('Fls::common.distance');
        } elseif ($type === 'time') {
            $type_text = __('Fls::common.btime');
        } elseif ($type === 'lrate') {
            $type_text = __('Fls::common.lrate');
        } elseif ($type === 'lrate_low') {
            $type_text = __('Fls::widgets.lrate_low');
        } elseif ($type === 'lrate_high') {
            $type_text = __('Fls::widgets.lrate_hgh');
        } elseif ($type === 'score') {
            $type_text = __('Fls::common.score');
        } else {
            $type_text = __('Fls::common.flights');
        }

        $StatSvc = app(Fls_StatServices::class);
        $leader_board = $StatSvc->LeaderBoard($source, $count, $type, $period, $hub);

        return view('Fls::widgets.leader_board', [
            'column_title' => ($type === 'lrate' || $type === 'score') ? __('Fls::common.avg') : __('Fls::common.record'),
            'count'        => $count,
            'footer_type'  => $type_text,
            'footer_note'  => isset($footer_note) ? $footer_note : null,
            'header_icon'  => $icon,
            'header_title' => $title,
            'leader_board' => $leader_board,
        ]);
    }
}
