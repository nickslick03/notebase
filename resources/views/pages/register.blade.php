@extends('layout.layout', ['title' => 'Register'])

@section('head-content')
    <style>
        input, select {
            max-width: 400px;
        }
    </style>
@endsection

@section('body-content')
    <h1 style="text-align: center;">Register</h1>
    <form action="" method="post" style="border: 2px solid #d4d4d4; width: 400px; padding: 12px; margin: auto auto 24px auto; border-radius: 20px;">
        
        @csrf {{ csrf_field() }}

        <!--Capturing the first name-->
        <div class="mb-3">
            <label class="form-label" for="first_name">First Name:</label>
            <input class="form-control" type="text" id="first_name" name="first_name" required value="{{ old('first_name') }}">    
        </div> 
        @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!--Capturing the last name-->
        <div class="mb-3">
            <label class="form-label" for="last_name">Last Name:</label>
            <input class="form-control" type="text" id="last_name" name="last_name" required maxlength="255" value="{{ old('last_name') }}">    
        </div> 
        @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!--Capturing the Username-->
        <div class="mb-3">
            <label class="form-label" for="username">Username:</label>
            <input class="form-control" type="text" id="username" name="username" required maxlength="255" value="{{ old('username') }}">    
        </div> 
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!--Capturing the Email-->
        <div class="mb-3">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" required maxlength="255" value="{{ old('email') }}">    
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!--Capturing the Password-->
        <div class="mb-3">
            <label class="form-label" for="password">Password:</label>
            <input class="form-control" type="password" id="password" name="password" required>            
        </div>
        <div>The password must contain:</div>
        <ul>
            <li>At least 8 characters</li>
            <li>At least 1 uppercase letter</li>
            <li>At least 1 lowercase letter</li>
            <li>At least 1 number</li>
        </ul>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!--Capturing the Match Password-->
        <div class="mb-3">
            <label class="form-label" for="confirm_password">Confirm Password:</label>
            <input class="form-control" type="password" id="confirm_password" name="confirm_password" required>            
        </div>
        @error('confirm_password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <input type="submit" class="mb-4 btn btn-primary" style="background: var(--main-color); border: none; color: var(--text-color);">
    </form>
@endsection