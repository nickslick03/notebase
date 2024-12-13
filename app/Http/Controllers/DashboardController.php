<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_path=' . base64_encode($request->getPathInfo()));
        }

        $courses = DB::select('
        select * from course_view cv
        join associated_course_user acu
            on cv.course = acu.course and acu.user = ?',
        [session()->get('user')->user]);

        $starred_resources = DB::select("
        select r.resource, r.title, concat(subject_code, ' ', course_code) as code 
        from resource r
        join starred_resource_user sru
            on r.resource = sru.resource and user = ?
        join course_view cv
            on cv.course = r.course",
        [session()->get('user')->user]);

        return view('pages.dashboard', [
            'courses' => $courses,
            'starred_resources' => $starred_resources
        ]);
    }
}
