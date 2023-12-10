

<div class="card mb-2">
  <div class="card-header p-1">
    {{-- Inner Navigation --}}
    <h5 class="m-1">
      <i class="fas fa-cogs float-end"></i>
      <ul class="nav nav-tabs m-0 p-0 border-0" id="PirepTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active border-0 m-0 mx-1 p-0 px-1" id="map-tab" data-bs-toggle="tab"
            data-bs-target="#map" type="button" role="tab" aria-controls="map" aria-selected="true">
            Route Map
          </button>
        </li>
        @if($AuthCheck && $pirep->fields && $pirep->fields->count() > 0)
        <li class="nav-item" role="presentation">
          <button class="nav-link border-0 m-0 mx-1 p-0 px-1" id="fields-tab" data-bs-toggle="tab"
            data-bs-target="#fields" type="button" role="tab" aria-controls="details" aria-selected="false">
            {{ trans_choice('common.pirep', 1).' '.trans_choice('common.field', 2) }}
          </button>
        </li>
        @endif
        @if($AuthCheck && $pirep->acars_logs && $pirep->acars_logs->count() > 0)
        <li class="nav-item" role="presentation">
          <button class="nav-link border-0 m-0 mx-1 p-0 px-1" id="log-tab" data-bs-toggle="tab" data-bs-target="#log"
            type="button" role="tab" aria-controls="log" aria-selected="false">
            @lang('pireps.flightlog')
          </button>
        </li>
        @endif
        @if($AuthCheck && $pirep->comments && $pirep->comments->count() > 0)
        <li class="nav-item" role="presentation">
          <button class="nav-link border-0 m-0 mx-1 p-0 px-1" id="comments-tab" data-bs-toggle="tab"
            data-bs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">
            Comments
          </button>
        </li>
        @endif
      </ul>
    </h5>
  </div>
  <div class="card-body table-responsive p-0">
    {{-- Navigation Contents --}}
    <div class="tab-content" id="PirepTabContent">
      @php $tab_height = '62vh'; @endphp
      <div class="tab-pane fade show active" id="map" role="tabpanel" aria-labelledby="map-tab">
        @include('pireps.map', ['map_height' => $tab_height])
      </div>
      @if($AuthCheck && $pirep->fields && $pirep->fields->count() > 0 && $pirep->fields->count() <= 150) <div
        class="tab-pane fade overflow-auto" style="max-height: {{ $tab_height }};" id="fields" role="tabpanel"
        aria-labelledby="fields-tab">
        <table class="table table-sm table-borderless table-striped text-nowrap align-middle mb-0">
          @foreach($pirep->fields as $field)
          <tr>
            <td class="col-md-3">{{ $field->name }}</td>
            <td>{!! DT_PirepField($field, $units) !!}</td>
          </tr>
          @endforeach
        </table>
    </div>
    @endif
    @if($AuthCheck && $pirep->acars_logs && $pirep->acars_logs->count() > 0 && $pirep->acars_logs->count() <= 250) <div
      class="tab-pane fade overflow-auto" style="max-height: {{ $tab_height }};" id="log" role="tabpanel"
      aria-labelledby="logs-tab">
      <table class="table table-sm table-borderless table-striped text-nowrap align-middle mb-0">
        @foreach($pirep->acars_logs->sortBy('created_at') as $log)
        <tr>
          <td class="col-md-3">{{ $log->created_at->format('d.M.Y H:i') }}</td>
          <td>{{ $log->log }}</td>
        </tr>
        @endforeach
      </table>
  </div>
  @endif
  @if($AuthCheck && $pirep->comments->count() > 0)
  <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
    <table class="table table-sm table-borderless table-striped text-nowrap align-middle mb-0">
      @foreach($pirep->comments as $comment)
      <tr>
        <td class="col-3">{{ $comment->created_at->format('d.M.Y H:i') }}</td>
        <td>{{ $comment->comment }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  @endif
</div>
</div>
<div class="card-footer p-1">
  @if(filled($pirep->route))
  <i class="fas fa-route m-1" title="Planned Route"></i>
  {{ $pirep->dpt_airport_id.' '.$pirep->route }}
  @endif
</div>
</div>
</div>

@section('scripts')
<script type="text/javascript">
  phpvms.map.render_route_map({
    pirep_uri: '{!! url(' / api / pireps / '.$pirep->id.' / acars / geojson ') !!}',
    route_points: {
      !!json_encode($map_features['planned_rte_points']) !!
    },
    planned_route_line: {
      !!json_encode($map_features['planned_rte_line']) !!
    },
    actual_route_line: {
      !!json_encode($map_features['actual_route_line']) !!
    },
    actual_route_points: {
      !!json_encode($map_features['actual_route_points']) !!
    },
    aircraft_icon: '{!! public_asset(' / assets / img / acars / aircraft.png ') !!}',
    flown_route_color: '#067ec1',
    circle_color: '#056093',
    flightplan_route_color: '#8B008B',
    leafletOptions: {
      scrollWheelZoom: false,
    },
  });
</script>
@endsection