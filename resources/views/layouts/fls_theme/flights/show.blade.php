<style>
  .acars-btn:hover{
    background: #c06922 !important;
    color: #FFFFFF !important;
  }

</style>
@extends('app')
@section('title', trans_choice('common.flight', 1).' '.$flight->ident)

@section('content')
  <div class="row">
    <div class="col-8">
      <div class="row">
        <div class="card p-0">
          <div class="card-header dashboard-card-body p-1 d-flex justify-content-between align-items-center">
            <h2>
              {{ $flight->ident }}
            </h2>
            <div class="">
                {{-- @if ($acars_plugin && $bid) --}}
                <a href="vmsacars:bid/{{$bid->id}}" class="acars-btn btn btn-sm float-right rounded text-white" style="background: #fd7e14">Load in vmsACARS</a>
                {{-- @elseif ($acars_plugin) --}}
                <a href="vmsacars:flight/{{$flight->id}}" class="acars-btn btn btn-sm float-right rounded text-white" style="background: #fd7e14">Load in vmsACARS</a>
               {{-- @endif --}}
            </div>
          </div>
          <div class="col-12 card-body">
            <table class="table">
              <tr>
                <td>@lang('common.departure')</td>
                <td>
                  {{ optional($flight->dpt_airport)->name ?? $flight->dpt_airport_id }}
                  (<a href="{{route('frontend.airports.show', [
                              'id' => $flight->dpt_airport_id
                              ])}}">{{$flight->dpt_airport_id}}</a>)
                  @ {{ $flight->dpt_time }}
                </td>
              </tr>

              <tr>
                <td>@lang('common.arrival')</td>
                <td>
                  {{ optional($flight->arr_airport)->name ?? $flight->arr_airport_id }}
                  (<a href="{{route('frontend.airports.show', [
                              'id' => $flight->arr_airport_id
                              ])}}">{{$flight->arr_airport_id }}</a>)
                  @ {{ $flight->arr_time }}</td>
              </tr>
              @if($flight->alt_airport_id)
                <tr>
                  <td>@lang('flights.alternateairport')</td>
                  <td>
                    {{ optional($flight->alt_airport)->name ?? $flight->alt_airport_id }}
                    (<a href="{{route('frontend.airports.show', [
                              'id' => $flight->alt_airport_id
                              ])}}">{{$flight->alt_airport_id}}</a>)
                  </td>
                </tr>
              @endif
              @if(filled($flight->route))
                <tr>
                  <td>@lang('flights.route')</td>
                  <td>{{ $flight->route }}</td>
                </tr>
              @endif
              @if(filled($flight->callsign))
                <tr>
                  <td>@lang('flights.callsign')</td>
                  <td>{{ $flight->airline->icao }} {{ $flight->callsign }}</td>
                </tr>
              @endif
              @if(filled($flight->notes))
                <tr>
                  <td>{{ trans_choice('common.note', 2) }}</td>
                  <td>{{ $flight->notes }}</td>
                </tr>
              @endif
            </table>
          </div>
        </div>  
      </div>

      <div class="row">
        <div class="col-12 mt-3 rounded p-0" style="border: solid #00157f 1rem">
          @include('flights.map')
        </div>
      </div>
    </div>


    <div class="col-4">
      <div class="card">
        <div class="card-header dashboard-card-body p-1">        
          <h5>{{$flight->dpt_airport_id}} @lang('common.metar')</h5> {{-- Header --}}
        </div>
        <div class="card-body">
        {{ Widget::Weather([
            'icao' => $flight->dpt_airport_id,                  
          ]) }}
        <br/>{{-- body --}}
      </div>
    </div>

    <div class="card mt-3">

      <div class="card-header dashboard-card-body p-1">
        <h5>{{$flight->arr_airport_id}} @lang('common.metar')</h5>
      </div>

      <div class="card-body">
        {{ Widget::Weather([
            'icao' => $flight->arr_airport_id,
          ]) }}
          <br>
      </div>
    </div>

    @if ($flight->alt_airport_id)
    <div class="card mt-3">
      <div class="card-header dashboard-card-body p-1">
        <h5>{{$flight->alt_airport_id}} @lang('common.metar')</h5>
      </div>
      <div class="card-body">
        {{ Widget::Weather([
            'icao' => $flight->alt_airport_id,
          ]) }}  
          <br>   
      </div>
    </div>
    @endif
    
    </div>
  </div>
@endsection
