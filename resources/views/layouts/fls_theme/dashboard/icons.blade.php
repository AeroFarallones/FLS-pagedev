{{-- ROW WITH ICONS --}}
<div class="container text-center" style="padding-left: 0rem; padding-right: 0rem;">
  <div class="row">
    <div class="col-md-3 col-lg-3">
      <div class="card bg-transparent shadow-none text-dark mb-2">
        <div class="card-body" style="background-color: #00157f">
          <div class="row">
            <i class="fas fa-paper-plane fa-3x pt-1 float-end text-white"></i>
          </div>
          <div class="row">
            <h5 class="card-title m-0 text-center text-white">{{ $user->flights }}</h5>
            <h6 class="card-title m-0 text-center text-white">@lang('flights.addremovebid')</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-lg-3">
      <div class="card bg-transparent shadow-none text-dark mb-2">
        <div class="card-body" style="background-color: #00157f">
          <div class="row">
            <i class="fas fa-clock fa-3x pt-1 float-end text-white"></i>
          </div>
          <div class="row">
            <h5 class="card-title m-0 p-0 text-center text-white">@minutestotime($user->flight_time)</h5>
            <h6 class="card-title m-0 p-0 text-center text-white">@lang('dashboard.totalhours')</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-lg-3">
      <div class="card bg-transparent shadow-none text-dark mb-2">
        <div class="card-body" style="background-color: #00157f">
          <div class="row">
            <i class="fas fa-plane-arrival fa-3x pt-1 float-end text-white"></i>
          </div>
          <div class="row">
            <h5 class="card-title m-0 p-0 text-center text-white">@widget('FlsModule::PersonalStats', ['user' =>
              $user->id,
              'type' => 'avglanding'])</h5>
            <h6 class="card-title m-0 p-0 text-center text-white">{{__("Average Landing Rate")}}</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-lg-3">
      <div class="card bg-transparent shadow-none text-dark mb-2">
        <div class="card-body" style="background-color: #00157f">
          <div class="row">
            <i class="fas fa-pen-alt fa-3x pt-1 float-end text-white"></i>
          </div>
          <div class="row">
            <h5 class="card-title m-0 p-0 text-center text-white">@widget('FlsModule::PersonalStats', ['user' =>
              $user->id,
              'type' => 'avgscore'])</h5>
            <h6 class="card-title m-0 p-0 text-center text-white">{{__('Average Score')}}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3 col-lg-3">
      <div class="card bg-transparent shadow-none text-dark mb-2">
        <div class="card-body" style="background-color: #00157f">
          <div class="row">
            <i class="fas fa-stopwatch fa-3x pt-1 float-end text-white"></i>
          </div>
          <div class="row">
            <h5 class="card-title m-0 p-0 text-center text-white">@widget('FlsModule::PersonalStats', ['user' =>
              $user->id,
              'type' => 'avgtime'])</h5>
            <h6 class="card-title m-0 p-0 text-center text-white">{{__("Average Flight Time")}}</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-lg-3">
      <div class="card bg-transparent shadow-none text-dark mb-2">
        <div class="card-body" style="background-color: #00157f">
          <div class="row">
            <i class="fas fa-gas-pump fa-3x pt-1 float-end text-white"></i>
          </div>
          <div class="row">
            <h5 class="card-title m-0 p-0 text-center text-white">@widget('FlsModule::PersonalStats', ['user' =>
              $user->id,
              'type' => 'avgfuel'])</h5>
            <h6 class="card-title m-0 p-0 text-center text-white">{{__('Average Burnt Fuel')}}</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-lg-3">
      <div class="card bg-transparent shadow-none text-dark mb-2">
        <div class="card-body" style="background-color: #00157f">
          <div class="row">
            <i class="fas fa-map-marker fa-3x pt-1 float-end text-white"></i>
          </div>
          <div class="row">
            <h5 class="card-title m-0 p-0 text-center text-white">{{ $current_airport ?? '--' }}</h5>
            <h6 class="card-title m-0 p-0 text-center text-white">@lang('dashboard.currentairport')</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-lg-3">
      <div class="card bg-transparent shadow-none text-dark mb-2">
        <div class="card-body" style="background-color: #00157f">
          <div class="row">
            <i class="fas fa-coins fa-3x pt-1 float-end text-white"></i>
          </div>
          <div class="row">
            <h5 class="card-title m-0 p-0 text-center text-white">{{ optional($user->journal)->balance }}</h5>
            <h6 class="card-title m-0 p-0 text-center text-white">@lang('dashboard.yourbalance')</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
