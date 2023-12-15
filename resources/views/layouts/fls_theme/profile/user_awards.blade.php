@if($user->awards)
  <div class="row" style="place-content: center;">
    @foreach($user->awards as $award)
      <div class="col-md-4">
        <div class="card mb-2">
          <div class="card-header p-1 dashboard-card-body">
            <h4 class="m1 font-montbold">
              {{ $award->name }}
            </h4>
          </div>
          <div class="card-body text-center p-1">
            @if($award->image_url)
              <img style="max-width: 100%; height: auto;" src="{{ $award->image_url }}" alt="{{ $award->name }}" title="{{ $award->description }}">
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif