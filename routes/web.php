<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LmsclassController;
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


// Admin routes
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::middleware('auth:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Batches routes
    Route::resource('/admin/batch', BatchController::class);

    // Courses routes
    Route::resource('/admin/course', CourseController::class);

    // Classes routs
    Route::resource('/admin/lmsclass', LmsclassController::class);

    // Classes routs
    Route::resource('/admin/teacher', TeacherController::class);
    
});


// Teacher routes
Route::get('/teacher', [LoginController::class, 'showTeacherLoginForm'])->name('teacher.login-view');
Route::post('/teacher', [LoginController::class, 'teacherLogin'])->name('teacher.login');
Route::middleware('auth:teacher')->group(function () {

    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
});

//Users routes

Route::middleware('auth:user')->group(function () {
    Route::get('/home', [UserController::class, 'dashboard'])->name('dashboard');
});
        