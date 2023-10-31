<?php

namespace Modules\FlsModule\Http\Controllers;

use App\Contracts\Controller;
use App\Models\Award;

class Fls_AwardController extends Controller
{
    // Awards
    public function index()
    {
        $awards = Award::orderby('id')->get()->sortby('name', SORT_NATURAL);

        return view('FlsModule::awards.index', [
            'awards' => $awards
        ]);
    }
}
