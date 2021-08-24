<?php

namespace App\Http\Controllers;

use App\Models\Diem;
use Illuminate\Http\Request;

class DiemController extends Controller
{
    public function diemlop($idL, $tenMH, Request $request, $idMH)
    {
        $search = $request->get('search');
        $monhoc = Diem::join('sinhvien', 'diem.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diem.idMH', '=', 'monhoc.idMH')
            ->select('*')
            ->where('sinhvien.idL', '=', $idL)
            ->where('monhoc.idMH', '=', $idMH)
            ->where('tenSV', 'LIKE', "%$search%")->paginate(10);
        return view('diem.diemlop', ['tenMH' => $tenMH, 'idL' => $idL, 'search' => $search, 'idMH' => $idMH, 'monhoc' => $monhoc,]);
    }
    public function diemsinhvien($idL, $tenSV, $idSV, Request $request)
    {
        $search = $request->get('search');
        $diem = Diem::join('sinhvien', 'diem.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diem.idMH', '=', 'monhoc.idMH')
            ->select('*')
            ->where('diem.idSV', '=', $idSV)
            ->where('tenSV', 'LIKE', "%$search%")->paginate(10);
        return view('diem.diemsinhvien', ['tenSV' => $tenSV, 'idL' => $idL, 'search' => $search, 'idSV' => $idSV, 'diem' => $diem,]);
    }
    public function indexdiem()
    {
        return view('diem.indexdiem');
    }
    public function updatediem()
    {
        return view('diem.updatediem');
    }
    public function editdiem()
    {
        return view('diem.editdiem');
    }
}