<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('pages.register');
    }

    public function create(Request $request) {
        
        $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['required'],
            'password' => ['required', 'regex:/[A-Z]/', 'regex:/\d/', 'min:8'],
            'confirm_password' => ['required', 'same:password']
        ]);

        return response()->json($request['username']);
    }
}
