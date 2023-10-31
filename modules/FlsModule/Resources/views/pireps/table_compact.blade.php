<table class="table table-sm table-borderless table-striped text-center text-nowrap align-middle mb-0">
  <thead>
    <tr>
      <th class="text-start">@lang('FlsModule::common.flightno')</th>
      <th class="text-start">@lang('FlsModule::common.orig')</th>
      <th class="text-start">@lang('FlsModule::common.dest')</th>
      @if(!isset($ac_page))
      <th>@lang('FlsModule::common.aircraft')</th>
      @endif
      <th>@lang('FlsModule::common.btime')</th>
      <th>@lang('FlsModule::common.fuelused')</th>
      <th class="text-end">@lang('FlsModule::common.pilot')</th>
      <th class="text-end">@lang('FlsModule::common.submitted')</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pireps as $pirep)
    <tr @if ($pirep->state != 2) {!! Fls_PirepState($pirep, 'row') !!} @endif>
      <th class="text-start">
        @ability('admin', 'admin-access')
        <a href="{{ route('frontend.pireps.show', [$pirep->id]) }}"><i class="fas fa-info-circle me-1"></i></a>
        @endability
        {{ optional($pirep->airline)->code.' '.$pirep->flight_number }}
      </th>
      <td class="text-start">
        <a href="{{ route('frontend.airports.show', [$pirep->dpt_airport_id]) }}"
          title="{{ optional($pirep->dpt_airport)->name }}">
          @if(empty($compact_view))
          {{ optional($pirep->dpt_airport)->full_name ?? $pirep->dpt_airport_id }}</a>
        @else
        {{ $pirep->dpt_airport_id }}
        @endif
      </td>
      <td class="text-start">
        <a href="{{ route('frontend.airports.show', [$pirep->arr_airport_id]) }}"
          title="{{ optional($pirep->arr_airport)->name }}">
          @if(empty($compact_view))
          {{ optional($pirep->arr_airport)->full_name ?? $pirep->arr_airport_id }}</a>
        @else
        {{ $pirep->arr_airport_id }}
        @endif
      </td>
      @if(!isset($ac_page))
      <td>
        <a href="{{ route('FlsModule.aircraft', [$pirep->aircraft->registration ?? '']) }}">{{
          optional($pirep->aircraft)->ident }}</a>
      </td>
      @endif
      <td>{{ Fls_ConvertMinutes($pirep->flight_time) }}</td>
      <td>{{ Fls_ConvertWeight($pirep->fuel_used, $units['fuel']) }}</td>
      <td class="text-end">
        <a href="{{ route('frontend.users.show.public', [$pirep->user_id]) }}">
          @if(Theme::getSetting('roster_ident'))
          {{ optional($pirep->user)->ident.' - ' }}
          @endif
          {{ optional($pirep->user)->name_private }}
        </a>
      </td>
      <td class="text-end">
        {{ $pirep->submitted_at->diffForHumans().' | '.$pirep->submitted_at->format('d.M') }}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>