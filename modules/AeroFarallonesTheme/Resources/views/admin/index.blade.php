@extends('aerofarallonestheme::layouts.admin')

@section('title', 'AeroFarallonesTheme')
@section('actions')
    <li>
        <a href="{{ url('/aerofarallonestheme/admin/create') }}">
            <i class="ti-plus"></i>
            Add New</a>
    </li>
@endsection
@section('content')
    <div class="card border-blue-bottom">
        <div class="header"><h4 class="title">Admin Scaffold!</h4></div>
        <div class="content">
            <p>This view is loaded from module: {{ config('aerofarallonestheme.name') }}</p>
        </div>
    </div>
@endsection
