<div class="col-md-3">
  <div class="card mb-2" style="border-color: #00157f;">
    <div class="card-header p-1" style="background-color: #00157f;">
      <h5 class="m-1 db-font-montbold text-white">
        {{ substr($group, $substr) }}
      </h5>
    </div>
    <div class="card-body p-0 table-responsive">
      @include('downloads.table', ['files' => $files])
    </div>
  </div>
</div>