@extends('layout.layout', ['title' => 'Welcome'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
    <div id="topSec">
        <!--Image-->
        <img src="https://booksrun.com/blog/wp-content/uploads/2019/03/13031-1020x612.jpg">
        <!--Intro Text with Register Button-->
        <div id="introText">
            <p class="light-text" id="text">
                Notebase is a convenient way to share notes with classmates and collaborate to bolster understanding. Register to upload your own notes,
                enroll in courses, or star resources to personalize your experience!
            </p>
            <a href="/register">
                <button id="button" type="button">Create an Account Now</button>
            </a>
        </div>
    </div>
    <!--Student Quote-->
    <div id="quoting">
        <h3>Student Approved</h3>
        <p id="quote">"Without Notebase I never would've passed my econ class!" - University Student</p>
    </div>
@endsection