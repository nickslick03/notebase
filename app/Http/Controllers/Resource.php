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
        (filename, filetype, file_extension, data, user_author, course, status, chapter, title, description)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $file->getClientOriginalName(),
            $file->getMimeType(),
            $file->getExtension(),
            $data,
            session()->get('user')->user,
            $request->course,
            session()->get('user')->role,
            NULL,
            $request->title,
            $request->description
        ]);

        return redirect('/dashboard');

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