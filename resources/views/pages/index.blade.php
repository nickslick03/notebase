@extends('layout.layout', ['title' => 'Welcome'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
    <table id="topBar">
        <td id="mainText">Welcome to Notebase!</td>
        <td><a class="nav" href ="login">Login</a></td>
    </table>
    </div>
    <p id="quote">"Without Notebase I never would've passed my econ class!" - University Student</p>
    <span id="button"><a href="signup"><button type="button">Register Here!</button></a></span>
h1>
h1>
    @include('partials.footer')
@endsection
