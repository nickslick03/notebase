@extends('layout.layout', ['title' => 'Edit_Resource'])


@section('head-content')
    <link rel="stylesheet" href="/css/form.css">
@endsection


@section('body-content')
<h1 style="text-align: center;"> Edit Resource</h1>
   <form action="" method="post" enctype="multipart/form-data" style="border: 2px solid #d4d4d4; width: 400px; padding: 12px; margin: auto auto 24px auto; border-radius: 20px;" id="edit-resource">
        @csrf
        <input type="hidden" name="resource" value="{{ $resource->resource }}">
        <div class="mb-3">
            <p>Here is the current file: </p>
            <br>
            <div id="current-resource-display"></div>
            <br>
            <p>If you want to change the resource, add a new file: </p>
        </div>
        <input type="file" id="file" name="file" accept="text/plain,image/*,application/pdf">
        @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <br>
        <label for="course">Course:</label>
        <br>
        <select name="course" id="course">
            @foreach ($courses as $course)
                <option value="{{ $course->course }}" {{ $course->course === $resource->course ? 'selected' : ''}}>
                    {{ $course->title }}
                </option>
            @endforeach
        </select>
        @error('course')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        </select>
        <div class="mb-3">
            <label for="title">Title:</label>
            <br>
            <input type="text" id="title" name="title" value ="{{ $resource->title }}" maxlength="255" required><br><br>
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="description">Description:</label>
            <br>
            <input type="text" id="description" name="description" value="{{ $resource->description }}" maxlength="255" required><br><br>
        </div>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit">
   </form>
   <script src="/js/edit_resource.js"></script>
@endsection
