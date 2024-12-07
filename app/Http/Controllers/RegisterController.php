<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        });

        $validator->validate();

        return response()->json($request['username']);
    }
}
