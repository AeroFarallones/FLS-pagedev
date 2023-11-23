{{-- @if($is_visible) --}}
{{ Form::open(array('route' => $form_route, 'method' => 'post')) }}
@if(empty($fixed_dest))
<div class="card mb-2 rounded-4">
  <div class="card-header p-1" style="background-color: #00157f">
    <h5 class="m-1 text-white text-orange">
      @lang('FlsModule::widgets.js_travel')
      <i class="fas fa-ticket-alt float-end"></i>
    </h5>
  </div>
  <div class="card-body p-1">
    {{ Form::select('newloc', [], null , ['class' => 'form-control '.$hubs_only.' rounded-pill airport_search select-jumpseat']) }}
  </div>
  <div class="card-footer p-1 text-end">
    {{-- <i class="fas fa-money-bill-wave text-{{ $icon_color }} float-start m-1" title="{{ $icon_title }}"></i> --}}
    @if($price === 'auto')
    <button class="btn btn-sm bg-info p-0 px-1" type="submit" name="interim_price"
      value="1">@lang('FlsModule::widgets.js_check')</button>
    @endif
    <button class="btn btn-sm p-0 px-1 text-white fw-bold" style="background: #00157f" type="submit">@lang('FlsModule::widgets.js_button')</button>
  </div>
</div>
@elseif($fixed_dest && $is_possible)
<button class="btn btn-sm mx-1" type="submit"
  title="{{ $icon_title }}">@lang('FlsModule::widgets.js_buttonf')</button>
<input type="hidden" name="newloc" value="{{ $fixed_dest }}">
@endif
<input type="hidden" name="price" value="{{ $price }}">
<input type="hidden" name="basep" value="{{ $base_price }}">
<input type="hidden" name="croute" value="{{ url()->current() }}">
{{ Form::close() }}

@include('FlsModule::scripts.airport_search')
{{-- @endif --}}