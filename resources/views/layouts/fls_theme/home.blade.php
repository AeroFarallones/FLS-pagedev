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
</div>

@endsection