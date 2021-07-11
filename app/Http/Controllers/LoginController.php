<?php

namespace App\Http\Controllers;

use App\Models\Giaovu;
use Exception;
use Illuminate\Http\Request;
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
            $password = $request->get('password');
            $giaovu = Giaovu::where('email', $email)->where('password', $password)->firstOrFail();
            $request->session()->put('id', $giaovu->idGV);
            return view('dashboard');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Sai Email hoặc Mật khẩu !');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}