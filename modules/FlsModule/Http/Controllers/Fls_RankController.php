<?php

namespace Modules\FlsModule\Http\Controllers;

use App\Contracts\Controller;
use App\Models\Rank;

class Fls_RankController extends Controller
{
    // Ranks
    public function index()
    {
        $ranks = Rank::with('subfleets.airline')->orderby('hours')->get();

        return view('FlsModule::ranks.index', [
            'currency' => setting('units.currency'),
            'ranks'    => $ranks,
        ]);
    }
}
