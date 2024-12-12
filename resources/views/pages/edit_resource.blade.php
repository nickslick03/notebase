@extends('layout.layout', ['title' => 'Edit_Resource'])

@section('head-content')
    <style>
    </style>
@endsection

@section('body-content')
<h1>Edit Resource</h1>
    <form>
        <p>Here is the current file: </p>
        <br>
        <img src = "">
        <br>
        <p>If you want to change the note file upload a new note: </p>
        <input type="file" id="file" name="file">
        <br>
        <br>
        <label for="title">Title:</label>
        <br>
        <input type="text" id="title" name="title" value =""><br><br>
        <label for="description">Description:</label>
        <br>
        <input type="text" id="description" name="description" value=""><br><br>
        <input type="submit">
    </form>
@endsection