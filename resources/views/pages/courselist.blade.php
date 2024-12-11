@extends('layout.layout', ['title' => 'Course List'])

@section('head-content')
    <link rel="stylesheet" href="/css/courselist.css">
@endsection

@section('body-content')
    <main style="padding: 12px;">
        <h2 style="text-align: center; margin-bottom: 12px;">Course List</h2>
        <form id="search-form">
            <div style="display: flex; justify-content: center;">
                <div style="display: flex; padding: 4px; border-radius: 20px; background-color: var(--light-text-color); width: fit-content;">
                    <input id="search-text" type="text" placeholder="Search" style="background: white; border: none; border-radius: 20px; padding: 0 4px; width: 100%; max-width: 300px;">  
                    <button type="submit">
                        <iron-icon icon="icons:search" style="margin-right: 6px; color: white"></iron-icon>
                    </button>
                </div>  
            </div>    
        </form>     
        <!-- Classes -->
        <section style="margin: 24px; background: #f5f5f5; padding: 12px; border-radius: 10px;">
            <div class="light-text" style="text-align: center; font-style: italic; margin-bottom: 10px;">Click the plus button beside a class to add it to your enrolled courses</div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Title</th>
                            <th class="text-center">Add</th>
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
                                        <a href="/course/{{ $course->course }}" style="font-weight: 500; color: var(--text-color);">
                                            {{ $course->subject_code }} {{ $course->course_code }}
                                        </a>
                                    </td>
                                    <td >
                                        {{ $course->title }}
                                    </td>
                                    <td class="text-center">
                                        <form action="course/add" method="post">
                                            <input type="hidden" name="course" value="{{ $course->course}}">
                                            <button type="submit">
                                                <iron-icon icon="add" class="plus-icon"></iron-icon>
                                            </button>
                                        </form>
                                    </td>
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