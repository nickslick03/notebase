@extends('layout.layout', ['title' => $course->subject_code . ' ' . $course->course_code . ' ' . $course->title])

@section('head-content')
    <link rel="stylesheet" href="/css/course.css">
@endsection

@section('body-content')
    <main style="padding: 12px;">
        <h1 style="text-align: center; margin: 12px; color: var(--text-color); display: flex; flex-direction: column;">
            <span style="color: var(--light-text-color); font-weight: 500;">
                {{ $course->subject_code . ' ' . $course->course_code . ' ' . $course->title }}
            </span>
        </h1>

        <section style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <h3 class="light-text" style="opacity: .7; text-align: center;">Available Notes</h3>
            <div class="note-section">
                <div style="display: flex; flex-wrap: wrap;">
                    @foreach ($resources as $resource)
                        <div class="note-preview" style="margin: 12px 24px 24px 24px;" data-resource={{ $resource->resource }}  data-is_author={{ $resource->is_author }}>
                            <div class="note-information">
                                <form class="toggle-star" action="/resource/toggle_star" method="post">
                                    @csrf
                                    <input type="hidden" name="resource" value="{{ $resource->resource }}">
                                    <input type="hidden" name="is_starred" value="{{ $resource->is_starred }}">
                                    <button type="submit">
                                        <div style="background: white; padding: 4px; width: fit-content; border-radius: 20px;">
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
                            <div style="box-shadow: 0 0px 4px 1px #c2c2c2; display: flex; flex-direction: column; justify-content: center; align-items: center; border-radius: 50px; min-width: 75px; min-height: 75px; max-width: 75px; max-height: 75px;">
                                <img class="note-img" src="/img/img.png">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @include('partials.modal')
        <script src="/js/starred_resources.js"></script>
    </main>
@endsection