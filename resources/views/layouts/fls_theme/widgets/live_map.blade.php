<div class="card mb-2">
  <div class="card-header p-1" style="background: #00157f; color: #fff">
    <h5 class="m-1">
      @lang('common.livemap')
      <button class="btn btn-sm btn-warning p-0 m-0 ms-2 px-1 float-end" onclick="toggleLiveMap();">
        @lang('FlsModule::common.show_hide')
        <i class="fas fa-globe float-end m-1 ps-1"></i>
      </button>
    </h5>
  </div>
  <div class="card-body p-0" id="cardBodyMap">
    <div id="map" style="border-radius: 5px; width: {{ $config['width'] }}; height: {{ $config['height'] }}">
      {{--
      This is the bottom bar that appears when you click on a flight in the map.
      You can show any data you want - use a JS debugger to see the value of "pirep",
      or look up the API documentation for the /api/pirep/{id}/acars call

      It's basically any of the fields from the database and pirep.position.X is any
      column from the ACARS table - holds the latest position.

      Again, this is updated automatically via the rivets.js bindings, so be mindful
      when you're editing the { } - single brackets == rivets, double brackets == laravel

      A couple of places (like the distance) use both to output the correct bindings.
      --}}
      <div id="map-info-box" class="map-info-box" rv-show="pirep.id"
        style="width: {{ $config['width'] }}; height: 50px; padding: 5px; background-color: rgba(118,147,171,0.8);">
        <table class="table table-sm table-borderless text-start align-middle mb-0">
          <tr>
            <td><img rv-src="pirep.airline.logo" height="40px;" /></td>
            <td><b>{ pirep.airline.icao }{ pirep.flight_number }</b></td>
            <td><span rv-title="pirep.dpt_airport.location">{ pirep.dpt_airport.name } ({pirep.dpt_airport.iata})</span>
            </td>
            <td><span rv-title="pirep.arr_airport.location">{ pirep.arr_airport.name } ({pirep.arr_airport.iata})</span>
            </td>
            <td><span rv-title="pirep.aircraft.icao">{ pirep.aircraft.registration }</span></td>
            <td class="text-center"><span title="Ground Speed">{ pirep.position.gs } kt</span></td>
            <td class="text-center"><span title="Altitude">{ pirep.position.altitude } ft</span></td>
            <td class="text-center"><span title="Heading">{ pirep.position.heading } &deg;</span></td>
            <td class="text-end">{ pirep.status_text }</td>
            <td class="text-end"><b>{ pirep.user.name_private }</b></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>

@if($config['table'] === true)
<div class="clearfix" style="padding-top: 25px"></div>

{{--
This table is also handled/rendered by rivets from the livemap
Handles the updates by automatically updating the data in the row.

Same note applies from above about the data from the PIREP API being available
and being mindful of the rivets bindings
--}}
<div id="live_flights" class="row">
  <div class="col-md-12">
    <div rv-hide="has_data" class="jumbotron text-center">@lang('widgets.livemap.noflights')</div>
    <table rv-show="has_data" id="live_flights_table" class="table table-striped">
      <thead>
        <tr class="text-small header">
          <td class="text-small">{{ trans_choice('common.flight', 2) }}</td>
          <td class="text-small">@lang('common.departure')</td>
          <td class="text-small">@lang('common.arrival')</td>
          <td class="text-small">@lang('common.aircraft')</td>
          <td class="text-small">@lang('widgets.livemap.altitude')</td>
          <td class="text-small">@lang('widgets.livemap.gs')</td>
          <td class="text-small">@lang('widgets.livemap.distance')</td>
          <td class="text-small">@lang('common.status')</td>
        </tr>
      </thead>
      <tbody>
        <tr rv-each-pirep="pireps">
          <td><a href="#top_anchor" rv-on-click="controller.focusMarker">{ pirep.ident }</a></td>
          {{-- Show the full airport name on hover --}}
          <td><span rv-title="pirep.dpt_airport.name">{ pirep.dpt_airport.icao }</span></td>
          <td><span rv-title="pirep.arr_airport.name">{ pirep.arr_airport.icao }</span></td>
          <td>{ pirep.aircraft.registration }</td>
          <td>{ pirep.position.altitude }</td>
          <td>{ pirep.position.gs }</td>
          <td>{ pirep.position.distance.{{setting('units.distance')}} | fallback 0 } /
            { pirep.planned_distance.{{setting('units.distance')}} | fallback 0 }
          </td>
          <td>{ pirep.status_text }</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endif

@section('scripts')
<script>
  phpvms.map.render_live_map({
      center: ['{{ $center[0] }}', '{{ $center[1] }}'],
      zoom: '{{ $zoom }}',
      aircraft_icon: '{!! public_asset('/assets/img/acars/aircraft.png') !!}',
      refresh_interval: {{ setting('acars.update_interval', 60) }},
      units: '{{ setting('units.distance') }}',
      flown_route_color: '#067ec1',
      leafletOptions: {
        scrollWheelZoom: false,
      }
    });

    $(function() {
          var item = localStorage.getItem("liveMapToggled");
          if(item === null){
          localStorage.setItem("liveMapToggled", "true");
          }
          if(item === "true"){
            $("#cardBodyMap").show()
          }else if(item === "false"){
            $("#cardBodyMap").hide()
          }
    });

    function toggleLiveMap(){
        var item = localStorage.getItem("liveMapToggled");
        if(item === "true"){
          $("#cardBodyMap").hide()
          localStorage.setItem("liveMapToggled", "false");
        }else if(item === "false"){
          $("#cardBodyMap").show()
          localStorage.setItem("liveMapToggled", "true");
        }
    }

</script>

@endsection