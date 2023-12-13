@extends('app')
@section('title', trans_choice('common.pirep', 2))

@section('content')
@if(!$pireps->count())
<div class="alert alert-info mb-1 p-1 px-2 fw-bold">No Pilot Reports!</div>
@else
<div class="row pt-3">
  <div class="col-md-12">
    <div class="card mb-2">
      <div class="card-header p-1 dashboard-card-body">
        <h3 class="m-1">
          @lang('FlsModule::common.reports')
        </h3>
      </div>
      <div class="card-body p-0 overflow-auto table-responsive" style="max-height: 78vh;">
        @include('FlsModule::pireps.table')
      </div>
      <div class="card-footer p-0 px-3 text-end fw-bold small card-footer-fls">
        @lang('FlsModule::common.paginate', ['first' => $pireps->firstItem(), 'last' => $pireps->lastItem(), 'total' =>
        $pireps->total()])
      </div>
    </div>
  </div>
</div>
{{ $pireps->links('pagination.default') }}
@endif
@endsection