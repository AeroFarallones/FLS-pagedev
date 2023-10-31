<table class="table table-sm table-borderless table-striped align-middle text-center text-nowrap mb-0">
  <tr>
    <th class="text-start">@sortablelink('registration', __('FlsModule::common.reg'))</th>
    <th class="text-start">@sortablelink('name', __('FlsModule::common.name'))</th>
    @empty($hub_ac)
    <th>@lang('FlsModule::common.base')</th>
    @endempty
    @empty($visitor_ac)
    <th>@sortablelink('airport_id', __('FlsModule::common.location'))</th>
    @endempty
    <th>@sortablelink('fuel_onboard', __('FlsModule::common.fuelob'))</th>
    <th>@sortablelink('flight_time', __('FlsModule::common.btime'))</th>
    <th>@lang('FlsModule::common.lastlnd')</th>
    <th>@sortablelink('state', __('FlsModule::common.state'))</th>
    <th>@sortablelink('status', __('FlsModule::common.status'))</th>
  </tr>
  @foreach($aircraft as $ac)
  <tr @if($ac->simbriefs_count > 0) class="table-primary" @endif>
    <td class="text-start">
      <a href="{{ route('FlsModule.aircraft', [$ac->registration]) }}">{{ $ac->registration }}</a>
    </td>
    <td class="text-start">
      @if($ac->registration != $ac->name)
      {{ $ac->name }}
      @endif
    </td>
    @empty($hub_ac)
    <td>
      @if(filled($ac->hub_id))
      <a href="{{ route('FlsModule.hub', [$ac->hub_id ?? '']) }}">
        {{ $ac->hub_id ?? '' }}
      </a>
      @else
      <a href="{{ route('FlsModule.hub', [$ac->subfleet->hub_id ?? '']) }}">
        {{ $ac->subfleet->hub_id ?? ''}}
      </a>
      @endif
    </td>
    @endempty
    @empty($visitor_ac)
    <td>
      <a href="{{ route('frontend.airports.show', [$ac->airport_id ?? '']) }}">
        {{ $ac->airport_id ?? '' }}
      </a>
    </td>
    @endempty
    <td>
      {{ Fls_ConvertWeight($ac->fuel_onboard, $units['fuel']) }}
    </td>
    <td>{{ Fls_ConvertMinutes($ac->flight_time, '%2dh %2dm') }}</td>
    <td>{{ optional($ac->landing_time)->diffForHumans() }}</td>
    <td>{!! Fls_AircraftState($ac) !!}</td>
    <td>{!! Fls_AircraftStatus($ac) !!}</td>
  </tr>
  @endforeach
</table>