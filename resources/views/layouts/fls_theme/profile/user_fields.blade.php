<div class="row" style="place-content: center;">
  <div class="col-md-3">
    <div class="card mb-2 table-responsive" style="border-color: #00157f;">
      <table class="table table-sm table-borderless align-middle text-start mb-0">
        <tr>
          <th class="col-4 db-font-montbold blue-fls">@lang('disposable.registered')</th>
          <td style="text-align: center;">{{ $user->created_at->diffForHumans() }}</td>
        </tr>
        <tr>
          <th class="db-font-montbold blue-fls">@lang('common.state')</th>
          <th class="text-white" style="text-align: center;">{!! DT_UserState($user) !!}</th>
        </tr>
        @foreach($userFields->where('active', 1) as $field)
          @if(!$field->private && $field->name != Theme::getSetting('gen_ivao_field') && $field->name != Theme::getSetting('gen_vatsim_field'))
          {{-- @if(!$field->private) --}}
            <tr>
              <th class="col-4">
                {{ $field->name }}
                @if(filled($field->description))
                  <i class="fas fa-info-circle mx-2 text-primary" title="{{ $field->description }}"></i>
                @endif
              </th>
              <td>{{ $field->value ?? '--'}}</td>
            </tr>
          @endif
        @endforeach
      </table>
    </div>
  </div>
</div>
@ability('admin', 'admin-access')
  <div class="row">
  </div>
@endability