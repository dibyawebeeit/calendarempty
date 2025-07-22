<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/submit_login', [AuthController::class, 'submit_login'])->name('submit_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
