@extends('app')
@section('title', __('pireps.fileflightreport'))

@section('content')
<div class="row pt-3">
  <div class="col-md-12">
    <div class="card mb-2">
      <div class="card-header p-1 dashboard-card-body">
        <h3 class="m1">@lang('pireps.newflightreport')</h3>
      </div>
      <div class="card-body p-1">
        @include('flash::message')
        @if(!empty($pirep))
        {{ Form::model($pirep, ['route' => 'frontend.pireps.store']) }}
        @else
        {{ Form::open(['route' => 'frontend.pireps.store']) }}
        @endif
        @include('pireps.fields')
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endsection

@include('pireps.scripts')