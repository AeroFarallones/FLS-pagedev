@if($is_visible)
@foreach($flights as $flight)
<div class="pt-3">
  <div class="card dashboard-pirep-card dashboard-card py-3 px-3">
    <div class="row">
      <div class="col-md-2 align-self-center text-center">
        <img class="dashboard-img-pirep-logo" style="width:-webkit-fill-available;" src="/assets/frontend/img/MNT FLS W.png" alt="AeroFarallones logo">
      </div>
      <div class="col-md-10">
        <div class="row flight-row-pirep">
          <div class="col-sm-5 dashboard-primary-text">
            <a class="text-white a-fls" href="{{ route('frontend.airports.show', [$flight->dpt_airport_id]) }}"
              title="{{ optional($flight->dpt_airport)->iata.' '.optional($flight->dpt_airport)->name }}">
              {{ $flight->dpt_airport_id }}
            </a>
          </div>
          <div class="col-sm-2 dashboard-primary-text">
            <i class="fa-solid fa-plane"></i>
          </div>
          <div class="col-sm-5 dashboard-primary-text">
            <a class="text-white a-fls" href="{{ route('frontend.airports.show', [$flight->arr_airport_id]) }}"
              title="{{ optional($flight->arr_airport)->iata.' '.optional($flight->arr_airport)->name }}">
              {{ $flight->arr_airport_id }}
            </a>
          </div>
        </div>
        <div class="row flight-row-pirep dashboard-primary-text">
          {{ $flight->airline->code.' '.$flight->flight_number }}
        </div>
        <div class="row flight-row-pirep dashboard-secondary-text">
          <div class="col-sm-6">
            <a class="text-white a-fls" href="{{ route('FlsModule.aircraft', [$flight->aircraft->registration]) }}">
              {{ $flight->aircraft->registration.' ('.$flight->aircraft->icao.')' }}
            </a>
          </div>
          <div class="col-sm-6">
            <a class="text-white a-fls" href="{{ route('frontend.profile.show', [$flight->user_id]) }}">
              @if(Theme::getSetting('roster_ident'))
              {{ $flight->user->ident.' - ' }}
              @endif
              {{ $flight->user->name_private }}
            </a>
          </div>
        </div>
        <div class="row flight-row-pirep text-center mb-0">
          <h5 class="font-montbold text-white mb-0">
            @if($flight->status == 'BST')
            {{ PirepStatus::label($flight->status).' | '.optional($flight->field_values->where('slug',
              'departure-gate')->first())->value }}
            @elseif($flight->status == 'ARR' || $flight->status == 'ONB')
            {{ PirepStatus::label($flight->status).' | '.optional($flight->field_values->where('slug',
              'arrival-gate')->first())->value }}
            @else
            {{ PirepStatus::label($flight->status) }}
            @endif
          </h5>
        </div>
        <div class="row flight-row-pirep dashboard-secondary-text">
          <a class="text-white a-fls" href="{{ route('frontend.pireps.show', [$flight->id]) }}">
            See details
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endif