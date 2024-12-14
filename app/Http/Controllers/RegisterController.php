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
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],            
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
            $create_user = DB::select('call create_user(:first_name, :last_name, :username, :email, :role, :password)', [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
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

    public function update(Request $request) {

        if (!session()->has('user')) {
            return redirect('login');
        }

        $user_id = session()->get('user')->user;

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],            
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable'],
            'new_password' => ['nullable', Password::min(8)->mixedCase()->numbers()]
        ]);

        $validator->after(function ($val) use ($request, $user_id) {
            if (DB::scalar('select count(*) from user where user != ? and username = ?', [$user_id, $request->username]) > 0) {
                $val->errors()->add(
                    'username', 'This username is already in use.'
                );
            }
            if (DB::scalar('select count(*) from user where user != ? and email = ?', [$user_id, $request->email]) > 0) {
                $val->errors()->add(
                    'email', 'This email is already associated with an account.'
                );
            }
            if ($request->filled('password') || $request->filled('new_password')) {
                $hashed_password = DB::scalar('select password from user where user = ?', [$user_id]);
                if (!Hash::check($request->password, $hashed_password)) {
                    $val->errors()->add(
                        'password', 'The password is incorrect'
                    );
                }
            }
        });

        if ($validator->fails()) {
            return redirect('/dashboard?show_sidebar_edit=1')
                ->withErrors($validator, 'update')
                ->withInput();
        }

        if ($request->filled('password') || $request->filled('new_password')) { // make new password
            $new_hashed_password = Hash::make($request->new_password);
            DB::update('
            update user
            set password = ?
            where user = ?',
            [$new_hashed_password, $user_id]);
        }

        DB::update('
        update user
        set first_name = ?, last_name = ?, username = ?, email = ?
        where user = ?
        ', [
            $request->first_name,
            $request->last_name,
            $request->username,
            $request->email,
            $user_id
        ]);

        $user = DB::select('select * from user where user = ?', [$user_id])[0];

        session()->put('user', $user);

        return redirect('/dashboard?show_sidebar=1');
    }
}
