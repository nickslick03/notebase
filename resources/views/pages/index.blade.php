@extends('layout.layout', ['title' => 'Welcome'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
    <p id="quote">"Without Notebase I never would've passed my econ class!" - University Student</p>
    <span id="button">
        <a href="signup">
            <button type="button">Register Here!</button>
        </a>
    </span>
@endsection
