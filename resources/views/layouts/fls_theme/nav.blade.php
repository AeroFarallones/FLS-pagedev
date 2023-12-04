<nav class="navbar" style="background: #000a54">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('frontend.home')}}"><img width="250px"
        src="https://www.aerofarallones.com/image/new/Logo_FLS_CO_TXT_S.png" alt=""></a>
    <button class="fs-4 bg-transparent rounded" style="border: none" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <i class="fa fa-bars text-white" aria-hidden="true"></i>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      @include('layouts.fls_theme.nav_links')
    </div>
  </div>
</nav>