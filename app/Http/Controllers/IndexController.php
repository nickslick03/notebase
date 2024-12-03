<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user {
    public string $user;
    public int $age;
}

class IndexController extends Controller
{

    public function index() {

        # $sessions = DB::select('select * from sessions');

        return view('pages/index', [
            'names' => ['nick', 'annika', 'andrea']
        ]);
    }
}
