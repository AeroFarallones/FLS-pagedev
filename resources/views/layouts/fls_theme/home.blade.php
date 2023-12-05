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
          <h1>WE WANT YOU TO FLY WITH US!</h1>
        </div>
        <div class="subtitle_container fw-bold" data-aos="fade-down">
          <h2>Being here means everything.</h2>
        </div>
        <div class="bar_orange rounded-pill" style="background: #fd7e14; width: 100%; height: 10px"></div>
        <div class="mt-3 button_register">
          <button onclick="register()">REGISTER</button>
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
        <div class="card-body d-flex flex-column align-items-center">
          <img src="{{asset('fls-theme/frontend/img/Logos/LogoBlancoMont.png')}}" width="30%" alt="">
          <p class="card-text text-center text-white mt-3">Welcome to AeroFarallones! A virtual airline where we want our pilots to take flight simulation to another level.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="background: #00157f">
        <div class="card-body d-flex flex-column align-items-center">
          <img src="{{asset('fls-theme/frontend/img/Logos/community.png')}}" width="30%" alt="">
          <p class="card-text text-center text-white mt-3">Since our establishment in 2017, the AeroFarallones community has been provided with the best and most advanced flight simulation tools.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="background: #00157f">
        <div class="card-body d-flex flex-column align-items-center">
          <img src="{{asset('fls-theme/frontend/img/Logos/IVAO_Partner.svg')}}" width="80%" alt="">
          <p class="card-text text-center text-white mt-3">We are officially registered in IVAO, a virtual network that provides the best flight and simulation experience.</p>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- STATS CARDS--}}
<div class="container-fluid d-grid w-100 p-5 h-100 align-items-center gap-5" id="stats_card">
  <div class="container" data-aos="fade-right">
    <h2 class="statistics__title">Latest statistics...</h2>
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
    <h2 class="staff__title">STAFF</h2>
  </div>
  <div class="container text-center h-100 px-5 d-flex justify-content-center" data-aos="fade-up">
    <div class="staffCard__container h-100 w-100">
      <div class="staffCard__item">
        <div class="staffCard__image">
          <img class="rounded-pill" src="{{asset('fls-theme/frontend/img/marlon.jpg')}}" alt="staff_photo">
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
    <h2 class="fleet__title font-fls">Our fleet</h2>
    <h4 class="fleet__subtitle">Our current aircrafts in service</h4>
  </div>
  <div class="w-75 h-75" data-aos="fade-up">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <a href="">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Airbus A320</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-center">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal">
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <a href="">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Airbus A320</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Airbus A320</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Airbus A320</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="">
          <div class="card">
            <img src="{{asset('fls-theme/frontend/img/Airplanes/A320.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Airbus A320</h5>
              <p class="card-text">Mamarlon y el Capisite en Taiwan check.</p>
              <p class="w-100 d-flex justify-content-between text-fls align-items-cente">
                Mas informacion <i class="fs-4 fa-solid fa-circle-chevron-right"></i></p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
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
