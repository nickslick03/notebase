@extends('layout.layout', ['title' => 'My Resources'])

@section('head-content')
    <link rel="stylesheet" href="/css/note.css">
@endsection

@section('body-content')
    <div style="height: 100%; width: 100%;">
        <main style="padding: 0 12px 12px 12px;">
            <!-- Main Title -->
            <h1 class="section-title my-4">My Resources</h1>
            <!-- Resources -->
            <section>
                <div style="overflow-x: auto;">
                    <div style="display: flex; flex-direction: column; align-items: flex-start;">
                        @if(count($resources) !== 0)
                        <!-- If there are starred resources, iterate through them and create a tag for each -->
                            @foreach ($resources as $resource)
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
                                        <img class="note-img" src="/img/{{ $resource->img_name }}.png">
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <!-- If there are no starred resources, provide a prompt on where to find and star resources -->
                            <div style="display: flex; flex-direction: column;">
                                <div class="light-text" style="font-style: italic; margin:0 14px 6px 14px;">
                                    Begin <a href="/upload_resources" style="color: var(--main-color)">
                                    <b>uplaoding resources</b></a>. You need to be enrolled in the <a href="/course" style="color: var(--main-color)">course</a> want to upload resources to.
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
