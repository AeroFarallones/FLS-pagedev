<?php

namespace Modules\FlsModule\Http\Controllers;

use App\Contracts\Controller;
use App\Models\User;
use League\ISO3166\ISO3166;

class Fls_RosterController extends Controller
{
    // All Users
    public function index()
    {
        $eager_load = ['airline', 'current_airport', 'home_airport', 'last_pirep', 'rank'];
        $users = User::withCount('awards')->with($eager_load)->orderby('pilot_id', 'asc')->paginate(50);

        return view('FlsModule::roster.index', [
            'users'   => $users,
            'country' => new ISO3166(),
        ]);
    }
}
