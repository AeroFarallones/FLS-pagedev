{{-- @if($is_visible) --}}
{{ Form::open(array('route' => $form_route, 'method' => 'post')) }}
{{-- @if(empty($fixed_ac) && filled($ts_aircraft)) --}}
<div class="card mb-2">
    <div class="card-header p-1 airports-card-body" style="background-color: #00157f">
        <h4 class="m-1 text-white">
            @lang('FlsModule::widgets.ta_title')
        </h4>
    </div>
    <div class="card-body p-1 pt-3">
        <select name="ac_selection" id="ac_selection" style="width: 100%" class="form-group input-group select2 my-1">
            <option value="">@lang('FlsModule::widgets.ta_selectac')</option>
            {{-- @foreach($ts_aircraft as $ac)
      <option value="{{ $ac->id }}">
            {{ $ac->icao.' | '.$ac->registration }}
            @if($ac->registration != $ac->name) '{{ $ac->name }}' @endif
            {{ ' | '.$ac->airport_id.' | '.optional($ac->airline)->name }}
            </option>
            @endforeach --}}
        </select>
    </div>
    <div class="dashboard-card-footer p-1 text-end">
        {{-- <i class="fas fa-money-bill-wave text-{{ $icon_color }} float-start m-1" title="{{ $icon_title }}"></i>
        --}}
        @if($price === 'auto')
        <button class="btn button-blue-fls fls-font" type="submit" name="interim_price"
            value="1">@lang('FlsModule::widgets.ta_check')</button>
        @endif
        <button class="btn button-blue-fls font-fls"
            type="submit">@lang('FlsModule::widgets.ta_button')</button>
    </div>
</div>
{{-- @elseif(filled($fixed_ac) && count($ts_aircraft) === 1) --}}
{{-- <button class="btn button-blue-fls font-fls" type="submit">@lang('FlsModule::widgets.ta_buttonf') | {{
  strtoupper($dest) }}</button>
<input type="hidden" name="ac_selection" value="{{ $fixed_ac }}"> --}}
{{-- @endif --}}
{{-- <input type="hidden" name="price" value="{{ $price }}">
<input type="hidden" name="croute" value="{{ url()->current() }}"> --}}
{{ Form::close() }}
{{-- @endif --}}