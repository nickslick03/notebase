@extends('layout.layout', ['title' => 'Upload Resource'])


@section('head-content')
   <style>
        input, select {
           max-width: 400px;
       }
   </style>
@endsection


@section('body-content')
<h1 style="text-align: center;">Resource Upload</h1>
   <form action="" method="post" style="border: 2px solid #d4d4d4; width: 400px; padding: 12px; margin: auto auto 24px auto; border-radius: 20px;">
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
       <div class="mb-3">
       <label for="title">Title:</label>
       <br>
       <input type="text" id="title" name="title"><br><br>
       </div>
       <div class="mb-3">
       <label for="description">Description:</label>
       <br>
       <input type="text" id="description" name="description"><br><br>
       </div>
       <input type="submit" class="mb-4 btn btn-primary" style="background: var(--main-color); border: none; color: var(--text-color);">
   </form>
@endsection
