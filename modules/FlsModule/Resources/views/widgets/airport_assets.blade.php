@if($is_visible)
<div class="card mb-2">
    <div class="card-header p-1 airports-card-body" style="background-color: #00157f">
        <h4 class="m-1 text-white">
            {{ $title }}
        </h4>
    </div>
    <div class="card-body p-0 overflow-auto table-responsive">
        @include('FlsModule::widgets.airport_assets_'.$type)
    </div>
    <div class="card-footer card-footer-fls p-0 px-3 small text-end fw-bold" style="background-color: transparent!important">
        @lang('FlsModule::common.count'): {{ $count }}
    </div>
</div>
@endif