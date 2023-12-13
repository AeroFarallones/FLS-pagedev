<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/frontend/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/frontend/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title') - {{ config('app.name') }}</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

  {{-- FLS-THEME required --}}
  {{-- REMEMBER EXECUTE "npm run prod" --}}
  <link rel="stylesheet" href="{{asset('fls-theme/frontend/css/styles.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <link rel="shortcut icon" type="image/png" href="{{ public_asset('fls-theme/frontend/img/favicon.png') }}" />
  <link href="{{ public_mix('fls-theme/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  {{-- End FLS-THEME required --}}

  @yield('css')
</head>

<body class="login-page" style="background: url({{asset('fls-theme/frontend/img/Backgrounds/register.jpg' )}}); background-size: cover;
background-repeat: no-repeat; background-position: 50% center">
  <div class="page-header">
    <div class="container-fluid p-0">
      @yield('content')
    </div>
  </div>
</body>

@yield('scripts')

</html>