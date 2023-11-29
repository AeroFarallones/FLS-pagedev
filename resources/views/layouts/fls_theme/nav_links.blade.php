<div class="offcanvas-body">
  <ul class="navbar-nav">

    <li class="nav-item">
      <a class="nav-link" href="{{ route('frontend.dashboard.index') }}">
        <i class="fas fa-laptop-house"></i>
        @lang('common.dashboard')
      </a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Dropdown
      </a>
      <ul class="dropdown-menu dropdown-menu-dark">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </li>

    @ability('admin', 'admin-access')
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/admin') }}">
        <i class="fas fa-circle-notch"></i>
        @lang('common.administration')
      </a>
    </li>
    @endability


  </ul>
</div>