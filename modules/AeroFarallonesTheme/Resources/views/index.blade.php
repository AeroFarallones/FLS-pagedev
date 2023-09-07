@extends('aerofarallonestheme::layouts.frontend')

@section('title', 'AeroFarallonesTheme')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {{ config('aerofarallonestheme.name') }}
    </p>
@endsection
