@extends('layout.layout', ['title' => 'Dashboard'])

@section('head-content')
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/note.css">
@endsection

@section('body-content')
    <div style="height: 100%; width: 100%;">
        <main style="padding: 0 12px 12px 12px;">
            <!-- Main Title -->
            <h1 class="section-title my-4">Dashboard</h1>
            <!-- Courses -->
            <section>
                <h2 class="section-title">My Courses</h2>
                <!-- Cards -->
                <div style="display: flex; align-items: center;">
                    <div id="card-container" style="display: flex; overflow-x: scroll; width: 100%;">
                        @if(count($courses) !== 0)
                        <!-- If there are enrolled courses, iterate through them and generate a card for each -->
                            @foreach ($courses as $course)
                                <a href="/course/{{ $course->course }}">
                                    <div class="course-card">
                                        <div class="card-photo">
                                            <img class="card-img">
                                        </div>
                                        <div class="card-text">
                                            <div style="margin: auto;">
                                                <b><div class="stop-overflow">{{ $course->title }}</div></b>
                                                <div class="stop-overflow">{{ $course->subject_code . ' ' . $course->course_code }}</div>
                                            </div>
                                        </div>
                                    </div>    
                                </a>
                            @endforeach
                        @else
                        <!-- If there are no enrolled courses, display a prompt to enroll alongside an empty card -->
                            <div style="display: flex; flex-direction: column;">
                                <div class="light-text" style="font-style: italic; margin: 0 14px 6px 14px;">
                                    You are not enrolled in any courses yet. Click below to enroll!
                                </div>
                                <a href="/course">
                                    <div class="empty-card">
                                        <div style="font-size: 120px; color: #c4c4c4;">+</div>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
            <!-- Starred Resources -->
            <section>
                <h2 class="section-title mt-4">Starred Resources</h2>
                <!-- Starred Notes -->
                <div style="overflow-x: auto;">
                    <div style="display: flex;">
                        @if(count($starred_resources) !== 0)
                        <!-- If there are starred resources, iterate through them and create a tag for each -->
                            @foreach ($starred_resources as $resource)
                                <div class="note-preview" style="margin: 4px 14px;" data-resource={{ $resource->resource }}  data-is_author={{ $resource->is_author }}>
                                    <div class="note-information">
                                        <form class="toggle-star" action="/resource/toggle_star" method="post">
                                            @csrf
                                            <input type="hidden" name="resource" value="{{ $resource->resource }}">
                                            <input type="hidden" name="is_starred" value="1">
                                            <button type="submit">
                                                <div class="star-container">
                                                    <iron-icon icon="star-border" style="color: var(--main-color);"></iron-icon>
                                                    <iron-icon icon="star" style="color: var(--main-color);"></iron-icon>
                                                </div>
                                            </button>
                                        </form>
                                        <div style="padding: 0 12px; display: flex; margin: auto;">
                                            <div>{{ $resource->title }}</div>
                                        </div>
                                    </div>
                                    <div style="height: 3px; width: 25px; background: #d4d4d4;"></div>
                                    <div class="imaging">
                                        <img class="note-img" src="/img/img.png">
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <!-- If there are no starred resources, provide a prompt on where to find and star resources -->
                            <div style="display: flex; flex-direction: column;">
                                <div class="light-text" style="font-style: italic; margin:0 14px 6px 14px;">
                                    Begin starring resources by visiting the <a href="/course" style="color: var(--main-color)">
                                    <b>course page</b></a>. You do not need to be enrolled in any classes to star resources.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        </main>
    </div>
<script src="/js/starred_resources.js"></script>
@endsection
