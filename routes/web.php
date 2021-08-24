<?php

use App\Http\Controllers\DiemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObjController;
use App\Mail\AppMail;
use Illuminate\Support\Facades\Mail;
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
Route::post('/home', [LoginController::class, 'process'])->name('login-process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//
Route::middleware([CheckLogin::class])->group(function () {

    //điểm
    // Route::get('/diem/create', [DiemController::class, 'create'])->name('create');
    // Route::PATCH('/store', [DiemController::class, 'store'])->name('store');
    // Route::get('/diem/index', [DiemController::class, 'index'])->name('index');
    // Route::get('/edit', [DiemController::class, 'edit'])->name('edit');
    // Route::PATCH('/update', [DiemController::class, 'update'])->name('update');
    // Route::get('/show', [DiemController::class, 'show'])->name('show');
    //
    // Route::prefix('diem')->name('diem.')->group(function () {
    Route::get('diem/{idL}/{tenMH}/{idMH}', [DiemController::class, 'diemlop'])->name('diemlop');
    Route::get('diemsinhvien/{idL}/{tenSV}/{idSV}', [DiemController::class, 'diemsinhvien'])->name('diemsinhvien');
    Route::get('diem/themdiem', [DiemController::class, 'indexdiem'])->name('indexdiem');
    // });

    Route::get('monhoc/{idMH}/{tenMH}', [ObjController::class, 'editmonhoc'])->name('editmonhoc');
    Route::PUT('store', [ObjController::class, 'store'])->name('store');
    Route::PUT('update/{idMH}', [ObjController::class, 'updatemonhoc'])->name('updatemonhoc');
    Route::get('show/{idL}', [ObjController::class, 'showmonhoc'])->name('showmonhoc');
    Route::get('create/{idL}', [ObjController::class, 'createmonhoc'])->name('createmonhoc');
    //trang chủ
    Route::get('/home', function () {
        return view('dashboard');
    })->name('dashboard');

    //sinhvien
    Route::resource('student', StudentController::class);
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('{tenSV}/hide', [StudentController::class, 'hide'])->name('hide');
    });

    //lớp
    Route::resource('class', ClassController::class);
    Route::prefix('class')->name('class.')->group(function () {
        Route::get('{tenLop}/hide', [ClassController::class, 'hide'])->name('hide');
    });

    //mail
    Route::get('/mail', function () {
        Mail::to('sinhvien1@gmail.com')->send(new AppMail());
        return new AppMail();
    });

    //lịch làm việc
    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');
    //

});