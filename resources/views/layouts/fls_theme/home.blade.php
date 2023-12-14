@extends('app')
@section('title', __('home.welcome.title'))

@section('content_dash')


@include('home_nav')
<div class="container-fluid intro p-0" style="">



  {{-- HOME --}}
  <div class="container-fluid row-home home_container w-100 h-100 m-0 p-5 row text-white align-items-center"
    style="background: rgb(0, 21, 128,0.6)">
    <div class="col-8 w-50">
      <div class="d-flex flex-column ">
        <div class="title_container text-center">
          <h1>{{__('FlsModule::fls.title')}}</h1>
        </div>
        <div class="subtitle_container fw-bold" data-aos="fade-down">
          <h2>{{__('FlsModule::fls.subtitle')}}</h2>
        </div>
        <div class="bar_orange rounded-pill" style="background: #fd7e14; width: 100%; height: 10px"></div>
        <div class="mt-3 button_register">
          <button onclick="register()">{{__('auth.register')}}</button>
        </div>
      </div>
    </div>
    <div class="col"></div>
    <div class="col"></div>
  </div>
</div>

{{--IVAO PARTNERSHIP CARDS--}}
<div class="container-fluid d-grid w-100 h-100 p-5 gap-5" id="airline_card">
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card" style="background: #00157f">
        <div class="card-body h-100 d-flex flex-column align-items-center">
          <img src="{{asset('fls-theme/frontend/img/Logos/LogoBlancoMont.png')}}" width="30%" alt="">
          <p class="card-text text-center text-white mt-3">{{__('FlsModule::fls.AirlineCards.AeroFarallones')}}</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="background: #00157f">
        <div class="card-body h-100 d-flex flex-column align-items-center">
          <img src="{{asset('fls-theme/frontend/img/Logos/community.png')}}" width="30%" alt="">
          <p class="card-text text-center text-white mt-3">{{__('FlsModule::fls.AirlineCards.SinceCard')}}</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="background: #00157f">
        <div class="card-body h-100 d-flex flex-column align-items-center">
          <img src="{{asset('fls-theme/frontend/img/Logos/IVAO_Partner.svg')}}" width="80%" alt="">
          <p class="card-text text-center text-white mt-3">{{__('FlsModule::fls.AirlineCards.IvaoPartner')}}</p>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- STATS CARDS--}}
<div class="container-fluid d-grid w-100 p-5 h-100 align-items-center gap-5" id="stats_card">
  <div class="container" data-aos="fade-right">
    <h2 class="statistics__title">{{__('FlsModule::fls.statisticsTitle')}}...</h2>
  </div>
  <div class="w-100 d-flex justify-content-center" data-aos="fade-up">
    <div class="statsCards__container w-100 h-100">
      <div class="w-100">
        @widget('FlsModule::LeaderBoard', ['source' => 'pilot', 'count' => 5, 'period' => 'lastm',
        'type' => 'flight'])
      </div>
      <div class="w-100">
        @widget('FlsModule::LeaderBoard', ['source' => 'pilot', 'count' => 5, 'period' => 'lastm',
        'type' => 'lrate'])
      </div>
      <div class="w-100">
        @widget('FlsModule::LeaderBoard', ['source' => 'pilot', 'count' => 5, 'period' => 'lastm',
        'type' => 'time'])
      </div>
    </div>
  </div>
</div>

