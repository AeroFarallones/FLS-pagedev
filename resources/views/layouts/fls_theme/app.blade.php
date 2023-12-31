<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />


  <title>@yield('title') - {{ config('app.name') }}</title>
  <meta name="description"
    content="A virtual airline where we want our pilots to take flight simulation to another level, we are officially registered in IVAO, a virtual network" />
  <meta name="robots" content="index, follow">

  <meta name="author" content="CoMMArka Studios" />
  <meta name="copyright" content="info@commarka.app" />
  <meta name="robots" content="index" />
  <meta name="keywords" content="aerofarallones, ivao, virtual airline" />

  {{-- Start of required lines block. DON'T REMOVE THESE LINES! They're required or might break things --}}
  <meta name="base-url" content="{!! url('') !!}">
  <meta name="api-key" content="{!! Auth::check() ? Auth::user()->api_key: '' !!}">
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  {{-- End the required lines block --}}



  <link rel="shortcut icon" type="image/png" href="{{ public_asset('fls-theme/frontend/img/favicon.png') }}" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

  {{-- Start of the required files in the head block --}}
  <link href="{{ public_mix('/assets/global/css/vendor.css') }}" rel="stylesheet" />
  @yield('css')
  @yield('scripts_head')
  {{-- End of the required stuff in the head block --}}

  {{-- FLS-THEME required --}}
  {{-- REMEMBER EXECUTE "npm run prod" --}}
  <link rel="stylesheet" href="{{asset('fls-theme/frontend/css/styles.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>

  <link href="{{ public_mix('fls-theme/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  {{-- End FLS-THEME required --}}


  {{-- Custom --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Open+Sans:wght@500&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&display=swap" rel="stylesheet">


</head>

<body>

  @include('layouts.fls_theme.theme_helpers')

  @if (Route::is('frontend.home'))
  <div class="container-fluid p-0" style="width: 100%!important; padding-left: 0rem; padding-right: 0rem;">

    {{-- These should go where you want your content to show up --}}
    @include('flash.message')
    @yield('content_dash')
    {{-- End the above block--}}
  </div>

  @else
  {{-- Others page incluide --}}
  @include('nav')
  <div class="container-fluid p-0" style="width: 95%!important; padding-left: 0rem; padding-right: 0rem;">

    {{-- These should go where you want your content to show up --}}
    @include('flash.message')
    @yield('content')
    {{-- End the above block--}}
  </div>
  {{-- <div class="clearfix" style="height: 200px;"></div> --}}
  @endif

  {{-- All Pages --}}
  <div class="clearfix" style="height: 200px;"></div>

  <!-- ======= Footer ======= -->
  <footer id="footeri" style="margin-left: -1rem;">

    <div class="footeri-top" style="margin-bottom: -4rem;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-3" style="align-self: center; margin-bottom: 1rem; max-width: 350px">
            <img src="{{ public_asset('fls-theme/frontend/img/Logos/IVAO_Partner.svg') }}" alt="" />
          </div>
          <div class="col-lg-1 clearfix" style="align-self: center; margin-bottom: 1rem;">
          </div>
          <div class="col-lg-4" style="align-self: center; margin-bottom: 1rem;">
            <img src="{{ public_asset('fls-theme/frontend/img/Logos/Footer/Logo_FLS_CO_TXT_S.png') }}"
              style="max-width: -webkit-fill-available;" alt="" />
          </div>
          <div class="col-lg-1 clearfix" style="align-self: center; margin-bottom: 1rem;">
          </div>
          <div class="col-lg-3" style="align-self: center; margin-bottom: 1rem; max-width: 350px">
            <img src="{{ public_asset('fls-theme/frontend/img/Logos/Footer/Logo_IVAO_CO.svg') }}" alt="" />
          </div>
          <div class="col-lg-3" style="align-self: center; margin-bottom: 1rem; max-width: 350px">
            <a href="https://commarka.app/" target="_blank"><img
                src="{{ public_asset('fls-theme/frontend/img/CoMMArka/2_NoBg.png') }}" width="100%" alt="" /></a>
          </div>
        </div>
      </div>
    </div>

    <div class="container footeri-bottom clearfix">
      <div class="copyrighty db-font-montbold">
        &copy; Copyright <strong><span>Farallones Holdings</span></strong> {{Carbon::now()->year}}. All Rights Reserved.
        <br> <a href="https://www.ivao.aero/ContactGDPR.asp" class="ml-5">GDPR Policy
          Reglamento General de Protección de Datos - AQUI -</a>
      </div>

      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-free-bootstrap-theme/ -->
      </div>
    </div>
  </footer>

  <!-- End Footer -->





  {{-- <footer class="footer footer-default">
    <div class="container">
      <div class="copyright">
        powered by <a href="http://www.phpvms.net" target="_blank">phpvms</a>
      </div>
    </div>
  </footer> --}}


  <script src="https://kit.fontawesome.com/03b0ac721b.js" crossorigin="anonymous"></script>
  {{-- Start of the required tags block. Don't remove these or things will break!! --}}
  <script src="{{ public_mix('/assets/global/js/vendor.js') }}"></script>
  <script src="{{ public_mix('/assets/frontend/js/vendor.js') }}"></script>
  <script src="{{ public_mix('/assets/frontend/js/app.js') }}"></script>
  @yield('scripts')

  {{-- FLS-THEME required --}}

  {{-- End FLS-THEME required --}}


  {{--
  It's probably safe to keep this to ensure you're in compliance
  with the EU Cookie Law https://privacypolicies.com/blog/eu-cookie-law
  --}}
  <script>
    window.addEventListener("load", function () {
    window.cookieconsent.initialise({
      palette: {
        popup: {
          background: "#edeff5",
          text: "#838391"
        },
        button: {
          "background": "#067ec1"
        }
      },
      position: "top",
    })
  });
  </script>
  {{-- End the required tags block --}}

  <script>
    $(document).ready(function () {
    $("select.select2").select2({width: 'resolve'});
  });
  </script>

  <script>
    function register(){
    location.replace("{{route('register')}}");
  }
  </script>
  {{--
  Google Analytics tracking code. Only active if an ID has been entered
  You can modify to any tracking code and re-use that settings field, or
  just remove it completely. Only added as a convenience factor
  --}}
  @php
  $gtag = setting('general.google_analytics_id');
  @endphp
  @if($gtag)
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtag }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '{{ $gtag }}');
  </script>
  @endif
  <script src="https://kit.fontawesome.com/03b0ac721b.js" crossorigin="anonymous"></script>
  {{-- End of the Google Analytics code --}}

  {{-- CHANGE BACKGROUND COLOR NAV HOME--}}
  <script>
    var one = "#10e88a";
  
  $(window).on("scroll touchmove", function() {
      if ($(document).scrollTop() >= $("#airline_card").position().top - 80) {
          $('#nav-home').css('background', $("#nav-home").attr("data-color"));
          $('#nav-home').addClass("py-3");
          $('#nav-home').removeClass("pt-5");
      }else{
        $('#nav-home').css('background', 'transparent');
        $('#nav-home').addClass("pt-5");
        $('#nav-home').removeClass("py-3");
      };
  });
  </script>

</body>

</html>