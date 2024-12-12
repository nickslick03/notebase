@extends('layout.layout', ['title' => 'Welcome'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
    <div style="display: flex; flex-direction: row; margin: 12px; justify-content: center;">
        <img src="https://www.fastweb.com/uploads/article_photo/photo/2038862/Taking-Notes.jpeg" style="margin: 12px; border-radius: 20px;">
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin: auto;">
            <h3 class="light-text" style="width: 500px; align-text: center; margin: 0 auto 12px auto; padding: 0 12px 12px 12px; line-height: 150%; text-indent: 40px; text-align: justify;">
                Notebase is a convenient way to share notes with classmates and collaborate to bolster understanding. Register to <b>upload</b> your own notes,
                <b>enroll</b> in courses, or <b>star</b> resources to personalize your experience!</h3>
            <a href="/register">
                <button id="button" type="button">Create an Account Now</button>
            </a>
        </div>
    </div>
    <div style="background: #f2f2f2; padding: 20px; border-radius: 30px; margin: 24px 12px 34px 12px;">
        <h3>Student Approved</h3>
        <p id="quote">"Without Notebase I never would've passed my econ class!" - University Student</p>
    </div>
@endsection