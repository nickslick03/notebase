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
                    @foreach ($resources as $resource)
                        <div class="note-preview" style="margin: 12px 24px 24px 24px;" data-resource={{ $resource->resource }}  data-is_author={{ $resource->is_author }}>
                            <div class="note-information">
                                <form class="toggle-star" action="/resource/toggle_star" method="post">
                                    @csrf
                                    <input type="hidden" name="resource" value="{{ $resource->resource }}">
                                    <input type="hidden" name="is_starred" value="{{ $resource->is_starred }}">
                                    <button type="submit">
                                        <!--Stars-->
                                        <div style="background: white; padding: 4px; width: fit-content; border-radius: 20px;">
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
                                <img class="note-img" src="/img/img.png">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <script src="/js/starred_resources.js"></script>
    </main>
@endsection