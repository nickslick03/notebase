@extends('layout.layout', ['title' => 'Edit_Resource'])


@section('head-content')
   <style>
       input, select {
       max-width: 400px;
   }
   </style>
@endsection


@section('body-content')
<h1 style="text-align: center;"> Edit Resource</h1>
   <form action="" method="post" style="border: 2px solid #d4d4d4; width: 400px; padding: 12px; margin: auto auto 24px auto; border-radius: 20px;">
       <label for="course">Select a Course:</label>
       <div class="mb-3"> <p>Here is the current file: </p>
       <br>
       <img src = "">
       <br>
       <p>If you want to change the note file upload a new note: </p>
       </div>
       <input type="file" id="file" name="file">
       <br>
       <br>
       <div class="mb-3">
       <label for="title">Title:</label>
       <br>
       <input type="text" id="title" name="title" value =""><br><br>
       </div>
       <div class="mb-3">
       <label for="description">Description:</label>
       <br>
       <input type="text" id="description" name="description" value=""><br><br>
       </div>
       <input type="submit">
   </form>
@endsection
