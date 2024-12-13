@extends('layout.layout', ['title' => 'Login'])

@section('head-content')
    <link rel="stylesheet" href="/css/form.css">
@endsection

@section('body-content')
    <h1>Login</h1>
    <form action="" method="post">
        @csrf
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

        <!--Submit Button-->
        <div  style="display: flex; justify-content: center;">
            <input type="submit" class="btn btn-primary" style="margin-bottom: 4px; background: var(--main-color); border: none; color: var(--text-color);">
        </div>
    </form>
    <div class="text-primary text-center">
        {{ $message }}
    </div>
@endsection