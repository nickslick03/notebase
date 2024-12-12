<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_url=' . base64_encode($request->url()));
        }
        return view('pages.dashboard');
    }
}
