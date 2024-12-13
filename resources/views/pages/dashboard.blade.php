@extends('layout.layout', ['title' => 'Dashboard'])

@section('head-content')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('body-content')
    <div style="height: 100%; width: 100%;">
        <main style="padding: 0 12px 12px 12px;">
            <h1 class="section-title my-4">Dashboard</h1>
            <section>
                <h2 class="section-title">My Courses</h2>
                <!-- Cards -->
                <div style="display: flex; align-items: center;">
                    <div style="display: flex; overflow-x: scroll; width: 100%;">
                        @isset($courses)
                            @foreach ($courses as $course)
                                <a href="/course/{{ $course->course }}">
                                    <div class="course-card">
                                        <div class="card-photo">
                                            <img class="card-img">
                                        </div>
                                        <div class="card-text">
                                            <div style="margin: auto;">
                                                <b><div>{{ $course->title }}</div></b>
                                                <div>{{ $course->subject_code . ' ' . $course->course_code . ' ' . $course->title }}</div>
                                            </div>
                                        </div>
                                    </div>    
                                </a>
                            @endforeach
                        @else
                                <!-- NO COURSES -->
                        @endisset
                    </div>
                </div>
            </section>
            <section>
                <h2 class="section-title mt-4">Starred Resources</h2>
                <!-- Starred Notes -->
                <div style="overflow-x: auto;">
                    <div style="display: flex;">
                        @isset($starred_resources)
                            @foreach ($starred_resources as $resource)
                                <div class="note-preview">
                                    <div class="note-information">
                                        <form class="toggle-star" action="/resource/toggle_star" method="post">
                                            @csrf
                                            <input type="hidden" name="resource" value="{{ $resource->resource }}">
                                            <input type="hidden" name="is_starred" value="1">
                                            <button type="submit">
                                                <div style="background: white; width: 40px; border-radius: 20px;">
                                                    <iron-icon icon="star-border" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                                    <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                                </div>
                                            </button>
                                        </form>
                                        <div style="padding: 0 12px; display: flex; margin: auto;">
                                            <div style="margin-right: 4px;">{{ $resource->code }}</div>
                                            <div>{{ $resource->title }}</div>
                                        </div>
                                    </div>
                                    <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                                </div>
                            @endforeach
                        @else
                            <!-- NO STARRED RESOURCES -->
                        @endisset
                    </div>
                </div>
            </section>
        </main>
    </div>
<script src="/js/starred_resources.js"></script>
@endsection
