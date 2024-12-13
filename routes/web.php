<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Resource;

Route::get('/', [IndexController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', [LogInController::class, 'index']);
Route::post('/login', [LogInController::class, 'authenticate']);
Route::get('/logout', [LogInController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/course', [CourseController::class, 'index']);
Route::post('/course/toggle', [CourseController::class, 'toggle']);
Route::post('/course/toggle', [CourseController::class, 'toggle']);
Route::get('/course/{course}', [CourseController::class, 'course']);

Route::post('/resource/toggle_star', [Resource::class, 'toggle_star']);
Route::post('/resource/get_data', [Resource::class, 'get_data']);

Route::get('/upload_resource', [Resource::class, 'index']);
Route::post('/upload_resource/create', [Resource::class, 'create']);
