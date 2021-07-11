<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//login routes
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login-process', [LoginController::class, 'process'])->name('login-process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//lớp
Route::resource('class', ClassController::class);

Route::get('class/{tenLop}/hide', [ClassController::class, 'hide'])->name('class.hide');

// Route::get('/', function () {
//     return view('dashboard');
// });