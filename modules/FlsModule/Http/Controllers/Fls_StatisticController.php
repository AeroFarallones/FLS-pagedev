<?php

namespace Modules\FlsModule\Http\Controllers;

use App\Contracts\Controller;
use App\Models\Enums\ActiveState;
use Illuminate\Support\Facades\DB;
use Modules\FlsModule\Services\Fls_StatServices;

class Fls_StatisticController extends Controller
{
    // Stats
    public function index()
    {
        $airline_count = DB::table('airlines')->whereNull('deleted_at')->where('active', ActiveState::ACTIVE)->count();
        $multi_airline = ($airline_count && $airline_count > 1) ? true : false;

        $StatSvc = app(Fls_StatServices::class);

        $stats_basic = $StatSvc->BasicStats();
        $stats_basic[__('FlsModule::common.airports')] = DB::table('airports')->whereNull('deleted_at')->count();
        $stats_basic[__('FlsModule::common.hubs')] = DB::table('airports')->whereNull('deleted_at')->where('hub', 1)->count();

        $stats_pirep = $StatSvc->PirepStats();
        $stats_ivao = $StatSvc->NetworkStats('IVAO');
        $stats_vatsim = $StatSvc->NetworkStats('VATSIM');

        return view('FlsModule::stats.index', [
            'multi_airline' => $multi_airline,
            'stats_basic'   => $stats_basic,
            'stats_ivao'    => $stats_ivao,
            'stats_vatsim'  => $stats_vatsim,
            'stats_pirep'   => $stats_pirep,
        ]);
    }
}
