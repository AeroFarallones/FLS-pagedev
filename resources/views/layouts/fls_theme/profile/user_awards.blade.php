@if($user->awards)
  <div class="row" style="place-content: center;">
    @foreach($user->awards as $award)
      <div class="col-md-4">
        <div class="card mb-2" style="border-color: #00157f;">
          <div class="card-body text-center p-1">
            @if($award->image_url)
              <img style="max-width: 100%; height: auto;" src="{{ $award->image_url }}" alt="{{ $award->name }}" title="{{ $award->description }}">
            @endif
          </div>
          <div class="card-footer p-0 small text-center fw-bold db-font-montbold blue-fls" style="border-color: #00157f; background-color: transparent;">
            {{ $award->name }}
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif