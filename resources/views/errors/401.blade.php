@extends('layout.layout', ['title' => '401 Unauthorized'])

@section('head-content')
@endsection

@section('body-content')
    <h1>401 Unauthorized</h1>
    <p>You cannot access {{ request()->url() }} because you have not logged in.</p>
@endsection
