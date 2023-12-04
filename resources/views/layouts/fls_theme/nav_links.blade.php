<div class="offcanvas-body">
  <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page"
        href="{{route('frontend.dashboard.index')}}">{{__('common.dashboard')}}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('frontend.flights.index')}}">Flights</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('/admin')}}">
        <i class="fas fa-circle-notch"></i>
        Admin</a>
    </li>

  </ul>
</div>