@if($visible === true)
  @if($config['disp'] === 'full')
  <div class="card mb-2 text-white dashboard-card h-100">
    <div class="card-body text-center profile-card-body">
      <h3 class="text-white font-montbold">
        {{ $pstat }}
      </h3>
      <h6 class="header font-montbold dashboard-text-margin pb-3">{{ $sname.' '.$speriod }}</h6>
    </div>
  </div>
  @else
    {{ $pstat }}
  @endif
@endif