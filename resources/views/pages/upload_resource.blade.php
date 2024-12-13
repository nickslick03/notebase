@extends('layout.layout', ['title' => 'Upload Resource'])


@section('head-content')
   <link rel="stylesheet" href="css/upload_resources.css">
@endsection


@section('body-content')
<h1 style="text-align: center;">Resource Upload</h1>
    <form action="/upload_resource/create" method="post" enctype="multipart/form-data" style="border: 2px solid #d4d4d4; width: 400px; padding: 12px; margin: auto auto 24px auto; border-radius: 20px;">
    @csrf
    
        <div class="light-text" style="font-style: italic; text-align: center;">Don't see the course you're looking for? <a href="/course" style="color: var(--light-text-color);"><b>Add the course here</b></a> and then upload.</div>
        <div class="form-item" style="display: flex; flex-direction: column; justify-content: center;">
            <label for="course">Select a Course:</label>
            <!--Enrolled Courses to select-->
            <select name="course" id="course">
                @foreach ($courses as $course)
                    <option value="{{ $course->course }}">
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div style="display: flex; flex-direction: column; justify-content: center;">
            <div class="form-item">
                <input type="file" id="file" name="file" accept="text/plain,image/*,application/pdf">
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-item" style="display: flex; flex-direction: column;">
                <label for="title" style="margin-bottom: 4px;">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-item" style="display: flex; flex-direction: column;">
                <label for="description" style="margin-bottom: 4px;">Description:</label>
                <input type="text" id="description" name="description" value="{{ old('description') }}" required>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-item" style="display: flex; justify-content: center;">
                <input type="submit" style="background: var(--main-color); border: none; color: var(--text-color);">
            </div>
        </div>
    </form>
@endsection
