@extends('layout.layout', ['title' => 'Upload Resource'])

@section('head-content')
    <style>
    </style>
@endsection

@section('body-content')
<h1>Resource Upload</h1>
    <form>
    <label for="course">Select a Course:</label>
    <!--Enrolled Courses to select-->
        <select name="course" id="course">
            <option value="course1">ART 101</option>
            <option value="course2">CIS 281</option>
            <option value="course3">CIS 291</option>
        </select>
        <br>
        <br>
        <input type="file" id="file" name="file">
        <br>
        <br>
        <label for="title">Title:</label>
        <br>
        <input type="text" id="title" name="title"><br><br>
        <label for="description">Description:</label>
        <br>
        <input type="text" id="description" name="description"><br><br>
        <input type="submit">
    </form>
@endsection