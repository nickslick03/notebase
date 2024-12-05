@extends('layout.layout', ['title' => 'login'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
    @include('partials.header')
    <h1>Log In</h1>
    @include('partials.footer')
@endsection
