@extends('app')
@section('title', __('home.welcome.title'))

@section('content')

<div class="container-fluid intro p-0" style="">
  @include('home_nav')
  <div class="container-fluid row-home w-100 h-100 m-0 p-5 row text-white align-items-center"
    style="background: rgb(0, 21, 128,0.6)">
    <div class="col-8 w-50">
      <div class="d-flex flex-column ">
        <div class="title_container text-center">
          <h1>WE WANT YOU TO FLY WITH US!</h1>
        </div>
        <div class="subtitle_container fw-bold">
          <h2>Being here means everything.</h2>
        </div>
        <div class="bar_orange rounded-pill" style="background: #fd7e14; width: 100%; height: 10px"></div>
      </div>
    </div>
    <div class="col"></div>
    <div class="col"></div>
  </div>
  <div class="container-fluid d-grid w-100 p-5 h-100 align-items-center gap-5">
    <div class="container">
      <h2 class="staff__title">STAFF</h2>
    </div>
    <div class="container text-center h-100 px-5 d-flex justify-content-center">
      <div class="staffCard__container h-100 w-100">
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
</div>

@endsection