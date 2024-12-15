@extends('layout.layout', ['title' => $course->subject_code . ' ' . $course->course_code . ' ' . $course->title])

@section('head-content')
    <link rel="stylesheet" href="/css/course.css">
    <link rel="stylesheet" href="/css/note.css">
@endsection

@section('body-content')
    <main id = "content">
        <!--Course Title-->
        <h1 id = "header">
            <span id = "text">
                {{ $course->subject_code . ' ' . $course->course_code . ' ' . $course->title }}
            </span>
        </h1>

        <!--Available Notes-->
        <section class = "flexy">
            <h3 class="light-text" id = "notesHeader">Available Notes</h3>
            <!--Actual Notes-->
            <div class="note-section">
                <div id = "sectionStyles">
                    @if(count($resources) !== 0)
                        @foreach ($resources as $resource)
                            <div class="note-preview" style="margin: 12px 24px 24px 24px;" data-resource={{ $resource->resource }}  data-is_author={{ $resource->is_author }}>
                                <div class="note-information">
                                    <form class="toggle-star" action="/resource/toggle_star" method="post">
                                        @csrf
                                        <input type="hidden" name="resource" value="{{ $resource->resource }}">
                                        <input type="hidden" name="is_starred" value="{{ $resource->is_starred }}">
                                        <button type="submit">
                                            <!--Stars-->
                                            <div class="star-container">
                                                <iron-icon icon="star-border" style="color: var(--main-color);"></iron-icon>
                                                <iron-icon icon="star" style="color: var(--main-color);"></iron-icon>
                                            </div>
                                        </button>
                                    </form>
                                    <div  class = "title">
                                        <div>{{ $resource->title }}</div>
                                    </div>
                                </div>
                                <div class = "noteStuff"></div>
                                <div class = "imaging">
                                    <img class="note-img" src="/img/{{ $resource->img_name }}.png">
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div id="empty-note-warning">
                            <h2>Oh no! There are no notes uploaded to this class yet!</h2>
                            <div style="font-style: italic;">Add this course to your dashboard via <a href="/course" style="color: var(--light-text-color);"><b>Courses</b></a> in order to upload notes files within <a href="/upload_resource" style="color: var(--light-text-color);"><b>Add Resource</b></a>.</div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <script src="/js/starred_resources.js"></script>
    </main>
@endsection