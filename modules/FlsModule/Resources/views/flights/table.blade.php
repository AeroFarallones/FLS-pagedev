<table class="table table-sm table-borderless table-striped text-start text-nowrap align-middle mb-0">
  <tr>
    <th>@lang('FlsModule::common.airline')</th>
    <th>@lang('FlsModule::common.flightno')</th>
    @if(isset($type) && $type != 'dpt')
    <th>@lang('FlsModule::common.orig')</th>
    @endif
    <th class="text-center">@lang('FlsModule::common.std')</th>
    <th class="text-center">@lang('FlsModule::common.sta')</th>
    @if(isset($type) && $type != 'arr')
    <th>@lang('FlsModule::common.dest')</th>
    @endif
  </tr>
  @foreach($flights as $flight)
  <tr>
    <td>
      <a href="{{ route('FlsModule.airline', [optional($flight->airline)->icao ?? '']) }}">
        {{ optional($flight->airline)->name }}
      </a>
    </td>
    <td>
      <a href="{{ route('frontend.flights.show', [$flight->id]) }}">
        {{ optional($flight->airline)->code.' '.$flight->flight_number }}
      </a>
    </td>
    @if(isset($type) && $type != 'dpt')
    <td>
      <a href="{{ route('frontend.airports.show', [$flight->dpt_airport_id]) }}">
        {{ optional($flight->dpt_airport)->full_name ?? $flight->dpt_airport_id }}
      </a>
    </td>
    @endif
    <td class="text-center">{{ Fls_FormatScheduleTime($flight->dpt_time) }}</td>
    <td class="text-center">{{ Fls_FormatScheduleTime($flight->arr_time) }}</td>
    @if(isset($type) && $type != 'arr')
    <td>
      <a href="{{ route('frontend.airports.show', [$flight->arr_airport_id]) }}">
        {{ optional($flight->arr_airport)->full_name ?? $flight->arr_airport_id }}
      </a>
    </td>
    @endif
  </tr>
  @endforeach
</table>