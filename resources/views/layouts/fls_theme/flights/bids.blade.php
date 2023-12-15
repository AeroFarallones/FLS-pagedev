@extends('app')
@section('title', __('flights.mybid'))

@section('content')
<div class="row">
  @include('flash::message')
  <div class="col-md-12 pt-3">
    <h2 class="font-montbold text-fls fw-bold">{{ __('flights.mybid') }}</h2>
    @include('flights.table')
  </div>
</div>
@endsection

@include('flights.scripts')
