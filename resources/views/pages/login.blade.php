@extends('layout.layout', ['title' => 'login'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
    <body><div id = "topBar">
        <table>
            <td id = "mainText">Notebase</td>
            <td id = "space"></td>
            <td><a class = "nav" href ="signup">Register</a></td>
        </table>
    </div>
    <br>
    <br></body>
    <br>
    <form action="" method = "POST">
    <!--Capturing the Username-->
    <label for="uname">Username:</label>
    <input type="text" id="uname" name="uname">
    <br>
    <br>
    <!--Capturing the Password-->
    <label for="pwd">Password:</label>
    <input type="password" id="pwd" name="pwd">
    <br>
    <br>
    <input type="submit" value="Submit">
    </form>
    </body>
    </html>
    @include('partials.footer')
@endsection
