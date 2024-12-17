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

        $user_id = session()->get('user')->user;

        $courses = DB::select('
        select 
            *,
            (ascii(substr(subject_code, 1, 1)) * ascii(substr(subject_code, 2, 1)) * ascii(substr(subject_code, 3, 1))) % 360 as hue
        from course_view cv
        join associated_course_user acu
            on cv.course = acu.course and acu.user = ?',
        [$user_id]);

        $starred_resources = DB::select("
        select 
            r.resource, 
            r.title, concat(subject_code, ' ', course_code) as code, 
            (r.user_author = ?) as is_author, 
            substring_index(filetype, '/', 1) as img_name
        from resource r
        join starred_resource_user sru
            on r.resource = sru.resource and user = ?
        join course_view cv
            on cv.course = r.course",
        [$user_id, $user_id]);

        return view('pages.dashboard', [
            'courses' => $courses,
            'starred_resources' => $starred_resources,
            'show_sidebar' => isset($request->show_sidebar),
            'show_sidebar_edit' => isset($request->show_sidebar_edit)
        ]);
    }
}
