@extends('layout.layout', ['title' => 'Login'])

@section('head-content')
    <style>
        input, select {
            max-width: 400px;
        }
    </style>
@endsection

@section('body-content')
    <h1>Login</h1>
    <form action="" method="post">

        @csrf {{ csrf_field() }}

        <!--Capturing the Username-->
        <div class="mb-3">
            <label class="form-label" for="username">Username:</label>
            <input class="form-control" type="text" id="username" name="username" required value="{{ old('username') }}">    
        </div> 
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!--Capturing the Password-->
        <div class="mb-3">
            <label class="form-label" for="password">Password:</label>
            <input class="form-control" type="password" id="password" name="password">            
        </div>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="submit" class="mb-4 btn btn-primary">
    </form>
    <div class="text-primary">
        {{ $message }}
    </div>
@endsection
