<?php

use App\Http\Controllers\DiemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObjController;
use App\Http\Controllers\StudentController;
use App\Mail\AppMail;
use App\Models\Diem;
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

    //Đổi pass
    Route::get('Doi-pass/{idGV}', [DiemController::class, 'doipass'])->name('doipass');
    Route::PUT('Doi-pass-process/{idGV}', [DiemController::class, 'doipass2'])->name('doipass2');
    //điểm sinh viên
    Route::get('diem/{idL}/{tenMH}/{idMH}', [DiemController::class, 'diemlop'])->name('diemlop');
    Route::PUT('delete-diem-sinh-vien/{idSV}/{idMH}/{idNH}', [DiemController::class, 'deleteDiem'])->name('deleteDiem');
    Route::get('diem-sinh-vien/{idL}/{tenSV}/{idSV}/{idNH}', [DiemController::class, 'diemsinhvien'])->name('diemsinhvien');
    Route::get('mon-hoc/{idL}/{tenSV}/{idSV}', [DiemController::class, 'diemnamhoc'])->name('diemnamhoc');
    Route::get('/insert-diem-by-excel', [DiemController::class, 'insertDiemByExcel'])->name('insertDiemByExcel');
    Route::post('/insert-diem-by-excel-process', [DiemController::class, 'insertDiemByExcelprocess'])->name('insertDiemByExcelprocess');
    Route::get('/export-diem', [DiemController::class, 'exportDiem'])->name('exportDiem');
    Route::get('edit-diem/{idSV}/{idL}/{idMH}/{tenMH}', [DiemController::class, 'editDiem'])->name('editDiem');
    Route::PUT('update-diem/{idSV}/{idL}/{tenMH}/{idMH}', [DiemController::class, 'updateDiem'])->name('updateDiem');
    Route::get('export-diem-sinh-vien/{idSV}/{idNH}', [DiemController::class, 'exportDiemSV'])->name('exportDiemSV');
    Route::get('Dow-diem-mon-hoc/{idL}/{idMH}', [DiemController::class, 'DowDiemMonHoc'])->name('DowDiemMonHoc');

    //Excel điểm
    Route::get('sample', [DiemController::class, 'sample'])->name('sample');
    Route::get('previewDiem-sinhvien', [DiemController::class, 'previewDiem'])->name('previewDiem');
    Route::post('confirm', [DiemController::class, 'confirm'])->name('confirm');
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Điểm trung bình môn
    Route::get('insert-diem-trung-binh', [DiemController::class, 'insertDiemtbm'])->name('insertDiemtbm');
    Route::get('preview-diem-trung-binh', [DiemController::class, 'previewDiemtbm'])->name('previewDiemtbm');
    Route::post('comfirm-diem-trung-binh', [DiemController::class, 'confirmDiemtbm'])->name('confirmDiemtbm');
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //điểm thi lại sinh viên
    Route::get('edit-diem-thi-lai/{idSV}/{idL}/{idMH}/{tenMH}', [DiemController::class, 'editDiemthilai'])->name('editDiemthilai');
    Route::PUT('update-diem-thi-lai/{idSV}/{idL}/{tenMH}/{idMH}', [DiemController::class, 'updateDiemthilai'])->name('updateDiemthilai');
    Route::get('diem-thi-lai/{idL}/{tenMH}/{idMH}', [DiemController::class, 'diemthilai'])->name('diemthilai');
    Route::get('/insert-diem-thi-lai-by-excel', [DiemController::class, 'insertDiemthilaiByExcel'])->name('insertDiemthilaiByExcel');
    Route::post('/insert-diem-thi-lai-by-excel-process', [DiemController::class, 'insertDiemthilaiByExcelprocess'])->name('insertDiemthilaiByExcelprocess');
    Route::get('/export-diem-thi-lai', [DiemController::class, 'exportDiemthilai'])->name('exportDiemthilai');

    //Excel điểm thi lại sinh viên
    Route::get('sample-diem-thi-lai', [DiemController::class, ['sampleDiem']])->name('sampleDiem');
    Route::get('previewDiem-thi-lai', [DiemController::class, 'previewDiemthilai'])->name('previewDiemthilai');
    Route::post('confirmDiem', [DiemController::class, 'confirmDiem'])->name('confirmDiem');
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //sinhvien
    Route::prefix('student')->name('student.')->group(function () {
        // Route::get('{tenSV}/hide', [StudentController::class, 'hide'])->name('hide');
        Route::get('/export', [StudentController::class, 'export'])->name('export');
        Route::get('insert-sinhvien/{idL}', [StudentController::class, 'create'])->name('create');
        Route::get('edit-sinhvien/{idSV}/{idL}', [StudentController::class, 'edit'])->name('edit');
        Route::PUT('update-sinhvien/{idSV}/{idL}', [StudentController::class, 'update'])->name('update');
        Route::PUT('delete-sinhvien/{idSV}/{idL}', [StudentController::class, 'destroy'])->name('destroy');
        Route::PUT('store', [StudentController::class, 'store'])->name('store');
        //Excel sinh viên
        Route::get('Dowload/{idL}', [StudentController::class, 'DowSV'])->name('DowSV');
        Route::get('/insert-by-excel', [StudentController::class, 'insertByExcel'])->name('insertByExcel');
        Route::get('sample-sinh-vien', [StudentController::class, 'sampleSinhVien'])->name('sampleSinhVien');
        Route::get('previewSinhVien', [StudentController::class, 'previewSinhVien'])->name('previewSinhVien');
        Route::post('confirmSinhVien', [StudentController::class, 'confirmSinhVien'])->name('confirmSinhVien');
        Route::post('/insert-by-excel-process', [StudentController::class, 'insertByExcelprocess'])->name('insertByExcelprocess');
        Route::PUT('hoat-dong-lop/{idL}', [StudentController::class, 'activeLop'])->name('activeLop');
        Route::PUT('hoat-dong-sv/{idSV}', [StudentController::class, 'activeSv'])->name('activeSv');
        Route::PUT('hien-lop/{idL}', [StudentController::class, 'activeL'])->name('activeL');
        Route::PUT('hien-sinh-vien/{idSV}', [StudentController::class, 'activeS'])->name('activeS');
        Route::get('danh-sach-lop-bi-an', [StudentController::class, 'hideLop'])->name('hideLop');
        Route::get('danh-sach-sinh-vien-bi-an', [StudentController::class, 'hideSv'])->name('hideSv');
    });
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //môn học
    Route::get('monhoc/{idMH}/{tenMH}', [ObjController::class, 'editmonhoc'])->name('editmonhoc');
    Route::PUT('store', [ObjController::class, 'store'])->name('store');
    Route::PUT('update/{idMH}', [ObjController::class, 'updatemonhoc'])->name('updatemonhoc');
    Route::get('show/{idL}', [ObjController::class, 'showmonhoc'])->name('showmonhoc');
    Route::get('create/{idL}', [ObjController::class, 'createmonhoc'])->name('createmonhoc');
    Route::PUT('delete/{idMH}/{idL}', [ObjController::class, 'deletemonhoc'])->name('deletemonhoc');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //trang chủ
    Route::get('/home', function () {
        return view('dashboard');
    })->name('dashboard');
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //lớp
    Route::resource('class', ClassController::class);
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //mail
    Route::get('/mail', function () {
        Mail::to('sinhvien1@gmail.com')->send(new AppMail());
        return new AppMail();
    });
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //lịch làm việc
    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');
});