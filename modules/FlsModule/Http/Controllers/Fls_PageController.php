<?php

namespace Modules\FlsModule\Http\Controllers;

use App\Contracts\Controller;

class Fls_PageController extends Controller
{
    // Live WX
    public function livewx()
    {
        $coordinates = setting('acars.center_coords');

        $divider = strpos($coordinates, ',');
        $lat = substr($coordinates, 0, $divider);
        $lon = substr($coordinates, ($divider + 1));

        return view('FlsModule::pages.livewx', [
            'lat' => $lat,
            'lon' => $lon,
        ]);
    }
}
