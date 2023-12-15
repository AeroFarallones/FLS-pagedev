<div class="row" style="place-content: center;">
  <div class="col-md-3">
    <div class="card mb-2 table-responsive">
      <div class="card-header p-1 dashboard-card-body">
        <h5 class=" m1 text-white font-montbold">
          User Fields
        </h5>
      </div>
      <table class="table table-sm table-borderless align-middle text-start mb-0">
        <tr>
          <th class="col-4 font-montbold color-blue-fls">@lang('profile.registered')</th>
          <td style="text-align: center;">{{ $user->created_at->diffForHumans() }}</td>
        </tr>
        <tr>
          <th class="font-montbold color-blue-fls">@lang('profile.status')</th>
          <th class="text-white" style="text-align: center;">{!! DT_UserState($user) !!}</th>
        </tr>
        @foreach($userFields->where('active', 1) as $field)
        @if(!$field->private && $field->name != Theme::getSetting('gen_ivao_field') && $field->name !=
        Theme::getSetting('gen_vatsim_field'))
        {{-- @if(!$field->private) --}}
        <tr>
          <th class="col-4 font-montbold color-blue-fls">
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