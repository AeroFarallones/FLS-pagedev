@extends('app')
@section('title', __('common.dashboard'))

@section('content')
<div class="row">
  <div class="col-sm-8">

    @if(Auth::user()->state === \App\Models\Enums\UserState::ON_LEAVE)
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-warning" role="alert">
          You are on leave! File a PIREP to set your status to active!
        </div>
      </div>
    </div>
    @endif

    {{-- TOP BAR WITH BOXES --}}
    <div class="row row-dashboard gy-3">

      <div class="col-sm-3">
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center dashboard-card-body">
            <div class="icon-background">
              <i class="fa-solid fa-earth-americas dashboard-icon-margin"></i>
            </div>
            <h3 class="header font-montbold dashboard-text-margin">{{ $user->flights }}</h3>
            <h5 class="description color-white font-montbold dashboard-text-margin">
              {{ trans_choice('common.flight', $user->flights) }}</h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center dashboard-card-body">
            <div class="icon-background">
              <i class="fa-solid fa-hourglass-start dashboard-icon-margin"></i>
            </div>
            <h3 class="header font-montbold dashboard-text-margin">@minutestotime($user->flight_time)</h3>
            <h5 class="description color-white font-montbold dashboard-text-margin">@lang('dashboard.totalhours')</h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center dashboard-card-body">
            <div class="icon-background">
              <i class="fa-solid fa-plane-arrival dashboard-icon-margin"></i>
            </div>
            <h3 class="header font-montbold dashboard-text-margin">@widget('FlsModule::PersonalStats',
              ['user' =>
              $user->id,
              'type' => 'avglanding'])</h3>
            <h5 class="description color-white font-montbold dashboard-text-margin">@lang('dashboard.avglanding')</h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center dashboard-card-body">
            <div class="icon-background">
              <i class="fa-solid fa-clipboard-list dashboard-icon-margin"></i>
            </div>
            <h3 class="header font-montbold dashboard-text-margin">@widget('FlsModule::PersonalStats',
              ['user' =>
              $user->id,
              'type' => 'avgscore'])</h3>
            <h5 class="description color-white font-montbold dashboard-text-margin">@lang('dashboard.avgscore')</h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center dashboard-card-body">
            <div class="icon-background">
              <i class="fa-solid fa-clock dashboard-icon-margin"></i>
            </div>
            <h3 class="header font-montbold dashboard-text-margin">@widget('FlsModule::PersonalStats',
              ['user' =>
              $user->id,
              'type' => 'avgtime'])</h3>
            <h5 class="description color-white font-montbold dashboard-text-margin">@lang('dashboard.avgflighttime')
            </h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center dashboard-card-body">
            <div class="icon-background">
              <i class="fa-solid fa-gas-pump dashboard-icon-margin"></i>
            </div>
            <h3 class="header font-montbold dashboard-text-margin">@widget('FlsModule::PersonalStats',
              ['user' =>
              $user->id,
              'type' => 'avgfuel'])</h3>
            <h5 class="description color-white font-montbold dashboard-text-margin">@lang('dashboard.avgburntfuel')</h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center dashboard-card-body">
            <div class="icon-background">
              <i class="fa-solid fa-location-pin dashboard-icon-margin"></i>
            </div>
            <h3 class="header font-montbold dashboard-text-margin">{{ $current_airport }}</h3>
            <h5 class="description color-white font-montbold dashboard-text-margin">@lang('airports.current')</h5>
          </div>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center dashboard-card-body">
            <div class="icon-background"> {{--110px font-size--}}
              <i class="fa-solid fa-money-bill dashboard-icon-margin"></i>
            </div>
            <h3 class="header font-montbold dashboard-text-margin">{{ optional($user->journal)->balance ?? 0 }}</h3>
            <h5 class="description color-white font-montbold dashboard-text-margin">@lang('dashboard.yourbalance')</h5>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="card dashboard-pirep-card dashboard-card pt-4">
          <div class="row dashboard-row-pirep">
            <img class="dashboard-img-pirep-logo" src="/assets/frontend/img/MNT FLS W.png" alt="AeroFarallones logo">
          </div>
          <div class="row dashboard-row-pirep">
            <div class="col-sm-5 dashboard-primary-text">
              SUMU
            </div>
            <div class="col-sm-2 dashboard-primary-text">
              <i class="fa-solid fa-plane"></i>
            </div>
            <div class="col-sm-5 dashboard-primary-text">
              SKBO
            </div>
          </div>
          <div class="row dashboard-row-pirep dashboard-primary-text">
            FLS001
          </div>
          <div class="row dashboard-row-pirep dashboard-secondary-text">
            <div class="col-sm-6">
              N563FE (A319)
            </div>
            <div class="col-sm-6">
              -700.05 ft/min
            </div>
          </div>
          <div class="row dashboard-row-pirep">
            <i class="fa-solid fa-circle text-success text-center dashboard-icon-size" title="Accepted"
              aria-hidden="true"></i>
          </div>
          <div class="row dashboard-row-pirep dashboard-secondary-text">
            Submitted 2 days ago
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        {{ Widget::latestNews(['count' => 1]) }}
      </div>

    </div>

    <div class="nav nav-tabs" role="tablist" style="background: #067ec1; color: #FFF;">
      @lang('dashboard.yourlastreport')
    </div>
    <div class="card border-blue-bottom">
      @if($last_pirep === null)
      <div class="card-body" style="text-align:center;">
        @lang('dashboard.noreportsyet') <a
          href="{{ route('frontend.pireps.create') }}">@lang('dashboard.fileonenow')</a>
      </div>
      @else
      @include('dashboard.pirep_card', ['pirep' => $last_pirep])
      @endif
    </div>

  </div>

  {{-- Sidebar --}}
  <div class="col-sm-4">
    <div class="card">
      <div class="nav nav-tabs" role="tablist" style="background: #067ec1; color: #FFF;">
        @lang('dashboard.weatherat', ['ICAO' => $current_airport])
      </div>
      <div class="card-body">
        <!-- Tab panes -->
        <div class="tab-content">
          {{ Widget::Weather(['icao' => $current_airport]) }}
        </div>
      </div>
    </div>

    <div class="card">
      <div class="nav nav-tabs" role="tablist" style="background: #067ec1; color: #FFF;">
        @lang('dashboard.recentreports')
      </div>
      <div class="card-body">
        <!-- Tab panes -->
        <div class="tab-content">
          {{ Widget::latestPireps(['count' => 5]) }}
        </div>
      </div>
    </div>

    <div class="card">
      <div class="nav nav-tabs" role="tablist" style="background: #067ec1; color: #FFF;">
        @lang('common.newestpilots')
      </div>
      <div class="card-body">
        <!-- Tab panes -->
        <div class="tab-content">
          {{ Widget::latestPilots(['count' => 5]) }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection