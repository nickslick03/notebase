@extends('layout.layout', ['title' => 'Login'])

@section('head-content')
    <style>
        input, select {
            max-width: 400px;
        }
    </style>
@endsection

@section('body-content')
    <div class="px-4">
        <h1 class="my-4">Login</h1>
        <form action="" method="post">
            <!--Capturing the Username-->
            <div class="mb-3">
                <label class="form-label" for="username">Username:</label>
                <input class="form-control" type="text" id="username" name="username">    
            </div> 

            <!--Capturing the Password-->
            <div class="mb-3">
                <label class="form-label" for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password">            
            </div>

            <input type="submit" class="mb-4 btn btn-primary">
        </form>
    </div>
@endsection
