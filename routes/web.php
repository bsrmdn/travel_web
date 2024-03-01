<?php

use App\Http\Controllers\CourseScheduleController;
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

Route::get('/', [CourseScheduleController::class, 'index'])->name('home');


// kode rombel | pembelanjaean | waktu | ruang | status
// VII - BIN - B
Auth::routes();

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
