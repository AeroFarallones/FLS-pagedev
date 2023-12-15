<link href="{{ public_asset('/assets/frontend/css/styles.css') }}" rel="stylesheet" />
@extends('app')
@section('title', __('common.profile'))
@include('theme_helpers')
@php
$units = isset($units) ? $units : DT_GetUnits();
$Auth_ID = Auth::id();
$ivao_id = optional($user->fields->firstWhere('name', Theme::getSetting('gen_ivao_field')))->value;
$vatsim_id = optional($user->fields->firstWhere('name', Theme::getSetting('gen_vatsim_field')))->value;
$AdminCheck = false;
@endphp
@ability('admin', 'admin-access')
@php $AdminCheck = true; @endphp
@endability
@section('content')
<div class="row pt-3">
  <div class="col-md-3">
    {{-- Pilot ID Card --}}
    <div class="card mb-2">
      <div class="card-header p-1 dashboard-card-body">
        <h5 class="m-1">
          @if(Theme::getSetting('roster_ident')) {{ $user->ident.' | ' }} @endif
          {{ $user->name_private }}
          <span class="flag-icon flag-icon-{{ $user->country }} float-end mt-1"></span>
        </h5>
      </div>
      <div class="card-body p-0">
        <div class="card border-0 shadow-none bg-transparent mb-0">
          <div class="row g-0 mb-0 @if($user->state != 1) {!! DT_UserState($user, 'bg_add') !!} @endif"
            style="text-align-last: center;">
            <div class="col-md-4" style="align-self: center;">
              @if($user->avatar == null)
              <img class="img-mh125 border profile-border-radius" src="{{ $user->gravatar(512) }}">
              @else
              <img class="img-mh125 border profile-border-radius" src="{{ $user->avatar->url }}">
              @endif
            </div>
            <div class="col-md-8">
              <div class="card-body p-0 table-responsive">
                <table class="table table-sm table-borderless mb-0 align-middle">
                  <tr>
                    <th class="font-montbold color-blue-fls" colspan="2">
                      {{ optional($user->airline)->name.' / '.optional($user->rank)->name }}</th>
                  </tr>
                  <tr>
                    <td class="px-3">
                      <a href='https://www.ivao.aero/Member.aspx?ID={{ $user->VID }}' target='_blank'>{{ $ivao_id }}
                        <img src="https://status.ivao.aero/{{ $user->VID }}.png">
                      </a>
                    </td>
                  </tr>
                  @if($user->id === $Auth_ID)
                  <tr>
                    <td colspan="2" class="px-3 text-left">
                      <span id="email_show" style="display: none">
                        <i class="fas fa-eye-slash mx-1 color-blue-fls" onclick="emailHide()"></i>
                        {{ $user->email }}
                      </span>
                      <span id="email_hide">
                        <i class="fas fa-eye mx-1 color-blue-fls" onclick="emailShow()"></i>
                        E-mail
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" title="@lang('profile.dontshare')">
                      <span id="apiKey_show" style="display: none">
                        <i class="fas fa-eye-slash mx-1 color-blue-fls" onclick="apiKeyHide()"></i>
                        {{ $user->api_key }}
                      </span>
                      <span id="apiKey_hide">
                        <i class="fas fa-eye mx-1 color-blue-fls" onclick="apiKeyShow()"></i>
                        @lang('profile.apikey')
                      </span>
                    </td>
                  </tr>
                  @endif
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer p-1 small fw-bold card-footer-fls">
        <span class="float-start">

          <a href="{{ route('FlsModule.hub', [$user->home_airport_id ?? '']) }}">

            {{ optional($user->home_airport)->full_name ?? $user->home_airport_id }}
          </a>
        </span>
        <span class="float-end">
          @if(filled($user->discord_id))
          <i class="fab fa-discord mx-1 color-blue-fls" @ability('admin', 'admin-access' )
            title="{{ $user->discord_id }}" @endability></i>
          @endif
          @if($user->opt_in)
          <i class="fas fa-envelope mx-1 color-blue-fls" title="Receives emails"></i>
          @endif
          @if(filled($user->timezone))
          <i class="fas fa-user-clock mx-1 color-blue-fls" title="@lang('common.timezone'): {{ $user->timezone }}"></i>
          @endif
          <i class="fas fa-calendar-plus mx-1 color-blue-fls"
            title="Member since {{ $user->created_at->format('l d.M.Y') }}"></i>
        </span>
      </div>
      {{-- Action Buttons --}}
      @if($user->id === $Auth_ID)
      <div class="card-footer p-1 card-footer-fls">
        @if(isset($acars) && $acars === true)
        <a href="{{ route('frontend.profile.acars') }}" class="btn button-blue-fls m-0 mx-1 p-0 px-2"
          onclick="alert('Copy or Save to \'My Documents/phpVMS\'')">
          <i class="fas fa-file-download text-white" title="Download vmsAcars Config"></i>
        </a>
        @endif
        <a href="{{ route('frontend.profile.regen_apikey') }}" class="btn button-blue-fls m-0 mx-1 p-0 px-2"
          onclick="return confirm('Are you sure? This will reset your API key!')">
          <i class="fas fa-key text-white" title="@lang('profile.newapikey')"></i>
        </a>
        <a href="{{ route('frontend.profile.edit', [$user->id]) }}"
          class="btn button-blue-fls m-0 mx-1 p-0 px-2">
          <i class="fas fa-edit text-white" title="@lang('common.edit')"></i>
        </a>
        @if($user->flights > 0 && $user->id === Auth::id())
        <span class="float-end mb-0">
          @widget('FlsModule::Map', ['source' => 'user'])
        </span>
        @endif
      </div>
      @endif
    </div>
    {{-- Inline Navigation --}}
    <ul class="nav nav-pills nav-fill mb-2" id="details-tab" role="tablist">
      @if($Auth_ID)
      <li class="nav-item mx-1" role="presentation">
        <button class="p-0 px-1 font-montbold button-blue-fls" id="profile-tab" data-bs-toggle="pill"
          data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">
          Profile Details</button>
      </li>
      @endif
      @if($user->typeratings->count() > 0)
      <li class="nav-item mx-1" role="presentation">
        <button class="p-0 px-1 font-montbold button-blue-fls" id="typeratings-tab" data-bs-toggle="pill"
          data-bs-target="#typeratings" type="button" role="tab" aria-controls="typeratingss" aria-selected="false">
          Type Ratings
        </button>
      </li>
      @endif
      @if(filled($user->awards))
      <li class="nav-item mx-1" role="presentation">
        <button class="p-0 px-1 font-montbold button-blue-fls" id="awards-tab" data-bs-toggle="pill"
          data-bs-target="#awards" type="button" role="tab" aria-controls="awards" aria-selected="false">
          Awards
        </button>
      </li>
      @endif
      @if($user->flights > 0)
      <li class="nav-item mx-1" role="presentation">
        <button class="p-0 px-1 active font-montbold button-blue-fls" id="stats-tab" data-bs-toggle="pill"
          data-bs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true">
          Statistics
        </button>
      </li>
      @endif
    </ul>
  </div>
  {{-- Info Boxes --}}
  <div class="col-md-9">
    <div class="row justify-content-center">
      <div class="col-md-2">
        {{-- Current Airport --}}
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center profile-card-body">
            <h3>
              @if(filled($user->curr_airport_id) || filled($user->home_airport_id))
              <a class="font-montbold a-fls text-white"
                href="{{-- route('frontend.airports.show', [$user->curr_airport_id ?? $user->home_airport_id]) --}}"
                title="{{ optional($user->current_airport)->name ?? optional($user->home_airport)->name }}">
                {{ $user->curr_airport_id ?? $user->home_airport_id }}
              </a>
              @else
              ---
              @endif
            </h3>
            <h6 class="header font-montbold dashboard-text-margin pb-3">Current Location</h6>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        {{-- Last Pirep --}}
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center profile-card-body">
            <h3 class="text-white font-montbold">
              @if($user->last_pirep)
              {{ $user->last_pirep->submitted_at->diffForHumans() }}
              @else
              ---
              @endif
            </h3>
            <h6 class="header font-montbold dashboard-text-margin pb-3">Last Flight</h6>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        {{-- Flights --}}
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center profile-card-body">
            <h3 class="text-white font-montbold">
              {{ $user->flights }}
            </h3>
            <h6 class="header font-montbold dashboard-text-margin pb-3">Flights</h6>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        {{-- Flight Time --}}
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center profile-card-body">
            <h3 class="text-white font-montbold">
              @minutestotime($user->flight_time)
            </h3>
            <h6 class="header font-montbold dashboard-text-margin pb-3">Flight Time</h6>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        {{-- Transfer Time --}}
        @if(setting('pilots.allow_transfer_hours') === true || filled($user->transfer_time))
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center profile-card-body">
            <h3 class="text-white font-montbold">
              @minutestohours($user->transfer_time)h
            </h3>
            <h6 class="header font-montbold dashboard-text-margin pb-3">Transfer Time</h6>
          </div>
        </div>
        @endif
      </div>
    </div>

    @if($user->flights > 0)
    <div class="row justify-content-center pt-3">
      <div class="col-md-2">
        @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgscore'])
      </div>
      <div class="col-md-2">
        {{-- User Balance and Last Transactions Display --}}
        @if($Auth_ID || $AdminCheck)
        <div class="card card-primary text-white dashboard-card h-100">
          <div class="card-body text-center profile-card-body">
            <h3 class="text-white font-montbold">
              <a class="font-montbold text-white" href="#" data-bs-toggle="modal"
                data-bs-target="#JournalModal">{{ $user->journal->balance }}</a>
            </h3>
            <h6 class="header font-montbold dashboard-text-margin pb-3">Current Balance</h6>
          </div>
        </div>
        {{-- Transaction Modal --}}
        <div class="modal fade" id="JournalModal" tabindex="-1" aria-labelledby="JournalModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-radius-1rem">
              <div class="modal-header p-1 px-3 profile-card-modal text-white">
                <h5 class="modal-title" id="JournalModalLabel">Journal Transactions & Summary
                </h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body p-0">
                <table class="table table-sm table-borderless mb-0 text-center">
                  <tr>
                    <th class="text-start font-montbold color-blue-fls">Description / Memo</th>
                    <th class="font-montbold color-blue-fls">Credit</th>
                    <th class="font-montbold color-blue-fls">Debit</th>
                    <th class="text-end font-montbold color-blue-fls">Date</th>
                  </tr>
                  @if($user->journal->transactions->count() > 0)
                  @foreach($user->journal->transactions->sortbyDesc('created_at')->take(15) as $record)
                  <tr>
                    <td class="text-start">{{ $record->memo }}</td>
                    <td>
                      @if(filled($record->credit))
                      {{ money($record->credit, $units['currency']) }}
                      @endif
                    </td>
                    <td>
                      @if(filled($record->debit))
                      {{ money($record->debit, $units['currency']) }}
                      @endif
                    </td>
                    <td class="text-end">{{ $record->created_at->format('d.m.Y H:i') }}</td>
                  </tr>
                  @endforeach
                  <tr>
                    <td colspan="4" class="text-end small">Only last 15 entries are displayed</td>
                  </tr>
                  @else
                  <tr>
                    <td colspan="4">No Records Found</td>
                  </tr>
                  @endif
                </table>
                <table class="table table-sm table-borderless mb-0 text-center">
                  <tr>
                    <th class="font-montbold color-blue-fls">Total Credit</th>
                    <th class="font-montbold color-blue-fls">Total Debit</th>
                    <th class="font-montbold color-blue-fls">Current Balance</th>
                  </tr>
                  <tr>
                    <td>{{ money($user->journal->transactions->sum('credit'), setting('units.currency')) }}</td>
                    <td>{{ money($user->journal->transactions->sum('debit'), setting('units.currency')) }}</td>
                    <td>{{ $user->journal->balance }}</td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer p-1 card-footer-fls">
                <button type="button" class="btn button-blue-fls m-0 mx-1 p-0 px-1"
                  data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        @endif
        {{-- End User Balance Section --}}
      </div>
      <div class="col-md-2">
        @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avglanding'])
        @if(Theme::getSetting('gen_stable_approach'))
        @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'fdm'])
        @endif
      </div>
      <div class="col-md-2">
        @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgtime'])
      </div>
      <div class="col-md-2">
        @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgdistance'])
      </div>
    </div>
    <div class="row pt-3 justify-content-center">
      <div class="col-md-2">
        @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totdistance'])
      </div>
      <div class="col-md-2">
        @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgfuel'])
      </div>
      <div class="col-md-2">
        @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totfuel'])
      </div>
    </div>
    @endif
  </div>
