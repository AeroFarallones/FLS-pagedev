@extends('app')
@section('title', trans_choice('common.pirep', 2))

@section('content')
<div class="row pt-3">
  <div class="col-md-12">
    <div class="card mb-2">
      <div class="card-header p-1 dashboard-card-body">
        <div style="float:right;">
          <a class="btn button-blue-fls mt-1" style="border-color: white;"
            href="{{ route('frontend.pireps.create') }}">@lang('pireps.filenewpirep')</a>
        </div>
        <h3 class="m1">{{ trans_choice('pireps.pilotreport', 2) }}</h3>
      </div>
      <div class="card-body p-1">
        @include('flash::message')
        @include('pireps.table')
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
  <div class="col-12 text-center">
    {{ $pireps->withQueryString()->links('pagination.default') }}
  </div>
</div>
@endsection