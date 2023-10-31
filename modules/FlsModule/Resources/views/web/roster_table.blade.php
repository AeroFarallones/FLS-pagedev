<table class="table table-sm table-borderless table-striped text-start mb-0 align-middle">
  <tr>
    <th>@lang('common.name')</th>
    <th>@lang('FlsModule::common.rank')</th>
    @if(empty($airline_view))
    <th>@lang('FlsModule::common.airline')</th>
    @endif
    @if(!isset($type) || isset($type) && $type != 'hub')
    <th>@lang('FlsModule::common.base')</th>
    @endif
    @if(!isset($type) || isset($type) && $type != 'visitor')
    <th>@lang('FlsModule::common.location')</th>
    @endif
    @if(!isset($type))
    <th class="text-center">@lang('FlsModule::common.awards')</th>
    @endif
    <th class="text-center">@lang('FlsModule::common.flights')</th>
    <th class="text-center">@lang('FlsModule::common.ftime')</th>
    @if(!isset($type))
    <th class="text-end">@lang('FlsModule::common.last_flt')</td>
      @endif
  </tr>
  @foreach($users as $user)
  <tr @if($user->state != 1) {!! Fls_UserState($user, 'row') !!} @endif>
    <td>
      <a href="{{ route('frontend.users.show.public', [$user->id]) }}">{{ $user->name_private }}</a>
    </td>
    <td>
      {{ optional($user->rank)->name }}
    </td>
    @if(empty($airline_view))
    <td>
      <a href="{{ route('FlsModule.airline', [$user->airline->icao ?? '']) }}">{{ optional($user->airline)->name }}</a>
    </td>
    @endif
    @if(!isset($type) || isset($type) && $type != 'hub')
    <td>
      <a href="{{ route('FlsModule.hub', [$user->home_airport_id ?? '']) }}">{{ $user->home_airport->full_name ??
        $user->home_airport_id }}</a>
    </td>
    @endif
    @if(!isset($type) || isset($type) && $type != 'visitor')
    <td>
      <a href="{{ route('frontend.airports.show', [$user->curr_airport_id ?? '']) }}">{{
        $user->current_airport->full_name ?? $user->curr_airport_id }}</a>
    </td>
    @endif
    @if(!isset($type))
    <td class="text-center">
      @if($user->awards_count > 0)
      <i class="fas fa-trophy text-success" title="{{ $user->awards_count }}"></i>
      @endif
    </td>
    @endif
    <td class="text-center">
      @if($user->flights > 0) {{ number_format($user->flights) }} @endif
    </td>
    <td class="text-center">
      {{ Fls_ConvertMinutes($user->flight_time, '%2dh %2dm') }}
    </td>
    @if(!isset($type))
    <td class="text-end">
      @if($user->last_pirep)
      {{ $user->last_pirep->submitted_at->diffForHumans() }}
      @endif
    </td>
    @endif
  </tr>
  @endforeach
</table>