</div>
<div class="row pt-3">
  <div class="col-md-2 clearfix">
  </div>
  <div class="col-md-10 px-3">
    <div class="tab-content mt-2" id="details-tabContent">
      @if($Auth_ID)
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('profile.user_fields')
      </div>
      @endif
      @if($user->typeratings->count() > 0)
      <div class="tab-pane fade" id="typeratings" role="tabpanel" aria-labelledby="typeratings-tab">
        @include('profile.user_typeratings')
      </div>
      @endif
      @if(filled($user->awards))
      <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="awards-tab">
        @include('profile.user_awards')
      </div>
      @endif
      @if($user->flights > 0)
      <div class="tab-pane fade show active" id="stats" role="tabpanel" aria-labelledby="stats-tab">
        @include('profile.user_stats')
      </div>
      @endif
    </div>
  </div>
</div>
@endsection

@section('scripts')
@parent
<script>
  function apiKeyShow() {
    document.getElementById("apiKey_show").style = "display:block";
    document.getElementById("apiKey_hide").style = "display:none";
  }

  function apiKeyHide() {
    document.getElementById("apiKey_show").style = "display:none";
    document.getElementById("apiKey_hide").style = "display:block";
  }

  function emailShow() {
    document.getElementById("email_show").style = "display:block";
    document.getElementById("email_hide").style = "display:none";
  }

  function emailHide() {
    document.getElementById("email_show").style = "display:none";
    document.getElementById("email_hide").style = "display:block";
  }
</script>
@endsection