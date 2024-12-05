@extends('layout.layout', ['title' => 'Welcome'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
<html>
    <head>
    <style>
    <link rel="stylesheet" href="css/index.css">
    </style>
    </head>
        <table id = "topBar" width = "100%">
            <td id = "mainText">Welcome to Notebase!</td>
            <td><a class = "nav" href ="login">Login</a></td>
        </table>
    </div>
    <br>
    <br>
    <br>
    <p id = "quote">"Without Notebase I never would've passed my econ class!" - University Student</p>
    <span id = "button"><a href = "signup"><button type="button">Register Here!</button></a></span>
    <br>
    <br>
   
 </html>
    @include('partials.footer')
@endsection
