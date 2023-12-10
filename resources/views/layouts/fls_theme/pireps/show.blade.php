@extends('app')
@include('theme_helpers')
@php

@endphp
@section('title', trans_choice('common.pirep', 1).' '.$pirep->ident)

@section('content')
<div class="row pt-3">
  <div class="col-sm-8">
    <div class="card mb-2 dashboard-card">
      <div class="card-header p-1 dashboard-card-body">
        <h5 class="m-1">
          @if(filled($pirep->flight_id) && !str_contains($pirep->route_code, 'PF'))
          <a href="{{ route('frontend.flights.show', [$pirep->flight_id]) }}"><i class="fas fa-paper-plane mx-1"
              title="Flight Details"></i></a>
          @endif
          {{ optional($pirep->airline)->code.' '.$pirep->flight_number }}
          {{ ' | '.optional($pirep->dpt_airport)->location.' > '.optional($pirep->arr_airport)->location }}
        </h5>
      </div>
      <div class="card-body p-1">
        <div class="row row-cols-md-3">
          <div class="col-md-5 text-start">
            <i class="fas fa-plane-departure m-1 color-fls"></i>
            <a href="{{ route('frontend.airports.show', [$pirep->dpt_airport_id]) }}">
              {{ optional($pirep->dpt_airport)->full_name ?? $pirep->dpt_airport_id }}
            </a>
          </div>
          <div class="col-md-2 text-center">
            @if(!empty($pirep->distance))
            <div class="row">
              {{ Fls_ConvertDistance($pirep->distance) }}
            </div>
            @endif
          </div>
          <div class="col-md-5 text-end">
            <a href="{{ route('frontend.airports.show', [$pirep->arr_airport_id]) }}">
              {{ optional($pirep->arr_airport)->full_name ?? $pirep->arr_airport_id }}
            </a>
            <i class="fas fa-plane-arrival m-1 color-fls"></i>
          </div>
        </div>
        <div class="row row-cols-md-3">
          <div class="col-md text-start">
            @if(filled($pirep->block_off_time))
            <i class="fas fa-clock float-start m-1 color-fls" title="Off Block"></i>
            {{ $pirep->block_off_time->format('H:i | l d.M.Y') }}
            @endif
          </div>
          <div class="col-md text-center">
            @if(filled($pirep->flight_time))
            <i class="fas fa-stopwatch m-1 color-fls" title="Block Time"></i>
            {{ DT_ConvertMinutes($pirep->flight_time, '%2dh %2dm') }}
            @endif
          </div>
          <div class="col-md text-end">
            @if($pirep->block_on_time > $pirep->block_off_time)
            <i class="fas fa-clock float-end m-1 color-fls" title="On Block"></i>
            {{ $pirep->block_on_time->format('H:i | l d.M.Y') }}
            @endif
          </div>
        </div>
      </div>
      <div class="card-footer bg-transparent p-1">
        <div class="progress" style="height: 20px;">
          <div
            class="progress-bar progress-bar-fls @if(blank($pirep->block_on_time)) progress-bar-striped progress-bar-animated @endif"
            role="progressbar" style="width: {{ $pirep->progress_percent }}%;"
            aria-valuenow="{{ $pirep->progress_percent }}" aria-valuemin="0" aria-valuemax="100">
            {{ $pirep->progress_percent }}%
          </div>
        </div>
      </div>
      <div class="card-footer bg-transparent p-1">
        <div class="row row-cols-lg-2">
          <div class="col text-start">
            {!! Fls_NetworkPresence($pirep) !!}
          </div>
          <div class="col text-end">
            {!! DT_RouteCode($pirep->route_code, 'button') !!} {!! DT_RouteLeg($pirep->route_leg, 'button') !!}
            @if(!$pirep->read_only && !$pirep->source == 1 && $user && $pirep->user_id === $user->id)
            <form method="get" action="{{ route('frontend.pireps.edit', $pirep->id) }}">
              @csrf
              <button class="btn btn-sm btn-info m-0 mx-1 p-0 px-1">@lang('common.edit')</button>
            </form>
            <form method="post" action="{{ route('frontend.pireps.submit', $pirep->id) }}">
              @csrf
              <button class="btn btn-sm btn-success m-0 mx-1 p-0 px-1">@lang('common.submit')</button>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      @include('pireps.map')
    </div>
  </div>

  <div class="col-sm-4">
    {{--

  RIGHT SIDEBAR

  --}}
  <table class="table table-striped">
    <tr>
      <td width="30%">@lang('common.state')</td>
      <td>
        <div class="badge badge-info">
          {{ PirepState::label($pirep->state) }}
        </div>
      </td>
    </tr>

    @if ($pirep->state !== PirepState::DRAFT)
    <tr>
      <td width="30%">@lang('common.status')</td>
      <td>
        <div class="badge badge-info">
          {{ PirepStatus::label($pirep->status) }}
        </div>
      </td>
    </tr>
    @endif

    <tr>
      <td>@lang('pireps.source')</td>
      <td>{{ PirepSource::label($pirep->source) }}</td>
    </tr>

    <tr>
      <td>@lang('flights.flighttype')</td>
      <td>{{ \App\Models\Enums\FlightType::label($pirep->flight_type) }}</td>
    </tr>

    <tr>
      <td>@lang('pireps.filedroute')</td>
      <td>{{ $pirep->route }}</td>
    </tr>

    <tr>
      <td>{{ trans_choice('common.note', 2) }}</td>
      <td>{{ $pirep->notes }}</td>
    </tr>

    @if($pirep->score && $pirep->landing_rate)
    <tr>
      <td>Score</td>
      <td>{{ $pirep->score }}</td>
    </tr>
    <tr>
      <td>Landing Rate</td>
      <td>{{ number_format($pirep->landing_rate) }}</td>
    </tr>
    @endif

    <tr>
      <td>@lang('pireps.filedon')</td>
      <td>{{ show_datetime($pirep->created_at) }}</td>
    </tr>

  </table>

  @if(count($pirep->fields) > 0)
  <div class="separator"></div>
  @endif

  @if(count($pirep->fields) > 0)
  <h5>{{ trans_choice('common.field', 2) }}</h5>
  <table class="table table-hover table-condensed">
    <thead>
      <th>@lang('common.name')</th>
      <th>{{ trans_choice('common.value', 1) }}</th>
    </thead>
    <tbody>
      @foreach($pirep->fields as $field)
      <tr>
        <td>{{ $field->name }}</td>
        <td>{{ $field->value }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endif

  {{--
    Show the fares that have been entered
    --}}
  @if(count($pirep->fares) > 0)
  <div class="separator"></div>
  <div class="row">
    <div class="col-12">
      <h5>{{ trans_choice('pireps.fare', 2) }}</h5>
      <table class="table table-hover table-condensed">
        <thead>
          <th>@lang('pireps.class')</th>
          <th>@lang('pireps.count')</th>
        </thead>
        <tbody>
          @foreach($pirep->fares as $fare)
          <tr>
            <td>{{ $fare->name }} ({{ $fare->code }})</td>
            <td>{{ $fare->count }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>
</div>

@if(count($pirep->acars_logs) > 0)
<div class="separator"></div>
<div class="row">
  <div class="col-12">
    <h5>@lang('pireps.flightlog')</h5>
  </div>
  <div class="col-12">
    <table class="table table-hover table-condensed" id="users-table">
      <tbody>
        @foreach($pirep->acars_logs->sortBy('created_at') as $log)
        <tr>
          <td nowrap="true">{{ show_datetime($log->created_at) }}</td>
          <td>{{ $log->log }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif

@if(!empty($pirep->simbrief))
<div class="separator"></div>
<div class="row mt-5">
  <div class="col-12">
    <div class="form-container">
      <h6><i class="fas fa-info-circle"></i>
        &nbsp;OFP
      </h6>
      <div class="form-container-body border border-dark">
        <div class="overflow-auto" style="height: 600px;">
          {!! $pirep->simbrief->xml->text->plan_html !!}
        </div>
      </div>
    </div>
  </div>
</div>
    {{-- Show the link to edit if it can be edited --}}
    @if (!empty($pirep->simbrief))
    <a href="{{ url(route('frontend.simbrief.briefing', [$pirep->simbrief->id])) }}" class="btn btn-outline-info">View
      SimBrief</a>
    @endif

    @if(!$pirep->read_only && $user && $pirep->user_id === $user->id)
    <div class="float-right" style="margin-bottom: 10px;">
      <form method="get" action="{{ route('frontend.pireps.edit', $pirep->id) }}" style="display: inline">
        @csrf
        <button class="btn btn-outline-info">@lang('common.edit')</button>
      </form>
      &nbsp;
      <form method="post" action="{{ route('frontend.pireps.submit', $pirep->id) }}" style="display: inline">
        @csrf
        <button class="btn btn-outline-success">@lang('common.submit')</button>
      </form>
    </div>
    @endif
  </div>
 
</div>    


@endif
@endsection