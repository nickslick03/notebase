@extends('layout.layout', ['title' => 'signup'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
    @include('partials.header')
    <h1>Sign up</h1>
    @include('partials.footer')
@endsection
