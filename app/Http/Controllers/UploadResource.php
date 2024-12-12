<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadResource extends Controller
{
    public function index(Request $request) {
        if (!session()->has('user')) {
            return redirect('login?callback_path=' . base64_encode($request->getPathInfo()));
        }

        return view('pages.upload_resource');
    }
}
