<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index() {
        if (!session()->has('user')) {
            abort(401);
        }
        return view('pages.dashboard');
    }
}
