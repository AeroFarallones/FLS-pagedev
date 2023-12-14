<div class="row" style="place-content: center;">
  @foreach($user->typeratings->sortBy('type', SORT_NATURAL) as $tr)
    <div class="col-md-2">
      <div class="card text-center mb-2" style="border-color: #00157f;">
        <div class="card-body p-2">
          @if(filled($tr->image_url))
            <img class="img-fluid rounded" src="{{ $tr->image_url }}" title="{{ $tr->description }}"  alt="">
          @else
            <span title="{{ $tr->description }}">{{ $tr->name }}</span>
          @endif
        </div>
        <div class="card-footer p-0 small fw-bold db-font-montbold blue-fls" style="border-color: #000a54; background-color: transparent;">
          {{ $tr->type }}
        </div>
      </div>
    </div>
  @endforeach
</div>