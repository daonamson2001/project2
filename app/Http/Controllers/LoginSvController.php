<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class LoginSvController extends Controller
{
    public function loginSv()
    {
        return view('loginSv');
    }
    public function processSv(Request $request)
    {
        try {
            $emaill = $request->get('email');
            $passwordd = $request->get('passWord');
            $sinhvien = Student::where('email', $emaill)->where('passWord', $passwordd)->where('HoatDong', 1)->firstOrFail();
            $request->session()->put('idSV', $sinhvien->idSV);
            $request->session()->put('gioiTinh', $sinhvien->gioiTinh);
            $request->session()->put('tenSV', $sinhvien->tenSV);
            $request->session()->put('idL', $sinhvien->idL);
            $request->session()->put('HoatDong', $sinhvien->HoatDong);
            return view('dashboardSv');
        } catch (Exception $e) {
            return redirect()->route('loginSv')->with('error', 'Sai Email hoặc Mật khẩu !');
            // $sinhvien = Student::where('email', $emaill)->where('passWord', $passwordd)->firstOrFail();
            // if ($sinhvien->HoatDong == 0) {
            //     return redirect()->route('loginSv')->with('error', 'Tài khoản của bạn đã bị khóa !');
            // }
        }
    }
    public function logoutSv(Request $request)
    {
        $request->session()->flush();
        // return view('login');
        return redirect()->route('loginSv');
    }
}