{{-- @if(filled($leader_board)) --}}
<div class="card mb-2">
  <div class="card-header p-1" style="background-color: #00157f">
    <h5 class="m-1 text-white text-orange">
      {{ $header_title }}
      <i class="fas {{ $header_icon }} float-end"></i>
    </h5>
  </div>
  <div class="card-body p-0 table-responsive">
    <table class="table table-sm table-borderless text-start text-nowrap align-middle mb-0">
      @if($count > 1)
      <tr>
        <th>@lang('FlsModule::common.pilots')</th>
        <th class="text-end">{{ $column_title }}</th>
      </tr>
      @endif
      @foreach($leader_board as $board)
      <tr>
        <td>
          <a href="{{ route($board['route'], $board['id']) }}" class="text-decoration-none">
        </td>
        <td class="text-end">{{ $board['totals'] }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="d-flex justify-content-center">
    <div class="w-50 p-0 px-1 mb-3 text-center small fw-bold border rounded-pill" style="border-color: #00157f">
      {{ $footer_note.' '.$footer_type }}
    </div>
  </div>
</div>
{{-- @endif --}}



{{-- @foreach($leader_board as $board)
<tr>
  <td>
    <a href="{{ route($board['route'], $board['id']) }}">
      @if(Theme::getSetting('roster_ident'))
      {{ $board['pilot_ident'] }}
      @endif
      {{ $board['name_private'] }}
    </a>
  </td>
  <td class="text-end">{{ $board['totals'] }}</td>
</tr>
@endforeach --}}