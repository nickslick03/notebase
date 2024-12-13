@extends('layout.layout', ['title' => 'Edit_Resource'])


@section('head-content')
    <link rel="stylesheet" href="/css/form.css">
@endsection


@section('body-content')
<h1> Edit Resource</h1>
   <form action="" method="post">
       <div class="mb-3"> <p>Here is the current file: </p>
       <br>
       <div id="edit-resource-display"></div>
       <br>
       <!--File Upload-->
       <p>If you want to change the note file upload a new note: </p>
       </div>
       <input type="file" id="file" name="file">
       <br>
       <br>
       <!--File Title-->
       <div class="mb-3">
       <label for="title">Title:</label>
       <br>
       <input type="text" id="title" name="title" value =""><br><br>
       </div>
       <!--File Description-->
       <div class="mb-3">
       <label for="description">Description:</label>
       <br>
       <input type="text" id="description" name="description" value=""><br><br>
       </div>
       <input type="submit">
   </form>
@endsection
