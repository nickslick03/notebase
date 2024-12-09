<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index() {
        if (!session()->has('user')) {
            return redirect('login');
        }
        return view('pages.dashboard');
    }
}
