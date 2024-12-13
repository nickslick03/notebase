@extends('layout.layout', ['title' => 'Course List'])

@section('head-content')
    <link rel="stylesheet" href="/css/courselist.css">
@endsection

@section('body-content')
    <main id = "content">
        <h2 id = "title">Course List</h2>
        <!--Search Bar-->
        <form id="search-form">
            <div id = "display">
                <div id = "search">
                    <input id="search-text" type="text" placeholder="Search" class = "bar">  
                    <button type="submit">
                        <iron-icon icon="icons:search" id = "searchIcon"></iron-icon>
                    </button>
                </div>  
            </div>    
        </form>     
        <!-- Classes -->
        <section id = "classList">
            @if(session()->has('user'))
                <div class="light-text" id = "classText">
                    Click the plus button beside a class to add it to your enrolled courses
                </div>
            @endif
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Title</th>
                            @if (session()->has('user'))
                                <th class="text-center">Add / Remove</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody id="courses">
                        @isset($courses)
                            @foreach ($courses as $course)
                                <tr
                                    data-subject_code="{{ $course->subject_code}}"
                                    data-course_code="{{ $course->course_code }}"
                                    data-title="{{ $course->title }}"
                                >
                                    <td class="course-td">
                                        <a class = "courseLinks" href="/course/{{ $course->course }}" id = "links">
                                            {{ $course->subject_code }} {{ $course->course_code }}
                                        </a>
                                    </td>
                                    <td >
                                        {{ $course->title }}
                                    </td>
                                    <!--Add and Drop Classes-->
                                    @if (session()->has('user'))
                                        <td class="text-center">
                                            <form action="course/toggle" method="post">
                                                @csrf
                                                <input type="hidden" name="course" value="{{ $course->course }}">
                                                <input type="hidden" name="add" value="{{ !$course->is_enrolled }}">
                                                <button type="submit" data-is_enrolled="{{ $course->is_enrolled }}">
                                                    <iron-icon icon="add" class="plus-icon"></iron-icon>
                                                    <iron-icon icon="clear" class="plus-icon"></iron-icon>
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>    
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <script src="/js/courselist.js"></script>
@endsection