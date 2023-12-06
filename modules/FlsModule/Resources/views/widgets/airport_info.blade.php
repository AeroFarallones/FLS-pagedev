@if($is_visible)
{{ Form::open() }}
<div class="card mb-2">
    <div class="card-header p-1 airports-card-body" style="background-color: #00157f">
        <h4 class="m-1 text-white">
            @lang('FlsModule::widgets.airport_info')
        </h4>
    </div>
    <div class="card-body p-1 pt-3">
        {{ Form::select('airport_selector', [], null , ['id' => 'airport_selector', 'class' => 'form-control '.$hubs_only.'
    airport_search', 'onchange' => 'Check_Airport_Selection()']) }}
    </div>
    <div class="dashboard-card-footer p-1 text-end small">
        <span class="float-start pt-1">
            @if($config['type'] === 'hubs') @lang('FlsModule::widgets.hubs_only') @endif
        </span>
        <a id="airport_link" style="visibility: hidden;" href="{{ route($apt_route, '') }}"
            class="btn button-blue-fls font-fls">@lang('FlsModule::widgets.go')</a>
    </div>
</div>
{{ Form::close() }}

<script type="text/javascript">
// Simple Selection With Dropdown Change
const oldlink = document.getElementById('airport_link').href;

function Check_Airport_Selection() {
    if (document.getElementById('airport_selector').value === 'ZZZZ') {
        document.getElementById('airport_link').style.visibility = 'hidden';
    } else {
        document.getElementById('airport_link').style.visibility = 'visible';
    }
    const selected_ap = document.getElementById('airport_selector').value;
    const newlink = '/'.concat(selected_ap);
    document.getElementById('airport_link').href = oldlink.concat(newlink);
}
</script>

@include('FlsModule::scripts.airport_search')
@endif