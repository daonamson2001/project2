<?php

namespace App\Http\Controllers;

use App\Models\Lop;
use App\Models\Monhoc;
use App\Models\Student;
use Illuminate\Http\Request;

class ObjController extends Controller
{
    public function editmonhoc($idMH, $tenMH)
    {
        // dd($idMH);
        // dd($tenMH);
        $monhoc = Monhoc::where('idMH', '=', $idMH)->first();
        return view('monhoc.editmonhoc', ['monhoc' => $monhoc, 'idMH' => $idMH, 'tenMH' => $tenMH,]);
    }
    public function updatemonhoc(Request $request, $idMH)
    {
        $idL = $request->get('idL');
        $tenMH = $request->get('tenMH');
        Monhoc::where('idMH', $idMH)->update([
            "tenMH" => $tenMH,
        ]);
        return redirect()->route('showmonhoc', ['idL' => $idL]);
        // dd($idL, $idMH);
    }
    public function store(Request $request)
    {
        $idMH = $request->get('idMH');
        $tenMH = $request->get('tenMH');
        $idCN = $request->get('idCN');
        $idNH = $request->get('idNH');
        $idL = $request->get('idL');

        $monhoc = new Monhoc();
        $monhoc->idMH = $idMH;
        $monhoc->idNH = $idNH;
        $monhoc->idL = $idL;
        $monhoc->idCN = $idCN;
        $monhoc->tenMH = $tenMH;
        $monhoc->save();
        return redirect()->route('showmonhoc', ['idL' => $idL]);
    }
    public function createmonhoc($idL)
    {
        $class = Lop::all();
        return view('monhoc.createmonhoc', ['idL' => $idL, 'class' => $class]);
        // dd($idL);
    }
    public function showmonhoc($idL, Request $request)
    {
        $idMH = $request->get('idMH');
        $tenMH = $request->get('tenMH');
        $search = $request->get('search');
        $student = Student::join('diem', 'sinhvien.idSV', '=', 'diem.idSV')->select('*')->where('sinhvien.idL', '=', $idL)->where('tenSV', 'LIKE', "%$search%")->paginate(10);
        $class = Monhoc::all();
        return view('monhoc.showmonhoc', ['search' => $search, 'student' => $student, 'idL' => $idL, 'class' => $class, 'tenMH' => $tenMH, 'idMH' => $idMH]);
    }
    public function deletemonhoc($idMH, $idL)
    {
        $monhoc = Monhoc::where('idMH', $idMH);
        $monhoc->delete();
        return redirect()->route('showmonhoc', ['idL' => $idL]);
        // // dd($idMH);
        // // dd($monhoc);
        // dd($idL);
    }
}