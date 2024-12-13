@extends('layout.layout', ['title' => 'Upload Resource'])


@section('head-content')
   <link rel="stylesheet" href="css/form.css">
@endsection


@section('body-content')
<h1>Resource Upload</h1>
    <form action="/upload_resource/create" method="post" enctype="multipart/form-data" style="border: 2px solid #d4d4d4; width: 400px; padding: 12px; margin: auto auto 24px auto; border-radius: 20px;">
    @csrf
        <div class="light-text" id = "courseText">Don't see the course you're looking for? <a href="/course" class = "courseLink"><b>Add the course here</b></a> and then upload.</div>
        <div class="form-item" class = "flexy">
            <!--Enrolled Courses to select-->
            <label for="course">Select a Course:</label>
            <select name="course" id="course">
                @foreach ($courses as $course)
                    <option value="{{ $course->course }}">
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class = "flexy">
            <!--File Upload-->
            <div class="form-item">
                <input type="file" id="file" name="file" accept="text/plain,image/*,application/pdf">
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--File Title-->
            <div class="form-item" class= "extras">
                <label for="title" class = "labelMargin">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--File Description-->
            <div class="form-item" class = "extras">
                <label for="description" class = "labelMargin">Description:</label>
                <input type="text" id="description" name="description" value="{{ old('description') }}" required>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--Submit Button-->
            <div style="display: flex; justify-content: center; margin-top: 12px; margin-bottom: 12px;">
                <input type="submit" class="btn btn-primary" style="background: var(--main-color); border: none; color: var(--text-color);">
            </div>
        </div>
    </form>
@endsection
