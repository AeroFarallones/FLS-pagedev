<nav class="fixed-top d-flex px-3 pt-5" id="nav-home" style="background: transparent" data-color="#000a54">
  <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand" href="{{route('frontend.home')}}"><img
        src="https://www.aerofarallones.com/image/new/Logo_FLS_CO_TXT_S.png" width="250px" alt=""></a>
    <button class="fs-4 bg-transparent rounded" style="border: none" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
      <i class="fa fa-bars text-white" aria-hidden="true"></i>
    </button>
    {{--Navigation menu (Don't touch)--}}
    <div class="offcanvas offcanvas-end" style="background: #FFFFFF" tabindex="-1" id="offcanvasDarkNavbar"
      aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title fs-3 font-montbold" style="color: #000a54" id="offcanvasDarkNavbarLabel">
          AeroFarallones</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      @include('layouts.fls_theme.nav_links')
    </div>
  </div>
</nav>