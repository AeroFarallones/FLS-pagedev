{{-- Last 15 Days --}}

<div class="row pt-3">
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totflight', 'period' => 15])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgtime', 'period' => 15])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgdistance', 'period' =>
    15])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgfuel', 'period' => 15])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avglanding', 'period' => 15])
  </div>
  @if(Theme::getSetting('gen_stable_approach'))
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'fdm', 'period' => 15])
  </div>
  @endif
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgscore', 'period' => 15])
  </div>
</div>

{{-- Monthly Stats --}}
<div class="row pt-3">
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totflight', 'period' =>
    'currentm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totflight', 'period' =>
    'lastm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totflight', 'period' =>
    'prevm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'tottime', 'period' =>
    'currentm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'tottime', 'period' =>
    'lastm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'tottime', 'period' =>
    'prevm'])
  </div>
</div>
<div class="row pt-3">
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totdistance', 'period' =>
    'currentm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totdistance', 'period' =>
    'lastm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totdistance', 'period' =>
    'prevm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totfuel', 'period' =>
    'currentm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totfuel', 'period' =>
    'lastm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'totfuel', 'period' =>
    'prevm'])
  </div>
</div>
<div class="row pt-3">
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avglanding', 'period' =>
    'currentm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avglanding', 'period' =>
    'lastm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avglanding', 'period' =>
    'prevm'])
  </div>
  @if(Theme::getSetting('gen_stable_approach'))
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'fdm', 'period' =>
    'currentm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'fdm', 'period' => 'lastm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'fdm', 'period' => 'prevm'])
  </div>
  @endif
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgscore', 'period' =>
    'currentm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgscore', 'period' =>
    'lastm'])
  </div>
  <div class="col-md-2">
    @widget('FlsModule::PersonalStats', ['disp' => 'full', 'user' => $user->id, 'type' => 'avgscore', 'period' =>
    'prevm'])
  </div>
</div>