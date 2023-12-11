<style>
  .form-control {
    border-radius: 15px !important;
  }
</style>

@extends('auth.register_layout')
@section('title', __('auth.register'))

@section('content')
<div class="register_intro m-0">
  <div class="row w-100 h-100 justify-content align-items-center p-5">
    <div class="col-sm-8"></div>
    <div class="col-sm-4 bg-white rounded h-100 py-4 px-5 d-grid">
      <div class="" style="color: #000a54;">
        <h2 class="font-montbold m-0 fs-1">@lang('common.register')</h2>
        <span class="font-montbold" id="subtitle_form">Personal info</span>
      </div>
      {{ Form::open(['url' => '/register', 'class' => 'form-signin h-100']) }}

      <div class="panel periodic-login h-100">
        <div class="panel-body h-100">

          {{-- Datos personales :) --}}
          <div class="personalInfo_container d-flex flex-column align-items-center h-100 justify-content-between">

            <div class="w-100">
              <label for="name" class="control-label"></label>
              <div class="input-group form-group-no-border {{ $errors->has('name') ? 'has-danger' : '' }}">
                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('auth.fullname')]) }}
              </div>
              @if ($errors->has('name'))
              <p class="text-danger">{{ $errors->first('name') }}</p>
              @endif
            </div>

            <div class="w-100">
              <label for="email" class="control-label"></label>
              <div class="input-group form-group-no-border {{ $errors->has('email') ? 'has-danger' : '' }}">
                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('auth.emailaddress')]) }}
              </div>
              @if ($errors->has('email'))
              <p class="text-danger">{{ $errors->first('email') }}</p>
              @endif
            </div>

            <div class="w-100">
              <label for="password" class="control-label"></label>
              <div class="input-group form-group-no-border {{ $errors->has('password') ? 'has-danger' : '' }}">
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('auth.password')]) }}
              </div>
              @if ($errors->has('password'))
              <p class="text-danger">{{ $errors->first('password') }}</p>
              @endif
            </div>

            <div class="w-100">
              <label for="password_confirmation" class="control-label"></label>
              <div
                class="input-group form-group-no-border {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' =>
                __('passwords.confirm')]) }}
              </div>
              @if ($errors->has('password_confirmation'))
              <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
              @endif
            </div>
            <div class="w-100">
              <label for="country" class="control-label"></label>
              <div class="input-group form-group-no-border {{ $errors->has('country') ? 'has-danger' : '' }}">
                {{ Form::select('country', $countries, 'co', ['class' => 'form-control select2' ]) }}
              </div>
              @if ($errors->has('country'))
              <p class="text-danger">{{ $errors->first('country') }}</p>
              @endif
            </div>
            <div class="w-100">
              @if($userFields)
              @foreach($userFields as $field)
              <label for="field_{{ $field->slug }}" class="control-label"></label>
              <div
                class="input-group form-group-no-border {{ $errors->has('field_'.$field->slug) ? 'has-danger' : '' }}">
                {{ Form::text('field_'.$field->slug, null, ['class' => 'form-control', 'placeholder' => $field->name])
                }}
              </div>
              @if ($errors->has('field_'.$field->slug))
              <p class="text-danger">{{ $errors->first('field_'.$field->slug) }}</p>
              @endif
              @endforeach
              @endif
            </div>
            <div class="width: 100%; text-align: right; padding-top: 20px;">
              <button class="btn" id="home_page" type="button" title="{{__('FlsModule::fls.nextPage')}}"><i
                  class="fas fa fa-home fs-1" style="color: #00157F" aria-hidden="true"></i></button>
              <button class="btn" id="airline_page" type="button" title="{{__('FlsModule::fls.nextPage')}}"><i
                  class="fa fa-arrow-circle-right fs-1" style="color: #00157F" aria-hidden="true"></i></button>
            </div>
          </div>

          {{-- Airline Details --}}
          <div class="airlineDetails_container d-none flex-column gap-2 align-items-center">
            {{-- <label for="airline" class="control-label">@lang('common.airline')</label> --}}
            <div class="input-group form-group-no-border {{ $errors->has('airline') ? 'has-danger' : '' }}">
              {{ Form::select('airline_id', $airlines, null , ['class' => 'form-control select2']) }}
            </div>
            @if ($errors->has('airline_id'))
            <p class="text-danger">{{ $errors->first('airline_id') }}</p>
            @endif

            <label for="home_airport" class="control-label"></label>
            <div class="input-group form-group-no-border {{ $errors->has('home_airport') ? 'has-danger' : '' }}">
              {{ Form::select('home_airport_id', $airports, null , ['class' => 'form-control select2']) }}
            </div>
            @if ($errors->has('home_airport_id'))
            <p class="text-danger">{{ $errors->first('home_airport_id') }}</p>
            @endif


            <label for="timezone" class="control-label"></label>
            <div class="input-group form-group-no-border {{ $errors->has('timezone') ? 'has-danger' : '' }}">
              {{ Form::select('timezone', $timezones, null, ['id'=>'timezone', 'class' => 'form-control select2',
              'placeholder' => __('common.timezone') ]) }}
            </div>
            @if ($errors->has('timezone'))
            <p class="text-danger">{{ $errors->first('timezone') }}</p>
            @endif


            @if (setting('pilots.allow_transfer_hours') === true)
            <label for="transfer_time" class="control-label">@lang('auth.transferhours')</label>
            <div class="input-group form-group-no-border {{ $errors->has('transfer_time') ? 'has-danger' : '' }}">
              {{ Form::number('transfer_time', 0, ['class' => 'form-control']) }}
            </div>
            @if ($errors->has('transfer_time'))
            <p class="text-danger">{{ $errors->first('transfer_time') }}</p>
            @endif
            @endif





            @if($captcha['enabled'] === true)
            <label for="h-captcha" class="control-label">@lang('auth.fillcaptcha')</label>
            <div class="h-captcha" data-sitekey="{{ $captcha['site_key'] }}"></div>
            @if ($errors->has('h-captcha-response'))
            <p class="text-danger">{{ $errors->first('h-captcha-response') }}</p>
            @endif
            @endif
            <div class="width: 100%; text-align: right; padding-top: 20px;">
              <button class="btn" id="personal_page" type="button" title="{{__('FlsModule::fls.previousPage')}}"><i
                  class="fa fa-arrow-circle-left fs-1" style="color: #00157F" aria-hidden="true"></i></button>
              <button class="btn" id="mgo_page" type="button" title="{{__('FlsModule::fls.nextPage')}}"><i
                  class="fa fa-arrow-circle-right fs-1" style="color: #00157F" aria-hidden="true"></i></button>
            </div>
          </div>

          {{-- MGO --}}
          <div class="mgoDetails_container d-none">
            <div>
              @include('auth.toc')
              <br />
            </div>

            <table>
              <tr>
                <td style="vertical-align: top; padding: 5px 10px 0 0">
                  <div class="input-group form-group-no-border">
                    {{ Form::hidden('toc_accepted', 0, false) }}
                    {{ Form::checkbox('toc_accepted', 1, null, ['id' => 'toc_accepted']) }}
                  </div>
                </td>
                <td style="vertical-align: top;">
                  <label for="toc_accepted" class="control-label">@lang('auth.tocaccept')</label>
                  @if ($errors->has('toc_accepted'))
                  <p class="text-danger">{{ $errors->first('toc_accepted') }}</p>
                  @endif
                </td>
              </tr>
              <tr>
                <td>
                  <div class="input-group form-group-no-border">
                    {{ Form::hidden('opt_in', 0, false) }}
                    {{ Form::checkbox('opt_in', 1, null) }}
                  </div>
                </td>
                <td>
                  <label for="opt_in" class="control-label">@lang('profile.opt-in-descrip')</label>
                </td>
              </tr>
            </table>
            <div class="d-inline" style="width: 50%; text-align: right; padding-top: 20px;">
              <button class="btn" id="back_page" type="button" title="{{__('FlsModule::fls.previousPage')}}"><i
                  class="fa fa-arrow-circle-left fs-1" style="color: #00157F" aria-hidden="true"></i></button>
            </div>
            <div class="d-inline" style="d-inline text-align: right; padding-top: 20px;">
              {{ Form::submit(__('auth.register'), [
              'id' => 'register_button',
              'class' => 'btn',
              'style' => 'background: #000a54; color: #FFFFFF',
              'disabled' => true,
              ]) }}
            </div>
          </div>
          {{-- END MGO --}}





        </div>
      </div>

      {{ Form::close() }}
      <div class="h-25"></div>
    </div>
  </div>
  @endsection

  @section('scripts')
  @if ($captcha['enabled'])
  <script src="https://hcaptcha.com/1/api.js" async defer></script>
  @endif

  <script>
    $('#toc_accepted').click(function () {
      if ($(this).is(':checked')) {
        $('#register_button').removeAttr('disabled');
      } else {
        $('#register_button').attr('disabled', 'true');
      }
    });
  </script>


  <script>
    $('#airline_page').click(function(){
      $(".personalInfo_container").addClass('d-none');
      $('#subtitle_form').text('Airline info')
      $(".airlineDetails_container").removeClass('d-none');
      $(".airlineDetails_container").addClass('d-flex');
    });
    
    $('#back_page').click(function(){
      $(".mgoDetails_container").addClass('d-none');
      $('#subtitle_form').text('Airline info')
      $(".airlineDetails_container").removeClass('d-none');
      $(".airlineDetails_container").addClass('d-flex');
    });


    $('#mgo_page').click(function(){
      $('.airlineDetails_container').addClass('d-none');
      $('#subtitle_form').text('MGO Details');
      $('.mgoDetails_container').removeClass('d-none');
    });

    $('#personal_page').click(function(){
      $(".airlineDetails_container").addClass('d-none');
      $('#subtitle_form').text('Personal info')
      $(".personalInfo_container").removeClass('d-none');
      $(".airlineDetails_container").removeClass('d-flex');
    })
  </script>


  @include('scripts.airport_search')
</div>
@endsection