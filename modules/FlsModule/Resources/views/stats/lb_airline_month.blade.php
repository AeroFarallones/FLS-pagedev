<div class="row row-cols-md-2 row-cols-lg-4">
  <div class="col-md">
    @widget('FlsModule::LeaderBoard', ['source' => 'airline', 'period' => 'currentm', 'count' => 5, 'type' =>
    'flights'])
    @widget('FlsModule::LeaderBoard', ['source' => 'airline', 'period' => 'lastm', 'count' => 3, 'type' => 'flights'])
  </div>
  <div class="col-md">
    @widget('FlsModule::LeaderBoard', ['source' => 'airline', 'period' => 'currentm', 'count' => 5, 'type' => 'time'])
    @widget('FlsModule::LeaderBoard', ['source' => 'airline', 'period' => 'lastm', 'count' => 3, 'type' => 'time'])
  </div>
  <div class="col-md">
    @widget('FlsModule::LeaderBoard', ['source' => 'airline', 'period' => 'currentm', 'count' => 5, 'type' =>
    'distance'])
    @widget('FlsModule::LeaderBoard', ['source' => 'airline', 'period' => 'lastm', 'count' => 3, 'type' => 'distance'])
  </div>
  <div class="col-md">
    @widget('FlsModule::LeaderBoard', ['source' => 'airline', 'period' => 'currentm', 'count' => 5, 'type' => 'lrate'])
    @widget('FlsModule::LeaderBoard', ['source' => 'airline', 'period' => 'lastm', 'count' => 3, 'type' => 'lrate'])
  </div>
</div>