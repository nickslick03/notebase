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

            <!--Capturing the Username-->
            <div class="mb-3">
                <label class="form-label" for="username">Username:</label>
                <input class="form-control" type="text" id="username" name="username">    
            </div> 

            <!--Capturing the Email-->
            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control" type="text" id="email" name="email">    
            </div>

            <!--Capturing the Role-->
            <div class="mb-3">
                <label class="form-label" for="role">Role:</label>
                <select class="form-select" name="role" id="role">
                    <option>--- Choose a role ---</option>
                    <option value="professor">Professor</option>
                    <option value="student">Student</option>
                </select>                
            </div>

            <!--Capturing the Password-->
            <div class="mb-3">
                <label class="form-label" for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password">            
            </div>


            <!--Capturing the Match Password-->
            <div class="mb-3">
                <label class="form-label" for="confirm_password">Confirm Password:</label>
                <input class="form-control" type="password" id="confirm_password" name="confirm_password">            
            </div>

            <input type="submit" class="mb-4 btn btn-primary">
        </form>
    </div>
@endsection
