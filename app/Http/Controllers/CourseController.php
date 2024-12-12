<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function index(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_path=' . base64_encode($request->getPathInfo()));
        }

        $courses = DB::select('
        select *, exists(select * from associated_course_user asu
                         where cv.course = asu.course and asu.user = ?) as is_enrolled
        from course_view cv', [session()->get('user')->user]);

        return view('pages.courselist', [
            'courses' => $courses
        ]);
    }

    public function toggle(Request $request) {
        if (!session()->has('user')) {
            return response()->json([
                'status' => 'error',
                'error' => 'Not logged in'
            ], 401);
        }

        if ($request->add) {
            DB::insert('
            insert into associated_course_user
            (course, user) values (?, ?)',
            [$request->course, session()->get('user')->user]);
        } else {
            DB::delete('
            delete from associated_course_user
            where course = ? and user = ?',
            [$request->course, session()->get('user')->user]);
        }

        return response()->json([
            'status' => 'success'
        ]);
    }
}
