@if($is_visible)
<div class="card mb-2">
  <div class="card-header airports-card-body p-1">
    <h5 class="m-1">
      @lang('FlsModule::widgets.activeu')
      <i class="fas fa-users float-end"></i>
    </h5>
  </div>
  <div class="card-body p-0 table-responsive">
    <table class="table table-borderless table-sm text-start text-nowrap align-middle mb-0">
      @foreach($active_users as $active)
      <tr>
        <td>
          <a href="{{ route('frontend.profile.show', [$active->user_id]) }}">{{ optional($active->user)->name_private
            }}</a>
        </td>
        <td class="text-end">
          {{ $active->last_activity->diffForHumans() }}
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endif