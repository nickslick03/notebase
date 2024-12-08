<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        $roles = DB::select('select * from role');
        return view('pages.register', [
            'roles' => $roles
        ]);
    }

    public function create(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['required'],
            'password' => ['required', Password::min(8)->mixedCase()->numbers()],
            'confirm_password' => ['required', 'same:password']
        ]);

        $validator->after(function ($val) use ($request) {
            if (DB::select('call username_exists(?)', [$request['username']])[0]->username_exists) {
                $val->errors()->add(
                    'username', 'This username is already in use.'
                );
            }
            if (DB::select('call email_exists(?)', [$request['email']])[0]->email_exists) {
                $val->errors()->add(
                    'email', 'This email is already associated with an account.'
                );
            }
            if (!DB::select('call role_exists(?)', [$request['role']])[0]->role_exists) {
                $val->errors()->add(
                    'role', 'No such role exists. Try again.'
                );
            }
            $create_user = DB::select('call create_user(:username, :email, :role, :password)', [
                'username' => $request->username,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password)
            ]);
            if (count($create_user) == 0 || !$create_user) {
                $val->errors()->add(
                    'confirm_password', 'An error has occurred. please try again later.'
                );
            }
        });

        $validator->validate();

        return redirect('/login?message=new_account');
    }
}
