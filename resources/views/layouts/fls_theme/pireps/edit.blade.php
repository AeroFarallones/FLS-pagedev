@extends('app')
@section('title', __('pireps.editflightreport'))
@section('content')
<div class="row pt-3">
  <div class="col-md-12">
    <div class="card mb-2">
      <div class="card-header p-1 dashboard-card-body">
        <h3 class="m1">@lang('pireps.editflightreport')</h3>
      </div>
      <div class="card-body p-1">
        @include('flash::message')
        {{ Form::model($pirep, [
                  'route' => ['frontend.pireps.update', $pirep->id],
                  'class' => 'form-group',
                  'method' => 'patch']) }}
        @include('pireps.fields')
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endsection
@include('pireps.scripts')