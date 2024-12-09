@extends('layout.layout', ['title' => '401 Not Found'])

@section('head-content')
@endsection

@section('body-content')
    <h1>404 Not Found</h1>
    <p>{{ $exception->getMessage() }}</p>
@endsection
