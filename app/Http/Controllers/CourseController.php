<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function index(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_url=' . base64_encode($request->url()));
        }

        $courses = DB::select('select * from course_view');

        return view('pages.courselist', [
            'courses' => $courses
        ]);
    }
}
