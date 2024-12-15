<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Resource extends Controller
{
    public function index(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_path=' . base64_encode($request->getPathInfo()));
        }

        $courses = DB::select('
            select cv.title, acu.course
            from associated_course_user acu
            inner join course_view cv
                on acu.course = cv.course and acu.user = ?
        ', [session()->get('user')->user]);

        return view('pages.upload_resource', [
            'courses' => $courses
        ]);
    }

    public function create(Request $request) {

        if (!session()->has('user')) {
            return redirect('login');
        }

        $request->validate([
            'course' => 'required', // You can modify this validation as per your needs
            'file' => 'required|file|mimes:txt,pdf,jpeg,png,jpg,gif|max:16384', // Validate file type and size
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);

        $file = $request->file('file');
        $data = file_get_contents($file->getRealPath());

        DB::insert(
        'insert into resource 
        (filename, filetype, data, user_author, course, status, chapter, title, description)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $file->getClientOriginalName(),
            $file->getMimeType(),
            $data,
            session()->get('user')->user,
            $request->course,
            session()->get('user')->role,
            NULL,
            $request->title,
            $request->description
        ]);

        return redirect("/course/" . $request->course);

    }

    public function toggle_star(Request $request) {

        if (!session()->has('user')) {
            return response()->json([
                'status' => 'error',
                'error' => 'Not logged in'
            ], 401);
        }

        if (!$request->is_starred) {
            DB::insert('
            insert into starred_resource_user
            (resource, user) values (?, ?)',
            [$request->resource, session()->get('user')->user]);
        } else {
            DB::delete('
            delete from starred_resource_user
            where resource = ? and user = ?',
            [$request->resource, session()->get('user')->user]);
        }

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function my_resources(Request $request) {

        if (!session()->has('user')) {
            return redirect('login?callback_url=' . base64_encode('/my_resources'));
        }

        $resources = DB::select('
        select r.resource, r.title, (sru.user) is not null as is_starred, (true) as is_author, substring_index(filetype, \'/\', 1) as img_name
        from resource r
        left join starred_resource_user sru
            on r.resource = sru.resource and sru.user = ?', 
        [session()->get('user')->user]);

        return view('pages/my_resources', [
            'resources' => $resources
        ]);
    }

    public function get_data(Request $request) {

        if (!session()->has('user')) {
            return response()->json([
                'status' => 'error',
                'error' => 'Not logged in'
            ], 401);
        }

        $resource = DB::select('
        select data, filename, filetype
        from resource
        where resource = ?',
        [$request->resource])[0];

        return response($resource->data)
            ->header('Content-Type', $resource->filetype)
            ->header('Content-Disposition', 'attachment; filename=' . $resource->filename);
    }

    public function get_edit(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_path=' . base64_encode($request->getPathInfo()));
        }

        $resources = DB::select('
        select resource, title, description, user_author, course
        from resource
        where resource = ?',
        [$request->route('resource')]);

        if (count($resources) === 0) {
            return abort(404, 'The resource doesn\'t exist');
        }

        if ($resources[0]->user_author !== session()->get('user')->user) {
            return abort(403, 'You did not create this resource, so you can\'t edit it.');
        }

        $courses = DB::select('
        select cv.title, acu.course
        from associated_course_user acu
        inner join course_view cv
            on acu.course = cv.course and acu.user = ?', 
        [session()->get('user')->user]);

        return view('pages.edit_resource', [
            'resource' => $resources[0],
            'courses' => $courses
        ]);
    }

    public function post_edit(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_path=' . base64_encode($request->getPathInfo()));
        }

        $request->validate([
            'resource' => 'required',
            'course' => 'required', // You can modify this validation as per your needs
            'file' => 'nullable|file|mimes:txt,pdf,jpeg,png,jpg,gif|max:16384', // Validate file type and size
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);

        $r = DB::select('
        select user_author from resource
        where resource = ?',
        [$request->resource]);

        if (count($r) === 0) {
            return abort(404, 'The resource doesn\'t exist');
        }

        if (session()->get('user')->user !== $r[0]->user_author) {
            return abort(403, 'You did not create this resource, so you can\'t edit it.');   
        }

        DB::update('
        update resource
        set course = ?, title = ?, description = ?
        where resource = ?',
        [$request->course, $request->title, $request->description, $request->resource]);

        if ($request->file) {
            $file = $request->file('file');
            $data = file_get_contents($file->getRealPath());

            DB::update('
            update resource
            set filename = ?, filetype = ?, data = ?
            where resource = ?',
            [
                $file->getClientOriginalName(),
                $file->getMimeType(),
                $data,
                $request->resource
            ]);
        }

        return redirect('/course/' . $request->course);
    }

    public function post_delete(Request $request) {
        if (!session()->has('user')) {
            return redirect('login');
        }

        $r = DB::select('select user_author from resource where resource = ?', [$request->resource]);

        if (count($r) === 0) {
            return abort(404, "Resource not found");
        }

        if (session()->get('user')->user !== $r[0]->user_author) {
            return abort(403, 'You did not create this resource, so you can\'t delete it.');   
        }

        DB::delete('delete from resource where resource = ?', [$request->resource]);

        return redirect('/dashboard');
    }
}

/*
resource
filetype
data
user_author
course
status
chapter
title
description
file_extension
 */