@php
$user = Auth::user();
@endphp

<div class="offcanvas-body">
  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

    @if (Auth::check())


    <li class="nav-item">
      <a class="nav-link" aria-current="page" href="{{route('frontend.dashboard.index')}}"><i
          class="fas fa-laptop-house"></i> {{__('common.dashboard')}}</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-home"></i>
        {{ config('app.name') }}
      </a>
      <ul class="dropdown-menu">
        <li>
          <a class="dropdown-item" href="{{ route('frontend.pilots.index') }}">
            <i class="fas fa-users"></i>
            @lang('FlsModule::fls.menu_roster')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.airlines') }}">
            <i class="fas fa-hotel"></i>
            @lang('FlsModule::fls.menu_airlines')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.ranks') }}">
            <i class="fas fa-tags"></i>
            @lang('FlsModule::fls.menu_ranks')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.awards') }}">
            <i class="fas fa-trophy"></i>
            @lang('FlsModule::fls.menu_awards')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.stats') }}">
            <i class="fas fa-cogs"></i>
            @lang('FlsModule::fls.menu_stats')
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-paper-plane"></i>
        @lang('FlsModule::fls.menu_fltops')
      </a>
      <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
        <li>
          <a class="dropdown-item" href="{{ route('frontend.flights.index') }}">
            <i class="fas fa-paper-plane"></i>
            @lang('FlsModule::fls.menu_flights')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.fleet') }}">
            <i class="fas fa-plane"></i>
            @lang('FlsModule::fls.menu_fleet')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.hubs') }}">
            <i class="fas fa-house-user"></i>
            @lang('FlsModule::fls.menu_hubs')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.pireps') }}">
            <i class="fas fa-file-upload"></i>
            @lang('FlsModule::fls.menu_reports')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('frontend.livemap.index') }}">
            <i class="fas fa-map"></i>
            @lang('FlsModule::fls.menu_mapflt')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.livewx') }}">
            <i class="fas fa-cloud-sun-rain"></i>
            @lang('FlsModule::fls.menu_mapwx')
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-paperclip"></i>
        @lang('FlsModule::fls.menu_docs')
      </a>
      <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
        <li>
          <a class="dropdown-item" href="{{ route('frontend.downloads.index') }}">
            <i class="fas fa-download"></i>
            {{ trans_choice('common.download', 2) }}
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.news') }}">
            <i class="fas fa-book-open"></i>
            @lang('FlsModule::fls.menu_news')
          </a>
        </li>
        {{-- @foreach($page_links->sortBy('name', SORT_NATURAL) as $page)
        <li>
          <a class="dropdown-item" href="{{ $page->url }}" target="{{ $page->new_window ? '_blank' : '_self' }}">
            <i class="{{ $page['icon'] ?? 'fas fa-file-alt' }}"></i>
            {{ $page['name'] }}
          </a>
        </li>
        @endforeach --}}
      </ul>
    </li>

    <li class="nav-item">
      <hr class="dropdown-divider">
    </li>
    @if($user)
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-user-alt"></i>
        {{ Auth::user()->name_private }}
      </a>
      <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
        <li>
          <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">
            <i class="far fa-id-badge"></i>
            @lang('FlsModule::fls.menu_profile')
          </a>
        </li>
        @if($user)
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.myairline', [$user->airline_id]) }}">
            <i class="fas fa-hotel"></i>
            @lang('FlsModule::fls.menu_company')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('FlsModule.hub', [$user->home_airport_id ?? '']) }}">
            <i class="fas fa-house-user"></i>
            @lang('FlsModule::fls.menu_base')
          </a>
        </li>
        @endif
        <li>
          <a class="dropdown-item" href="{{ route('frontend.flights.bids') }}">
            <i class="fas fa-file-download"></i>
            @lang('FlsModule::fls.menu_bids')
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('frontend.pireps.index') }}">
            <i class="fas fa-file-upload"></i>
            @lang('FlsModule::fls.menu_pireps')
          </a>
        </li>
      </ul>
    </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{url('/admin')}}">
        <i class="fas fa-circle-notch"></i>
        Admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/logout') }}">
        <i class="fas fa-sign-out-alt"></i>
        @lang('common.logout')
      </a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="{{ route('frontend.pilots.index') }}">
        <i class="fas fa-users"></i>
        @lang('FlsModule::fls.menu_roster')
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('FlsModule.reports') }}">
        <i class="fas fa-file-upload"></i>
        @lang('FlsModule::fls.menu_reports')
      </a>
    </li>
    <li>
      <a class="nav-link" href="{{ route('frontend.livemap.index') }}">
        <i class="fas fa-map"></i>
        @lang('FlsModule::fls.menu_mapflt')
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/register') }}">
        <i class="far fa-id-card"></i>
        @lang('common.register')
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/login') }}">
        <i class="fas fa-sign-in-alt"></i>
        @lang('common.login')
      </a>
    </li>
    @endif
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fa-solid fa-language"></i>
        @lang('FlsModule::fls.Language')
      </a>
      <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
        <li>
          <a class="dropdown-item" href="{{ route('frontend.lang.switch', [
            'en' ]) }}">
            <i class="fa-solid fa-globe"></i>
            {{__('FlsModule::fls.english')}}
          </a>
        </li>
        <li>
          <a class="dropdown-item" href="{{ route('frontend.lang.switch', [
            'es-es' ]) }}">
            <i class="fa-solid fa-globe"></i>
            {{__('FlsModule::fls.spanish')}}
          </a>
        </li>
      </ul>
    </li>

  </ul>
</div>