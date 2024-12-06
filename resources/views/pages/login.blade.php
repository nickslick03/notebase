@extends('layout.layout', ['title' => 'Login'])

@section('head-content')
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section('body-content')
    <div id="topBar">
        <table>
            <td id="mainText">Notebase</td>
            <td id="space"></td>
            <td><a class="nav" href="/register">Register</a></td>
        </table>
    </div>
    <br>
    <br>
    <br>
    <form action="" method="post">
        <!--Capturing the Username-->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br>
        <br>
        <!--Capturing the Password-->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        <br>
        <br>
        <input type="submit">
    </form>
    @include('partials.footer')
@endsection
