@if($is_visible)
<div class="card mb-2">
  <div class="card-header p-1">
    <h5 class="m-1">
      {{ $title }}
      <i class="fas {{ $icon }} float-end"></i>
    </h5>
  </div>
  <div class="card-body p-0 overflow-auto table-responsive">
    @include('FlsModule::widgets.airport_assets_'.$type)
  </div>
  <div class="card-footer p-0 px-1 small text-end fw-bold">
    @lang('FlsModule::common.count'): {{ $count }}
  </div>
</div>
@endif