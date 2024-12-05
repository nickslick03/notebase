<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LogInController;
use App\Http\Controllers\SignUpController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/signup', [SignUpController::class, 'index']);

Route::get('/login', [LogInController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);
