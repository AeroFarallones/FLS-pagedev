<?php

namespace Modules\FlsModule\Http\Controllers;

use App\Contracts\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\FlsModule\Models\Fls_Spec;

class Fls_SpecController extends Controller
{
    // Specifications management page
    public function index(Request $request)
    {

        if ($request->input('spec_delete')) {
            $spec = Fls_Spec::where('id', $request->input('spec_delete'))->first();

            if (!$spec) {
                flash()->error('Record not found !');

                return redirect(route('FlsModule.specs'));
            } else {
                $spec->delete();
                flash()->warning('Record deleted !');
            }
        }

        if ($request->input('spec_edit')) {
            $spec = Fls_Spec::with('aircraft', 'subfleet')->where('id', $request->input('spec_edit'))->first();

            if (!$spec) {
                flash()->error('Record Not Found !');

                return redirect(route('FlsModule.specs'));
            }
        }

        //Get SubFleet List
        $icao_types = DB::table('aircraft')->whereNull('deleted_at')->select('icao')->whereNotNull('icao')->groupBy('icao')->orderby('icao')->pluck('icao')->toArray();
        $subfleets = DB::table('subfleets')->whereNull('deleted_at')->select('id', 'name', 'type')->orderby('name')->get();
        $aircraft = DB::table('aircraft')->whereNull('deleted_at')->select('id', 'name', 'registration', 'icao')->orderby('registration')->get();
        $all_specs = Fls_Spec::with('aircraft', 'subfleet')->orderBy('id')->get();

        return view('FlsModule::admin.specs', [
            'icaotypes' => $icao_types,
            'subfleets' => $subfleets,
            'aircraft'  => $aircraft,
            'allspecs'  => $all_specs,
            'spec'      => isset($spec) ? $spec : null,
            'units'     => Fls_GetUnits('full'),
        ]);
    }

    // Store Specification
    public function store(Request $request)
    {
        if (!$request->aircraft_id && !$request->subfleet_id && !$request->icao_id) {
            flash()->error('Select at least an ICAO Type or Subfleet or Aircraft to record specs !');

            return redirect(route('FlsModule.specs'));
        }

        if (!$request->saircraft) {
            flash()->error('Aircraft Name field is required !');

            return redirect(route('FlsModule.specs'));
        }

        Fls_Spec::updateOrCreate(
            [
                'id'          => $request->id,
            ],
            [
                'icao_id'     => $request->icao_id,
                'aircraft_id' => $request->aircraft_id,
                'subfleet_id' => $request->subfleet_id,
                'airframe_id' => $request->airframe_id,
                'icao'        => $request->icao,
                'name'        => $request->name,
                'engines'     => $request->engines,
                'bew'         => $request->bew,
                'dow'         => $request->dow,
                'mzfw'        => $request->mzfw,
                'mrw'         => $request->mrw,
                'mtow'        => $request->mtow,
                'mlw'         => $request->mlw,
                'mrange'      => $request->mrange,
                'mceiling'    => $request->mceiling,
                'mfuel'       => $request->mfuel,
                'mpax'        => $request->mpax,
                'mspeed'      => $request->mspeed,
                'cspeed'      => $request->cspeed,
                'cat'         => $request->cat,
                'equip'       => $request->equip,
                'transponder' => $request->transponder,
                'pbn'         => $request->pbn,
                'crew'        => $request->crew,
                'saircraft'   => $request->saircraft,
                'stitle'      => $request->stitle,
                'fuelfactor'  => $request->fuelfactor,
                'cruiselevel' => $request->cruiselevel,
                'paxwgt'      => $request->paxwgt,
                'bagwgt'      => $request->bagwgt,
                'selcal'      => $request->selcal,
                'hexcode'     => $request->hexcode,
                'rmk'         => $request->rmk,
                'rvr'         => $request->rvr,
                'active'      => $request->active,
            ]
        );

        flash()->success('Specifications saved');
        return redirect(route('FlsModule.specs'));
    }
}
