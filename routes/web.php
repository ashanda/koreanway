<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');
Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard');
});


// Teacher routes
Route::get('/teacher',[LoginController::class,'showTeacherLoginForm'])->name('teacher.login-view');
Route::post('/teacher',[LoginController::class,'teacherLogin'])->name('teacher.login');
Route::middleware('auth:teacher')->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class,'index'])->name('teacher.dashboard');
   
});

//Users routes

Route::middleware('auth:user')->group(function () {

   
});

