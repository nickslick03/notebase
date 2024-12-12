@extends('layout.layout', ['title' => $course->subject_code . ' ' . $course->course_code . ' ' . $course->title])

@section('head-content')
    <link rel="stylesheet" href="/css/course.css">
@endsection

@section('body-content')
    <!-- Course Chapters -->
    <main style="padding: 12px;">
        <h1 style="text-align: center; margin: 12px; color: var(--text-color); display: flex; flex-direction: column;">
            <span style="color: var(--light-text-color); font-weight: 500;">
                {{ $course->subject_code . ' ' . $course->course_code . ' ' . $course->title }}
            </span>
        </h1>

        <!-- 
        
        Instructions on Page Interaction:

            The chapter section should be repeated for the number of chapters
            The official notes are differentiated with the yellow line under the title (this may be changed to be more visually helpful)
            This differentiation is because offical resources might be moved to starred if you star it, but we still want to know it's official

            Only the orange circular part of the chapter title should be visible. When it's clicked on, then we should expand what we see now

            When clicking on the resources, a dialog box should pop up with a zoomed in version of the notes, with a download button on top of the image
            I (Annika) can add this functionality in with Javascript as well as the title clicking/expanding, but am posting this as-is right now to allow us to move on/get
            the basic visuals set first
         
        -->

        <!-- First Chapter -->
        <section class="chapter">
            <!-- Show those uploaded by professor first, mark official -->
            <div class="chapter-title"><h2>Chapter 1</h2></div>

            <div class="note-section">

                <div>
                    <div style="display: flex; align-items: center; margin: 0 12px;"><h2 style="color: var(--text-color);">Starred</h2><iron-icon icon="icons:expand-more"></iron-icon></div>
                    <div class="note-preview">
                        <div class="note-information">
                            <div style="background: white; width: 35px; border-radius: 20px;">
                                <iron-icon icon="star" style="padding: 5px; color: var(--main-color);"></iron-icon>
                            </div>
                            <div style="padding: 0 12px; display: flex; margin: auto;">
                                <div>Step-by-Step Single Sample</div>
                            </div>
                        </div>
                        <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                    </div>
                </div>

                <div style="display: flex; flex-direction: column;">
                    <div style="display: flex; align-items: center; margin: 0 12px;"><h2 style="color: var(--text-color);">Official</h2><iron-icon icon="icons:expand-more"></iron-icon></div>
                    <div style="display: flex; flex-wrap: wrap;">
                        <div class="note-preview">
                            <div class="official note-information">
                                <div style="background: white; width: 35px; border-radius: 20px;">
                                    <iron-icon icon="star-border" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                </div>
                                <div style="padding: 0 12px; display: flex; margin: auto;">
                                    <div>6 Step Hypothesis Testing</div>
                                </div>
                            </div>
                            <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                        </div>
                    </div>
                </div>
                <div>
                    <div style="display: flex; align-items: center; margin: 0 12px;"><h2 style="color: var(--text-color);">Other</h2><iron-icon icon="icons:expand-more"></iron-icon></div>
                    <div style="display: flex; flex-wrap: wrap;">
                        @foreach ($resources as $resource)
                            <div class="note-preview" data-resource="{{ $resource->resource }}" data-filename="{{ $resource->filename }}" data-file_extension="{{ $resource->file_extension }}">
                                <div class="official note-information">
                                    <div style="background: white; width: 35px; border-radius: 20px;">
                                        <iron-icon icon="star-border" style="padding: 5px; color: var(--main-color);"></iron-icon>
                                    </div>
                                    <div style="padding: 0 12px; display: flex; margin: auto;">
                                        <div>{{ $resource->title }}</div>
                                    </div>
                                </div>
                                <img class="note-img" src="https://wiki.theplaz.com/w/images/thumb/American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg/300px-American_Studies_Chap_17_-_Reconstruction_-_Politics_of_Reconstruction_Page_1.jpg">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @include('partials.modal')
    </main>
@endsection