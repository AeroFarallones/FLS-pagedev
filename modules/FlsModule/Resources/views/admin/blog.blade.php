@php
$aviones = ["NULL","A320", "B738", "A319", "A321"]
@endphp


@extends('admin.app')
@section('title', 'Fls Blogs Aircraft')

@section('content')
<div class="w-100 h-100">
  <div class="h-100 w-100 ">
    <div id="pjax_news_wrapper">
      <div class="card border-blue-bottom">
        <div class="content">
          <div class="header">
            <h4 class="title">Add News</h4>
          </div>
          {{ Form::open(['route' => 'admin.dashboard.news', 'method' => 'post', 'class' => 'pjax_news_form']) }}
          <table class="table">
            <tr>
              <td>{{ Form::label('aircraft', 'Aircraft:') }}</td>
              <td>{{ Form::select('aircraft', $aviones, ['class' => 'form-control rounded-pill airport_search
                select-jumpseat']) }}</td>
            </tr>
            <tr>
              <td>{{ Form::label('body', 'Body:') }}</td>
              <td>{!! Form::textarea('body', '', ['id' => 'news_editor', 'class' => 'editor']) !!}</td>
            </tr>
          </table>
          <div class="text-right">
            {{ Form::button('<i class="fas fa-plus-circle"></i>&nbsp;add', ['type' => 'submit', 'class' => 'btn
            btn-success btn-s']) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
    @section('scripts')
    @parent
    <script src="{{ public_asset('assets/vendor/ckeditor4/ckeditor.js') }}"></script>
    <script>
      $(document).ready(function () { CKEDITOR.replace('news_editor'); });
    </script>
    @endsection

  </div>

  @endsection