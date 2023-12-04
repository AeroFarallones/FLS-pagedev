<nav class="navbar fixed-top px-3 pt-5" id="nav-home" style="background: transparent" data-color="#000a54">
  <div class=" container-fluid">
    <a class="navbar-brand" href="#"><img width="250px"
        src="https://www.aerofarallones.com/image/new/Logo_FLS_CO_TXT_S.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title fs-3 font-montbold" id="offcanvasNavbarLabel" style="color: #000a54">
          AeroFarallones
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      @include('layouts.fls_theme.nav_links')
    </div>
  </div>
</nav>