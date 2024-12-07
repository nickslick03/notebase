@extends('layout.layout', ['title' => 'Register'])

@section('head-content')
    <style>
        input, select {
            max-width: 400px;
        }
    </style>
@endsection

@section('body-content')
    <div class="px-4">
        <h1 class="mt-4 mb-4">Register</h1>
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

            <!--Capturing the Email-->
            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email" required value="{{ old('email') }}">    
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!--Capturing the Role-->
            <div class="mb-3">
                <label class="form-label" for="role">Role:</label>
                <select class="form-select" name="role" id="role" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->role }}" {{ old('role') == $role->role ? 'selected' : ''}}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>                
            </div>
            @error('role')
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

            <input type="submit" class="mb-4 btn btn-primary">
        </form>
    </div>
@endsection
