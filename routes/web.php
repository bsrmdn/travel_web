<?php

use App\Http\Controllers\CourseScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherPicketScheduleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', [CourseScheduleController::class, 'index'])->name('home');

Auth::routes();

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::post('/dashboard/jadwal/mapel', [CourseScheduleController::class, 'store'])->middleware('auth')->name('createSchedule');
Route::delete('/dashboard/jadwal/mapel/{courseSchedule:id}', [CourseScheduleController::class, 'destroy'])->middleware('auth');
Route::put('/dashboard/jadwal/mapel/{courseSchedule:id}', [CourseScheduleController::class, 'update'])->middleware('auth');

Route::post('/dashboard/jadwal/piket', [TeacherPicketScheduleController::class, 'store'])->middleware('auth')->name('createPiket');
Route::delete('/dashboard/jadwal/piket/{teacherPicketSchedule:id}', [TeacherPicketScheduleController::class, 'destroy'])->middleware('auth');
Route::put('/dashboard/jadwal/piket/{teacherPicketSchedule:id}', [TeacherPicketScheduleController::class, 'update'])->middleware('auth');
