<?php

namespace Modules\AeroFarallonesTheme\Widgets;

use App\Contracts\Widget;
use Carbon\Carbon;

class LeaderBoard extends Widget
{
    /**
     * The configuration array.
     */
    protected $config = ['source' => 'pilot', 'count' => 3, 'type' => 'flights', 'title' => null, 'date' => false];


    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {

        $title = $this->config['title'];
        $has_date = $this->config['date'];

        if ($has_date) {
            $now = Carbon::now();
        } else {
            $now = "Date disable";
        }

        return view('aerofarallonestheme::widgets.leader_board', [
            'current_date' => $now,
            'title' => $title,
        ]);
    }
}
