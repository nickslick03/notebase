@extends('layout.layout', ['title' => '403 Forbidden'])

@section('head-content')
@endsection

@section('body-content')
    <h1>401 Unauthorized</h1>
    <p>{{ $exception->getMessage() }}</p>
@endsection
