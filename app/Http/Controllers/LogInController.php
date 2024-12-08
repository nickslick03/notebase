<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LogInController extends Controller
{
    public function index(Request $request) {

        $messages = [
            'new_account' => 'A new account has been created successfully.',
            '' => ''
        ];

        $message = $messages[$request->message ?? ''];

        return view('pages.login', [
            'message' => $message
        ]);
    }

    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => ['required'],
            'password' => ['required']
        ]);

        $validator->after(function ($val) use ($request) {
            $user = DB::select('select * from user where username = ? limit 1', [$request->username]);
            
            if (count($user) === 0 || !Hash::check($request->password, $user[0]->password)) {
                $val->errors()->add(
                    'password', 'username or password is incorrect.'
                );
            }
        });

        $validator->validate();

        return response()->json('login successful');
    }
}
