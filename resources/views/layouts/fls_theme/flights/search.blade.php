<div class="card dashboard-card mb-3">
    <div class="card-header p-1 dashboard-card" style="background-color: #00157f;">
        <h4 class="m-1 text-white">@lang('flights.search')</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group search-form">
                    {{ Form::open([
              'route' => 'frontend.flights.search',
              'method' => 'GET',
      ]) }}

                    <div class="mt-1">
                        <div class="form-group">
                            <p class="mb-0">@lang('common.airline')</p>
                            {{ Form::select('airline_id', $airlines, null , ['class' => 'form-control select2']) }}
                        </div>
                    </div>

                    <div class="mt-1">
                        <p class="mb-0">@lang('flights.flighttype')</p>
                        {{ Form::select('flight_type', $flight_types, null , ['class' => 'form-control select2']) }}
                    </div>

                    <div class="mt-1">
                        <p class="mb-0">@lang('flights.flightnumber')</p>
                        {{ Form::text('flight_number', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="mt-1">
                        <p class="mb-0">@lang('flights.code')</p>
                        {{ Form::text('route_code', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="mt-1">
                        <p class="mb-0">@lang('airports.departure')</p>
                        {{ Form::select('dep_icao', [], null , ['class' => 'form-control airport_search']) }}
                    </div>

                    <div class="mt-1">
                        <p class="mb-0">@lang('airports.arrival')</p>
                        {{ Form::select('arr_icao', [], null , ['class' => 'form-control airport_search']) }}
                    </div>

                    <div class="mt-1">
                        <p class="mb-0">@lang('common.subfleet')</p>
                        {{ Form::select('subfleet_id', $subfleets, null , ['class' => 'form-control select2']) }}
                    </div>

                    <div class="row clear mt-1 pt-3" style="margin-top: 10px;">
                        {{ Form::submit(__('common.find'), ['class' => 'btn button-blue-fls mb-2 font-montbold']) }}
                        <a class="a-flights font-montbold text-center"
                            href="{{ route('frontend.flights.index') }}">@lang('common.reset')</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>