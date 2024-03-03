<?php

use App\Http\Controllers\CourseScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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
Route::post('/dashboard', [DashboardController::class, 'store'])->middleware('auth')->name('dashboard');
Route::delete('/dashboard/{courseSchedule:id}', [DashboardController::class, 'destroy'])->middleware('auth');
Route::put('/dashboard/{courseSchedule:id}', [DashboardController::class, 'update'])->middleware('auth');
