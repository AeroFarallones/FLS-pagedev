@extends('app')
@section('title', __('FlsModule::common.roster'))

@section('content')
<div class="row">
  <div class="col">
    <div class="card mb-2">
      <div class="card-header p-1">
        <h5 class="m-1">
          @lang('FlsModule::common.roster')
          <i class="fas fa-users float-end"></i>
        </h5>
      </div>
      <div class="card-body p-0 table-responsive overflow-auto" style="max-height: 77vh;">
        @include('FlsModule::roster.table', ['state_badge' => true])
      </div>
      <div class="card-footer p-0 px-1 text-end small fw-bold">
        @if($users->hasPages())
        @lang('FlsModule::common.paginate', ['first' => $users->firstItem(), 'last' => $users->lastItem(), 'total' =>
        $users->total()])
        @else
        @lang('FlsModule::common.total') {{ $users->total() }}
        @endif
      </div>
    </div>
  </div>
</div>

{{ $users->links('pagination.default') }}
@endsection