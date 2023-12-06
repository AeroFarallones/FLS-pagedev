<div class="row pb-3" style="place-content: center; offset-distance: inherit;">
    @foreach($flights as $flight)
    <div class="col-md-4 pt-4">
        <div class="card dashboard-pirep-card dashboard-card pt-4 h-100">
            <div class="row row-flights-card dashboard-row-pirep">
                <img class="dashboard-img-pirep-logo" src="/assets/frontend/img/MNT FLS W.png"
                    alt="AeroFarallones logo">
            </div>
            <div class="row row-flights-card dashboard-row-pirep">
                <div class="col-sm-5 dashboard-primary-text">
                    <a class="text-white a-fls font-montbold dashboard-primary-text"
                        href="{{route('frontend.airports.show', ['id' => $flight->dpt_airport_id])}}">{{$flight->dpt_airport_id}}</a>
                </div>
                <div class="col-sm-2 dashboard-primary-text">
                    <i class="fa-solid fa-plane"></i>
                </div>
                <div class="col-sm-5 dashboard-primary-text">
                    <a class="text-white a-fls font-montbold dashboard-primary-text"
                        href="{{route('frontend.airports.show', ['id' => $flight->arr_airport_id])}}">{{$flight->arr_airport_id}}</a>
                </div>
            </div>
            <div class="row row-flights-card dashboard-row-pirep">
                <div class="col-sm-5 dashboard-secondary-text">
                    @if($flight->dpt_time)
                    {{ $flight->dpt_time }}
                    @else
                    N/A
                    @endif
                </div>
                <div class="col-sm-2 dashboard-secondary-text">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div class="col-sm-5 dashboard-secondary-text">
                    @if($flight->arr_time)
                    {{ $flight->arr_time }}
                    @else
                    N/A
                    @endif
                </div>
            </div>
            <div class="row row-flights-card dashboard-row-pirep">
                <div class="col-sm-12 dashboard-primary-text">
                    <a class="text-white a-fls font-montbold dashboard-primary-text" href="{{ route('frontend.flights.show', [$flight->id]) }}">
                        {{ optional($flight->airline)->code.''.$flight->flight_number }}
                    </a>
                </div>
            </div>
            <div class="row row-flights-card dashboard-row-pirep">
                <div class="col-sm-5 dashboard-secondary-text">
                    Non-stop
                </div>
                <div class="col-sm-2 dashboard-secondary-text">
                    <i class="fa-solid fa-arrow-right"></i>
                </div>
                <div class="col-sm-5 dashboard-secondary-text">
                    {{ $flight->flight_time }} minutes
                </div>
            </div>
            <div class="row row-flights-card dashboard-row-pirep">
                {{--
          !!! NOTE !!!
           Don't remove the "save_flight" class, or the x-id attribute.
           It will break the AJAX to save/delete

           "x-saved-class" is the class to add/remove if the bid exists or not
           If you change it, remember to change it in the in-array line as well
          --}}
                @if (!setting('pilots.only_flights_from_current') || $flight->dpt_airport_id ==
                $user->current_airport->icao)
                <button class="btn button-flights text-white a-fls save_flight
                           {{ isset($saved[$flight->id]) ? 'btn-info':'' }}" x-id="{{ $flight->id }}"
                    x-saved-class="btn-info" type="button" title="@lang('flights.addremovebid')">
                    @lang('flights.addremovebid')
                </button>
                @endif
            </div>
            <div class="row row-flights-card dashboard-row-pirep">
                <button class="btn button-flights">
                    <a class="text-white a-fls" href="{{ route('frontend.pireps.create') }}?flight_id={{ $flight->id }}"
                        class="btn btn-sm btn-outline-info">
                        {{ __('pireps.newpirep') }}
                    </a>
            </div>
        </div>
    </div>
    @endforeach
</div>