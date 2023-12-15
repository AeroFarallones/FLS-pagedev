<div class="row">
  <div class="col">
    <div class="card mb-2">
      <div class="card-header p-1">
        <h5 class="m-1">
          @lang('FlsModule::common.reports')
          <i class="fas fa-file-upload float-end"></i>
        </h5>
      </div>
      <div class="card-body p-0 overflow-auto table-responsive">
        @include('FlsModule::pireps.table_compact')
      </div>
      <div class="card-footer p-0 px-1 small fw-bold text-end">
        <span class="float-start">
          @lang('FlsModule::common.total') {{ $pireps->total() }}
        </span>
        @lang('FlsModule::common.latest') {{ $pireps->lastItem() }}
      </div>
    </div>
  </div>
</div>