<nav class="navbar" style="background: #000a54">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('frontend.home')}}"><img
        src="https://www.aerofarallones.com/image/new/Logo_FLS_CO_TXT_S.png" width="250px" alt=""></a>
    <button class="fs-4 bg-transparent rounded" style="border: none" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <i class="fa fa-bars text-white" aria-hidden="true"></i>
    </button>

    {{--Navigation menu (Don't touch)--}}
    <div class="offcanvas offcanvas-end" style="background: #000a54" tabindex="-1" id="offcanvasDarkNavbar"
      aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-white fs-3" id="offcanvasDarkNavbarLabel">
          AeroFarallones</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
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
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>