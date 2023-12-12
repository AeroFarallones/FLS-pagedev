<style>
  .form-control {
    border-radius: 15px !important;
  }

  .login_intro {
    background: rgba(0, 21, 127, 0.3)
  }

  .decorationCard {
    background: rgba(255, 255, 255, 0.65)
  }

  .loginCard {
    background: rgba(255, 255, 255, 0.4)
  }
</style>



@extends('auth.login_layout')
@section('title', __('common.login'))

@section('content')
<div class="login_intro m-0">
  <div class="row w-100 h-100 align-items-center p-5">
    <div class="col-sm-5 h-100 m-0 d-flex flex-column position-relative p-0 align-items-center justify-content-center">
      <div class="decorationCard h-75 position-absolute rounded" style="z-index: 50; width: 85%;"></div>
      <div class="decorationCard h-50 w-100 position-absolute rounded" style="z-index: 25"></div>
      <div class="bg-white rounded w-75 py-4 px-5 d-grid " style="z-index: 100; height: 80%;">
        <div class="" style="color: #000a54;">
          <h2 class="font-montbold m-0 fs-1">@lang('common.login')</h2>
        </div>
        {{ Form::open(['url' => url('/login'), 'method' => 'post', 'class' => 'form']) }}

        <div class="panel periodic-login h-100">
          <div class="panel-body h-100">

            <div
              class="personalInfo_container gap-4 d-flex flex-column align-items-center h-100 justify-content-center">

              <div class="w-100">
                <label for="name" class="control-label"></label>
                <div
                  class="input-group form-group-no-border form-group-no-border {{ $errors->has('email') ? ' has-error' : '' }}">
                  {{
                  Form::text('email', old('email'), [
                  'id' => 'email',
                  'placeholder' => __('common.email').' '.__('common.or').' '.__('common.pilot_id'),
                  'class' => 'form-control',
                  'required' => true,
                  ])
                  }}
                </div>
                @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
              </div>

              <div class="w-100">
                <label for="password" class="control-label"></label>
                <div class="input-group form-group-no-border {{ $errors->has('password') ? 'has-danger' : '' }}">
                  {{
                  Form::password('password', [
                  'name' => 'password',
                  'class' => 'form-control',
                  'placeholder' => __('auth.password'),
                  'required' => true,
                  ])
                  }}
                </div>
                @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
              </div>

              <div class="">
                <button class="btn" id="airline_page" title="{{__('FlsModule::fls.nextPage')}}"><i
                    class="fa fa-arrow-circle-right fs-1" style="color: #00157F" aria-hidden="true"></i></button>
              </div>
              <div class="">
                <div class="pull-left mx-3">
                  <h6>
                    <a href="{{ url('') }}" class="link"> @lang('common.dashboard')</a>
                  </h6>
                </div>
                <div class="pull-right">
                  <h6>
                    <a href="{{ url('/password/reset') }}" class="link">@lang('auth.forgotpassword')? </a>
                  </h6>
                </div>

              </div>
            </div>

          </div>
        </div>

        {{ Form::close() }}
        <div class="h-25"></div>
      </div>

    </div>
    <div class="col-sm-7 d-flex justify-content-center">
      <div
        class="loginCard w-50 h-50 d-flex flex-column gap-4 p-5 justify-content-between text-center text-white rounded">
        <div class="OneOfUs">
          <h4 class="fs-2 text-blue fw-bold">New around here?</h4>
        </div>
        <p class="fs-2 text-blue fw-bold">Come fly with us!</p>
        <button type="button" class="btn text-white fw-bold" onclick="register()"
          style="background-color: #00157f">Register</button>
      </div>
    </div>

  </div>
</div>

<script>
  function register(){
  location.replace("{{route('register')}}");
}
</script>
@endsection