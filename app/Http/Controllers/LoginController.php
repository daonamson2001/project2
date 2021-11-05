<?php

namespace App\Http\Controllers;

use App\Models\Giaovu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function process(Request $request)
    {
        try {
            $email = $request->get('email');
            $password = $request->get('passWord');
            $giaovu = Giaovu::where('email', $email)->where('passWord', $password)->firstOrFail();
            $request->session()->put('idGV', $giaovu->idGV);
            $request->session()->put('gioiTinh', $giaovu->gioiTinh == 1 ? 'Thầy' : 'Cô');
            $request->session()->put('tenGV', $giaovu->tenGV);
            $request->session()->put('passWord', $giaovu->passWord);
            return view('dashboard');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Sai Email hoặc Mật khẩu !');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        // return view('login');
        return redirect()->route('login');
    }
}