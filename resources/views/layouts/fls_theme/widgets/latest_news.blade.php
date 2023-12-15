
<div class="card h-100 news-card">
  <div class="card-body">
    <h3 class="card-title color-fls font-montbold">@lang('widgets.latestnews.news')</h3>
    @if($news->count() === 0)
      <p class="card-text font-fls">@lang('widgets.latestnews.nonewsfound')</p>
    @endif
    @foreach($news as $item)
      <h4 class="font-montbold color-fls" style="margin-top: 0px;">{{ $item->subject }}</h4>
      <p class="category font-fls">{{ $item->user->name_private }}
        - {{ show_datetime($item->created_at) }}</p>

      {!! $item->body !!}
    @endforeach
  </div>
</div>
