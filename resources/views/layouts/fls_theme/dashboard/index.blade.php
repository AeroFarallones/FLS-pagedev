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
                        <h5 class="description color-white font-montbold dashboard-text-margin">
                            @lang('dashboard.totalhours')</h5>
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
                        <h5 class="description color-white font-montbold dashboard-text-margin">
                            @lang('dashboard.avglanding')</h5>
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
                        <h5 class="description color-white font-montbold dashboard-text-margin">
                            @lang('dashboard.avgscore')</h5>
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
                        <h5 class="description color-white font-montbold dashboard-text-margin">
                            @lang('dashboard.avgflighttime')
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
                        <h5 class="description color-white font-montbold dashboard-text-margin">
                            @lang('dashboard.avgburntfuel')</h5>
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
                        <h5 class="description color-white font-montbold dashboard-text-margin">
                            @lang('airports.current')</h5>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card card-primary text-white dashboard-card h-100">
                    <div class="card-body text-center dashboard-card-body">
                        <div class="icon-background"> {{--110px font-size--}}
                            <i class="fa-solid fa-money-bill dashboard-icon-margin"></i>
                        </div>
                        <h3 class="header font-montbold dashboard-text-margin">
                            {{ optional($user->journal)->balance ?? 0 }}</h3>
                        <h5 class="description color-white font-montbold dashboard-text-margin">
                            @lang('dashboard.yourbalance')</h5>
                    </div>
                </div>
            </div>

        </div>
        <div class="row gy-3 row-dashboard">
            <div class="col-sm-4">
                @if($last_pirep === null)
                <div class="dashboard-card dashboard-card-body h-100 font-montbold text-center">
                    @lang('dashboard.noreportsyet') <a
                        href="{{ route('frontend.pireps.create') }}">@lang('dashboard.fileonenow')</a>
                </div>
                @else
                @include('dashboard.pirep_card', ['pirep' => $last_pirep])
                @endif
            </div>
            <div class="col-sm-8">
                {{ Widget::latestNews(['count' => 1]) }}
            </div>

        </div>
    </div>

    {{-- Sidebar --}}
    <div class="col-sm-4">
        <div class="card-header dashboard-card ps-2 p-1 mb-3" style="background: #00157f">
            <a href="https://metar-taf.com/" id="metartaf-crDVdyuy" class="font-montbold"
                style="font-size: 0.925rem; display:block; pointer-events: none">METAR {{
        $current_airport }}</a>
        </div>
        <script async defer crossorigin="anonymous"
            src="https://metar-taf.com/embed-js/SKRG?bg_color=00157f&layout=landscape&qnh=hPa&rh=rh&target=crDVdyuy">
        </script>

        <div class="row">
            @widget('FlsModule::AirportInfo', ['type' => 'all'])
        </div>
        <div class="row">
            @widget('FlsModule::TransferAircraft', ['price' => 'free', 'landing' => 1])
        </div>
        <div class="col">
            @widget('FlsModule::JumpSeat', ['base' => 0.25, 'price' => 'free', 'hubs' => true])
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