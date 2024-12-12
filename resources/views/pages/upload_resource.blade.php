@extends('layout.layout', ['title' => 'Upload Resource'])


@section('head-content')
   <style>
        input, select {
           max-width: 400px;
       }
   </style>
@endsection


@section('body-content')
<h1>Resource Upload</h1>
    <form action="/upload_resource/create" method="post" enctype="multipart/form-data">
    
    @csrf
        
    <label for="course">Select a Course:</label>
    <!--Enrolled Courses to select-->
        <select name="course" id="course">
            @foreach ($courses as $course)
                <option value="{{ $course->course }}">
                    {{ $course->title }}
                </option>
            @endforeach
        </select>
        <div>Don't see the course you're looking for? <a href="/course">Add the course here</a> and then upload.</div>
        <br>
        <br>
        <input type="file" id="file" name="file" accept="text/plain,image/*,application/pdf">
        @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <br>
        <label for="title">Title:</label>
        <br>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <br>
        <label for="description">Description:</label>
        <br>
        <input type="text" id="description" name="description" value="{{ old('description') }}" required>
        <br>
        <br>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
    </form>
@endsection
