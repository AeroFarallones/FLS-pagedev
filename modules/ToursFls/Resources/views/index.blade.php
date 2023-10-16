@extends('toursfls::layouts.frontend')

@section('title', 'ToursFls')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {{ config('toursfls.name') }}
    </p>
@endsection
