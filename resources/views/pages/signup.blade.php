@extends('layout.layout', ['title' => 'signup'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
<body>
    <div id = "topBar">
          <table>
              <td id = "mainText">Register for Notebase!</td>
              <td id = "space"></td>
              <td><a class = "nav" href ="login">Login</a></td>
          </table>
      </div>
    <br>
    <br>
    <form action="" method = "POST">
    <!--Capturing the Username-->
    <label for="uname">Username:</label>
  <input type="text" id="uname" name="uname">
    <br>
    <br>
    <!--Capturing the Email-->
    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    <br>
    <br>
    <!--Capturing the Role-->
    <select name="role" id="role">
        <option value="">--- Choose a role ---</option>
        <option value="profesor">Professor</option>
        <option value="student">Student</option>
    </select>
    <br>
    <br>
    <!--Capturing the Password-->
    <label for="pwd">Password:</label>
    <input type="password" id="pwd" name="pwd">
    <br>
    <br>
    <!--Capturing the Match Password-->
    <label for="mtchpwd">Confirm Password:</label>
    <input type="password" id="mtchpwd" name="mtchpwd">
    <br>
    <br>
    <input type="submit" value="Submit">
    </form>
    </body>
    </html>
    @include('partials.footer')
@endsection
