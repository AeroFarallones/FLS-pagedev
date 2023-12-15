<div class="card mb-2">
  <div class="card-header p-1 dashboard-card-body">
    <h5 class="m-1 db-font-montbold text-white">
      {{ optional($pirep->airline)->code.' '.$pirep->flight_number }}
      {{ ' | '.optional($pirep->dpt_airport)->location.' > '.optional($pirep->arr_airport)->location }}
    </h5>
  </div>
  <div class="card-body p-1">
    <div class="row">
      <div class="col-md-5 text-start">
          <i class="fas fa-plane-departure float-start m-1 blue-fls" title="Departure Airport"></i>
          <a href="{{ route('frontend.airports.show', [$pirep->dpt_airport_id]) }}">
            {{ optional($pirep->dpt_airport)->full_name ?? $pirep->dpt_airport_id }}
          </a>
      </div>
      <div class="col-md-2 text-center">
        @if(filled($pirep->distance))
          <i class="fas fa-route m-1 blue-fls" title="Distance"></i>
          {{ DT_ConvertDistance($pirep->distance, $units['distance']) }}
        @endif
      </div>
      <div class="col-md-5 text-end">
        <i class="fas fa-plane-arrival float-end m-1 blue-fls" title="Arrival Aiport"></i>
        <a href="{{ route('frontend.airports.show', [$pirep->arr_airport_id]) }}">
          {{ optional($pirep->arr_airport)->full_name ?? $pirep->arr_airport_id }}
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 text-start">
        @if(filled($pirep->block_off_time))
          <i class="fas fa-clock float-start m-1 blue-fls" title="Off Block"></i>
          {{ $pirep->block_off_time->format('H:i | l d.M.Y') }}
        @endif
      </div>
      <div class="col-md-2 text-center">
        @if(filled($pirep->flight_time))
          <i class="fas fa-stopwatch m-1 blue-fls" title="Block Time"></i>
          {{ DT_ConvertMinutes($pirep->flight_time, '%2dh %2dm') }}
        @endif
      </div>
      <div class="col-md-5 text-end">
        @if($pirep->block_on_time > $pirep->block_off_time)
          <i class="fas fa-clock float-end m-1 blue-fls" title="On Block"></i>
          {{ $pirep->block_on_time->format('H:i | l d.M.Y') }}
        @endif
      </div>
    </div>
  </div>
  <div class="card-footer bg-transparent p-1">
    <div class="progress" style="height: 20px;">
      <div
        class="progress-bar-fls @if(blank($pirep->block_on_time)) progress-bar-striped progress-bar-animated @endif text-white db-font-montbold text-center"
        role="progressbar" style="width: {{ $pirep->progress_percent }}%;"
        aria-valuenow="{{ $pirep->progress_percent }}" aria-valuemin="0" aria-valuemax="100">
        {{ $pirep->progress_percent }}%
      </div>
    </div>
  </div>
  <div class="card-footer bg-transparent p-1">
    <div class="row">
      <div class="col text-start font-montbold">
        {!! DT_FlightType($pirep->flight_type, 'button') !!}
      </div>
      <div class="col text-end font-montbold">
        {!! DT_RouteCode($pirep->route_code, 'button') !!} {!! DT_RouteLeg($pirep->route_leg, 'button') !!}
      </div>
      @if(!$pirep->read_only && $user && $pirep->user_id === $user->id)
        <div class="col-2 text-end font-montbold">
          <form method="post" action="{{ route('frontend.pireps.submit', $pirep->id) }}">
            @csrf
            <button class="btn btn-sm button-blue-fls text-white m-0 mx-1 p-0 px-1 float-end">@lang('common.submit')</button>
          </form>
          <form method="get" action="{{ route('frontend.pireps.edit', $pirep->id) }}">
            @csrf
            <button class="btn btn-sm button-blue-fls text-white m-0 mx-1 p-0 px-1 float-end">@lang('common.edit')</button>
          </form>
        </div>
      @endif
    </div>
  </div>
</div>