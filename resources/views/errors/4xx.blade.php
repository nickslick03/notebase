@extends('layout.layout', ['title' => 'User Error'])

@section('head-content')
@endsection

@section('body-content')
    <h1>User Error</h1>
    <p>{{ $exception->getMessage() }}</p>
@endsection
