<div class="card dashboard-pirep-card dashboard-card pt-4 h-100">
  <div class="row dashboard-row-pirep">
    <img class="dashboard-img-pirep-logo" src="/assets/frontend/img/MNT FLS W.png" alt="AeroFarallones logo">
  </div>
  <div class="row dashboard-row-pirep">
    <div class="col-sm-5 dashboard-primary-text">
      {{ $pirep->dpt_airport->name }}
      (<a href="{{route('frontend.airports.show', [
                          'id' => $pirep->dpt_airport->icao
                          ])}}">{{$pirep->dpt_airport->icao}}</a>)
    </div>
    <div class="col-sm-2 dashboard-primary-text">
      <i class="fa-solid fa-plane"></i>
    </div>
    <div class="col-sm-5 dashboard-primary-text">
      {{ $pirep->arr_airport->name }}
      (<a href="{{route('frontend.airports.show', [
                          'id' => $pirep->arr_airport->icao
                          ])}}">{{$pirep->arr_airport->icao}}</a>)
    </div>
  </div>
  <div class="row dashboard-row-pirep dashboard-primary-text">
    <a href="{{ route('frontend.pireps.show', [$pirep->id]) }}">{{ $pirep->ident }}</a>
  </div>
  <div class="row dashboard-row-pirep dashboard-secondary-text">
    <div class="col-sm-6">
      <a href="{{ route('frontend.pireps.show', [$pirep->id]) }}">{{ ($pirep->aircraft)->ident }}</a>
    </div>
    <div class="col-sm-6">
      @if(filled($pirep->landing_rate))
      {{ $pirep->landing_rate.' ft/min' }}
      @endif
    </div>
  </div>
  <div class="row dashboard-row-pirep">
    @if($pirep->state === PirepState::PENDING)
    <i class="fa-solid fa-circle text-warning text-center dashboard-icon-size" title="Accepted" aria-hidden="true"></i>
    @elseif($pirep->state === PirepState::ACCEPTED)
    <i class="fa-solid fa-circle text-success text-center dashboard-icon-size" title="Accepted" aria-hidden="true"></i>
    @elseif($pirep->state === PirepState::REJECTED)
    <i class="fa-solid fa-circle text-danger text-center dashboard-icon-size" title="Accepted" aria-hidden="true"></i>
  </div>
  <div class="row dashboard-row-pirep dashboard-secondary-text">
    Submitted {{ $pirep->submitted_at->diffForHumans() }}
  </div>
</div>