{{-- STAFF --}}
<div class="container-fluid d-grid w-100 p-5 h-100 align-items-center gap-5">
  <div class="container" data-aos="fade-right">
    <h2 class="staff__title">{{__('FlsModule::fls.staffTitle')}}</h2>
  </div>
  <div class="container text-center h-100 px-5 d-flex justify-content-center" data-aos="fade-up">
    <div class="staffCard__container h-100 w-100">
      <div class="staffCard__item">
        <div class="staffCard__image">
          <img class="rounded-pill" src="{{asset('fls-theme/frontend/img/staff/SantiagoCastellanos.png')}}"
            alt="staff_photo">
        </div>
        <div class="staffCard">
          <div class="staffCard__name"><span>Santiago Castellanos</span></div>
          <div class="staffCard__position"><span>CEO</span></div>
          <div class="staffCard__ivaoCard">
            <img src="https://status.ivao.aero/653841.png" alt="">
          </div>
        </div>
      </div>
      <div class="staffCard__item">
        <div class="staffCard__image">
          <img class="rounded-pill" src="{{asset('fls-theme/frontend/img/marlon.jpg')}}" alt="staff_photo">
        </div>
        <div class="staffCard">
          <div class="staffCard__name"><span>Julian Ramirez</span></div>
          <div class="staffCard__position"><span>Co-CEO / Webmaster COO</span></div>
          <div class="staffCard__ivaoCard">
            <img src="https://status.ivao.aero/653841.png" alt="">
          </div>
        </div>
      </div>
      <div class="staffCard__item">
        <div class="staffCard__image">
          <img class="rounded-pill" src="{{asset('fls-theme/frontend/img/marlon.jpg')}}" alt="staff_photo">
        </div>
        <div class="staffCard">
          <div class="staffCard__name"><span>Martin Sierra</span></div>
          <div class="staffCard__position"><span>Webmaster</span></div>
          <div class="staffCard__ivaoCard">
            <img src="https://status.ivao.aero/653841.png" alt="">
          </div>
        </div>
      </div>
      <div class="staffCard__item">
        <div class="staffCard__image">
          <img class="rounded-pill" src="{{asset('fls-theme/frontend/img/marlon.jpg')}}" alt="staff_photo">
        </div>
        <div class="staffCard">
          <div class="staffCard__name"><span>Alejandro Hurtado</span></div>
          <div class="staffCard__position"><span>Public Relations</span></div>
          <div class="staffCard__ivaoCard">
            <img src="https://status.ivao.aero/653841.png" alt="">
          </div>
        </div>
      </div>
      <div class="staffCard__item">
        <div class="staffCard__image">
          <img class="rounded-pill" src="{{asset('fls-theme/frontend/img/marlon.jpg')}}" alt="staff_photo">
        </div>
        <div class="staffCard">
          <div class="staffCard__name"><span>Juan Pablo</span></div>
          <div class="staffCard__position"><span>Director Operaciones</span></div>
          <div class="staffCard__ivaoCard">
            <img src="https://status.ivao.aero/653841.png" alt="">
          </div>
        </div>
      </div>
      <div class="staffCard__item">
        <div class="staffCard__image">
          <img class="rounded-pill" src="{{asset('fls-theme/frontend/img/marlon.jpg')}}" alt="staff_photo">
        </div>
        <div class="staffCard">
          <div class="staffCard__name"><span>Julian Ramirez</span></div>
          <div class="staffCard__position"><span>Webmaster</span></div>
          <div class="staffCard__ivaoCard">
            <img src="https://status.ivao.aero/653841.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{--CARDS FLEET--}}
<div class="fleet_container container-fluid d-grid w-100 h-100 p-5 gap-5">
  <div class="container" data-aos="fade-left">
    <h2 class="fleet__title font-montbold">{{__('flsmodule::fls.fleetTitle')}}</h2>
    <h3 class="fleet__subtitle">{{__('FlsModule::fls.fleetSubtitle')}}</h3>
  </div>
  <div class="w-75 h-75" data-aos="fade-up">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <button data-bs-toggle="modal" data-bs-target="#C172Modal">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Cessna 172</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </button>
      </div>
      <div class="col">
        <button data-bs-toggle="modal" data-bs-target="#B190Modal">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Beechcraft 1900D</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </button>
      </div>
      <div class="col">
        <button data-bs-toggle="modal" data-bs-target="#AT46Modal">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">ATR 42-600</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </button>
      </div>
      <div class="col">
        <button data-bs-toggle="modal" data-bs-target="#A320Modal">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Airbus A320</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </button>
      </div>
      <div class="col">
        <button data-bs-toggle="modal" data-bs-target="#B738Modal">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Boeing 737-800</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </button>
      </div>
      <div class="col">
        <button data-bs-toggle="modal" data-bs-target="#B789Modal" data-aicraft="B787">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Boeing 787</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </button>
      </div>
    </div>
  </div>

  @widget('FlsModule::FleetInfo', ['aircraft' => "A320"])
  @widget('FlsModule::FleetInfo', ['aircraft' => "B789"])
  @widget('FlsModule::FleetInfo', ['aircraft' => "C172"])
  @widget('FlsModule::FleetInfo', ['aircraft' => "AT46"])
  @widget('FlsModule::FleetInfo', ['aircraft' => "B190"])
  @widget('FlsModule::FleetInfo', ['aircraft' => "B738"])

</div>

{{-- Live flights --}}

<div class="liveFlights__container container-fluid h-screen p-5 d-">
  @widget('live_map', ['width' => '100%', 'table' => true])
</div>

<script>
  AOS.init({
    startEvent: 'DOMContentLoaded'
  });
</script>


@endsection