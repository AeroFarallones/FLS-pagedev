@extends('app')
@section('title', __('FlsModule::common.ranks'))

@section('content')
{{-- Ranks Table --}}
<div class="pt-3">
  <div class="card mb-2">
  <div class="card-header p-1 dashboard-card-body">
    <h5 class="m-1">
      {{ config('app.name') }} | @lang('FlsModule::common.ranks')
      {{-- <i class="fas fa-tags float-end"></i> --}}
    </h5>
  </div>
  <div class="card-body p-0 table-responsive">
    <table class="table table-sm table-borderless table-striped text-center text-nowrap align-middle mb-0">
      <tr>
        <th class="text-start">@lang('FlsModule::common.rank_title')</th>
        <th>@lang('FlsModule::common.minhour')</th>
        <th>@lang('FlsModule::common.pay_acars')</th>
        <th>@lang('FlsModule::common.pay_manual')</th>
        <th>@lang('FlsModule::common.rank_image')</th>
        <th>@lang('FlsModule::common.restrict')</th>
      </tr>
      @foreach($ranks as $rank)
      <tr>
        <td class="text-start">{{ $rank->name }}</td>
        <td>{{ number_format($rank->hours) }}</td>
        <td>{{ number_format($rank->acars_base_pay_rate).' '.$currency }}</td>
        <td>{{ number_format($rank->manual_base_pay_rate).' '.$currency }}</td>
        <td>
          @if ($rank->image_url)
          <img src="{{ $rank->image_url }}" title="{{ $rank->name }}" class="rounded img-mh30 mx-1">
          @endif
        </td>
        <td>
          @if($rank->subfleets->count() > 0)
          @lang('FlsModule::common.allowed_sf') {{ $rank->subfleets->count() }}
          <i class="fas fa-angle-double-down mx-2" type="button" data-toggle="collapse" aria-expanded="false"
            data-target="#sfr_{{ $rank->id }}" aria-controls="sfr_{{ $rank->id }}"
            title="@lang('FlsModule::common.allowed_sh')">
          </i>
          @else
          @lang('FlsModule::common.restrict_no')
          @endif
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  </div>
</div>

{{-- Rank Boxes --}}
<div class="row row-cols-lg-3">
  @foreach($ranks as $rank)
  <div id="sfr_{{ $rank->id }}" class="collapse">
    @if($rank->subfleets->count() > 0)
    <div class="col-lg">
      <div class="card mb-2">
        <div class="card-header p-1">
          <h5 class="m-1">
            {{ $rank->name }}
            <i class="fas fa-tag float-end"></i>
          </h5>
        </div>
        <div class="card-body p-1">
          @foreach($rank->subfleets as $subfleet)
          <a href="{{ route('FlsModule.subfleet', [$subfleet->type]) }}">
            &bull; {{ $subfleet->name.' | '.optional($subfleet->airline)->name }}
          </a>
          <br>
          @endforeach
        </div>
        <div class="card-footer text-right p-1 small">
          @lang('FlsModule::common.minhour'): {{ $rank->hours }}
        </div>
      </div>
    </div>
    @endif
  </div>
  @endforeach
</div>
@endsection