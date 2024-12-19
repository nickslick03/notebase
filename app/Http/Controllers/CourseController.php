<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\CourseView;


class CourseController extends Controller
{
    public function index(Request $request) {

        $courses = session()->has('user')
            ? DB::select('
            select *, exists(select * from associated_course_user asu
                            where cv.course = asu.course and asu.user = ?) as is_enrolled
            from course_view cv', [session()->get('user')->user])
            : CourseView::all();
        

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

    public function course(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_path=' . base64_encode($request->getPathInfo()));
        }

        $courses = DB::select('
            select * from course_view where course = ?
        ', [$request->route('course')]);

        if (count($courses) === 0) {
            return abort(404, 'No course with an id of ' . $request->route('course') . ' exists.');
        }

        $resources = DB::select('
        select r.resource, r.title, (sru.user) is not null as is_starred, (r.user_author = ?) as is_author, substring_index(filetype, \'/\', 1) as img_name
        from resource r
        left join starred_resource_user sru
            on r.resource = sru.resource and sru.user = ?
        where course = ?;', 
        [session()->get('user')->user, session()->get('user')->user, $request->route('course')]);

        return view('pages.course', [
            'course' => $courses[0],
            'resources' => $resources
        ]);
    }
}
