@extends('layout.layout', ['title' => 'Server Error'])

@section('head-content')
@endsection

@section('body-content')
    <h1>Server Error</h1>
    <p>{{ $exception->getMessage() }}</p>
@endsection
