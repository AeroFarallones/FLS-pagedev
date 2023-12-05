@extends('app')
@section('title', trans_choice('common.flight', 2))

@section('content')
<<<<<<< HEAD
  <div class="row pt-3">
    @include('flash::message')
    <div class="col-md-9">
      <h2 class="font-montbold color-fls">{{ trans_choice('common.flight', 2) }}</h2>
      @include('flights.table')
    </div>
    <div class="col-md-3">
      @include('flights.nav')
      @widget('FlsModule::Map', ['source' => 'aerodromes'])
      @include('flights.search')
    </div>
=======
<div class="row pt-3">
  @include('flash::message')
  <div class="col-md-9">
    <h2 class="font-montbold color-fls">{{ trans_choice('common.flight', 2) }}</h2>
    @include('flights.table')
>>>>>>> acd63e642f425e7bf15b1f98c198875c0c828c9c
  </div>
  <div class="col-md-3">
    @include('flights.nav')
    @widget('FlsModule::Map', ['source' => 'fleet'])
    @widget('FlsModule::Map')
    @include('flights.search')
  </div>
</div>
<div class="row">
  <div class="col-12 text-center">
    {{ $flights->withQueryString()->links('pagination.default') }}
  </div>
</div>
@if (setting('bids.block_aircraft', false))
@include('flights.bids_aircraft')
@endif
@endsection

@include('flights.scripts')
