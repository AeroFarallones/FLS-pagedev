@extends('app')
@section('title', $airport->full_name)

@section('content')
<div class="row pt-3">
    {{-- LEFT --}}
    <div class="col-sm-4">
        <div class="card mb-2">
            <div class="card-header airports-card-body p-1">
                <h4 class="m-1 font-fls">
                    {{ $airport->name }}
                </h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-borderless align-middle text-end mb-0">
                    <tr>
                        <th class="text-start">@lang('FlsModule::fls.icao_iata_code')</th>
                        <td>{{ $airport->icao.' / '.$airport->iata }}</td>
                    </tr>
                    <tr>
                        <th class="text-start">@lang('user.location') / @lang('common.country')</th>
                        <td>{{ $airport->location.' / '.$airport->country }}</td>
                    </tr>
                    @if(filled($airport->timezone))
                    <tr>
                        <th class="text-start">@lang('common.timezone')</th>
                        <td>{{ $airport->timezone }}</td>
                    </tr>
                    @endif
                    @if($airport->fuel_mogas_cost > 0)
                    <tr>
                        <th class="text-start">@lang('FlsModule::fls.mogas_cost')</th>
                        <td>{{ DT_FuelCost($airport->fuel_mogas_cost, $units['fuel'], $units['currency']) }}</td>
                    </tr>
                    @endif
                    @if($airport->fuel_100ll_cost > 0)
                    <tr>
                        <th class="text-start">@lang('FlsModule::fls.100ll_cost')</th>
                        <td>{{ DT_FuelCost($airport->fuel_100ll_cost, $units['fuel'], $units['currency']) }}</td>
                    </tr>
                    @endif
                    @if($airport->fuel_jeta_cost > 0)
                    <tr>
                        <th class="text-start">@lang('FlsModule::fls.jeta1_cost')</th>
                        <td>{{ DT_FuelCost($airport->fuel_jeta_cost, $units['fuel'], $units['currency']) }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th class="text-start">@lang('FlsModule::fls.avg_taxi_times')</th>
                        <td>Out: {{ Fls_AvgTaxiTime($airport->id, 'out', 10) }} min | In:
                            {{ Fls_AvgTaxiTime($airport->id, 'in', 5) }}
                            min</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer card-footer-fls p-0">
                @widget('FlsModule::SunriseSunset', ['location' => $airport->id, 'card' => false])
            </div>
        </div>
        <div class="mb-0">
            @widget('FlsModule::Map', ['source' => $airport->id])
        </div>
        {{-- Show Pills For Map/WX/Downloads--}}
        <div class="row">
            <div class="d-flex nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                <div class="col-sm-4 d-grid">
                    <button class="nav-link active button-blue-fls font-montbold" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">@lang('FlsModule::fls.map')</button>
                </div>
                <div class="col-sm-4 d-grid">
                    <button class="nav-link button-blue-fls font-montbold" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">WX @lang('FlsModule::fls.map')</button>
                </div>
                <div class="col-sm-4 d-grid">
                    <button class="nav-link button-blue-fls font-montbold" id="v-pills-messages-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                        aria-selected="false">@lang('FlsModule::fls.weather')</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Show the airspace map in the other column --}}
    <div class="col-sm-8">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
                tabindex="0">
                <div class="card mb-2">
                    <div class="card-header p-1 airports-card-body">
                        <h4 class="m-1 font-fls">
                            {{ $airport->full_name }}
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        @widget('AirspaceMap', ['width' => '100%', 'height' => '500px', 'lat' => $airport->lat,
                        'lon' =>
                        $airport->lon])
                    </div>
                    <div class="card-footer card-footer-fls p-0 px-3 small text-end">
                        <b>{{ $airport->location.' / '.strtoupper($airport->country) }}</b>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                tabindex="0">
                <div class="card mb-2">
                    <div class="card-header p-1 airports-card-body">
                        <h4 class="m-1">
                            {{ $airport->full_name }}
                        </h4>
                    </div>
                    <div class="card-body p-0">
                        @include('FlsModule::pages.livewx_map' , ['lat' => $airport->lat, 'lon' => $airport->lon,
                        'zoom'
                        =>
                        8, 'height' => '500px', 'marker' => true])
                    </div>
                    <div class="card-footer p-0 px-1 small text-end">
                        <b>{{ $airport->location.' / '.strtoupper($airport->country) }}</b>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
                tabindex="0">
                @widget('Weather', ['icao' => $airport->icao])
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-4">
        @widget('FlsModule::AirportAssets', ['type' => 'aircraft', 'location' => $airport->id])
    </div>
    <div class="col-sm-4">
        @widget('FlsModule::AirportAssets', ['type' => 'pilots', 'location' => $airport->id])
    </div>
    <div class="col-sm-4">
        @widget('FlsModule::AirportAssets', ['type' => 'pireps', 'location' => $airport->id])
    </div>
</div>
<div class="row">
    {{-- There are files uploaded and a user is logged in--}}
    @if(count($airport->files) > 0 && Auth::check())
    <div class="col-12">
        <h3>{{ trans_choice('common.download', 2) }}</h3>
        @include('downloads.table', ['files' => $airport->files])
    </div>
    @endif
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="card mb-2">
            <div class="card-header p-1 airports-card-body px-2">
                <h4 class="m-1">@lang('flights.inbound')</h4>
            </div>
            @if(!$inbound_flights)
            <div class="jumbotron text-center">
                @lang('flights.none')
            </div>
            @else
            <div class="card-body p-0 overflow-auto">
                <table class="table table-sm table-borderless text-center text-nowrap align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-left">@lang('airports.ident')</th>
                            <th class="text-left">@lang('airports.departure')</th>
                            <th>@lang('flights.dep')</th>
                            <th>@lang('flights.arr')</th>
                        </tr>
                    </thead>
                    @foreach($inbound_flights as $flight)
                    <tr>
                        <td class="text-left">
                            <a href="{{ route('frontend.flights.show', [$flight->id]) }}">
                                {{ $flight->ident }}
                            </a>
                        </td>
                        <td class="text-left">{{ optional($flight->dpt_airport)->name }}
                            (<a href="{{route('frontend.airports.show',
                         ['id' => $flight->dpt_airport_id])}}">{{$flight->dpt_airport_id}}</a>)
                        </td>
                        <td>{{ $flight->dpt_time }}</td>
                        <td>{{ $flight->arr_time }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @endif
            <div class="card-footer card-footer-fls p-0 px-3 text-end small">
                @lang('FlsModule::fls.total') {{ count($inbound_flights) }}
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card mb-2">
            <div class="card-header p-1 airports-card-body px-2">
                <h4 class="m-1">@lang('flights.outbound')</h4>
            </div>
            @if(!$outbound_flights)
            <div class="jumbotron text-center">
                @lang('flights.none')
            </div>
            @else
            <div class="card-body p-0 overflow-auto">
                <table class="table table-sm table-borderless text-center text-nowrap align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="text-left">@lang('airports.ident')</th>
                            <th class="text-left">@lang('airports.arrival')</th>
                            <th>@lang('flights.dep')</th>
                            <th>@lang('flights.arr')</th>
                        </tr>
                    </thead>
                    @foreach($outbound_flights as $flight)
                    <tr>
                        <td class="text-left background-transparent">
                            <a href="{{ route('frontend.flights.show', [$flight->id]) }}">
                                {{ $flight->ident }}
                            </a>
                        </td>
                        <td class="text-left">{{ $flight->arr_airport->name }}
                            (<a href="{{route('frontend.airports.show',
                         ['id'=>$flight->arr_airport->icao])}}">{{$flight->arr_airport->icao}}</a>)
                        </td>
                        <td>{{ $flight->dpt_time }}</td>
                        <td class="background-transparent">{{ $flight->arr_time }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @endif
            <div class="card-footer card-footer-fls p-0 px-3 text-end small">
                @lang('FlsModule::fls.total') {{ count($outbound_flights) }}
            </div>
        </div>
    </div>
</div>
@endsection