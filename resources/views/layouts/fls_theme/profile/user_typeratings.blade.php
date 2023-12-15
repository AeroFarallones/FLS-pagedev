<div class="row" style="place-content: center;">
  @foreach($user->typeratings->sortBy('type', SORT_NATURAL) as $tr)
  <div class="col-md-2">
    <div class="card mb-2">
      <div class="card-header p-1 dashboard-card-body">
        <h4 class="m1">
          {{ $tr->type }}
        </h4>
      </div>
      <div class="card-body p-2">
        @if(filled($tr->image_url))
        <img class="img-fluid rounded" src="{{ $tr->image_url }}" title="{{ $tr->description }}" alt="">
        @else
        <span title="{{ $tr->description }}">{{ $tr->name }}</span>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>