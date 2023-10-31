<table class="table table-sm table-striped table-borderless text-center text-nowrap align-middle mb-0">
  <tr>
    <th class="text-start">@lang('FlsModule::common.name')</th>
    <th>@lang('FlsModule::common.airline')</th>
    <th>@lang('FlsModule::common.rank')</th>
    <th>@lang('FlsModule::common.base')</th>
    <th class="text-end">@lang('FlsModule::common.ftime')</th>
  </tr>
  @foreach($assets as $pilot)
  <tr @if($pilot->state === 3) class="table-danger" title="@lang('FlsModule::widgets.useronleave')" @endif>
    <td class="text-start">
      <a href="{{ route('frontend.profile.show', [$pilot->id]) }}">
        @if(Theme::getSetting('roster_ident'))
        {{ $pilot->ident.' - ' }}
        @endif
        {{ $pilot->name_private }}
      </a>
    </td>
    <td>
      <a href="{{ route('FlsModule.airline', [optional($pilot->airline)->icao ?? '']) }}">{{
        optional($pilot->airline)->name }}</a>
    </td>
    <td>
      {{ optional($pilot->rank)->name }}
    </td>
    <td>
      <a href="{{ route('FlsModule.hub', [$pilot->home_airport_id]) }}"
        title="{{ optional($pilot->home_airport)->name }}">{{ $pilot->home_airport_id }}</a>
    </td>
    <td class="text-end">
      @if($total_time)
      {{ Fls_ConvertMinutes($pilot->flight_time + $pilot->transfer_time, '%2dh %2dm') }}
      @else
      {{ Fls_ConvertMinutes($pilot->flight_time, '%02dh %02dm') }}
      @endif
    </td>
  </tr>
  @endforeach
</table>