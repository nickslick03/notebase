@extends('layout.layout', ['title' => 'Register'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
<body>
    <div id="topBar">
          <table>
              <td id="mainText">Register for Notebase!</td>
              <td id="space"></td>
              <td><a class="nav" href="login">Login</a></td>
          </table>
      </div>
    <br>
    <br>
    <form action="" method="post">
        <!--Capturing the Username-->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
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
            <option value="professor">Professor</option>
            <option value="student">Student</option>
        </select>
        <br>
        <br>
        <!--Capturing the Password-->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br>
        <br>
        <!--Capturing the Match Password-->
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password">
        <br>
        <br>
        <input type="submit">
    </form>
    @include('partials.footer')
@endsection
