<?php

namespace App\Http\Controllers;

use App\Exports\DiemExport;
use App\Exports\DiemthilaiExport;
use App\Imports\DiemImport;
use App\Imports\DiemthilaiImport;

use App\Models\Diem;
use App\Models\Diemthilai;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
            ->where('tenSV', 'LIKE', "%$search%")
            ->paginate(10);
        return view('diem.diemlop', ['tenMH' => $tenMH, 'idL' => $idL, 'search' => $search, 'idMH' => $idMH, 'monhoc' => $monhoc,]);
    }
    public function diemthilai($idL, $tenMH, Request $request, $idMH)
    {
        $search = $request->get('search');
        $monhoclai = Diemthilai::join('sinhvien', 'diemthilai.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diemthilai.idMH', '=', 'monhoc.idMH')
            ->select('*')
            ->where('sinhvien.idL', '=', $idL)
            ->where('monhoc.idMH', '=', $idMH)
            ->where('tenSV', 'LIKE', "%$search%")
            ->paginate(10);
        return view('diem.diemthilai', ['tenMH' => $tenMH, 'idL' => $idL, 'search' => $search, 'idMH' => $idMH, 'monhoclai' => $monhoclai,]);
    }
    public function diemsinhvien($idL, $tenSV, $idSV, Request $request)
    {
        $search = $request->get('search');
        $diem = Diem::join('sinhvien', 'diem.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diem.idMH', '=', 'monhoc.idMH')
            ->select('*')
            ->where('diem.idSV', '=', $idSV)
            ->where('tenSV', 'LIKE', "%$search%")
            ->paginate(10);
        return view('diem.diemsinhvien', ['tenSV' => $tenSV, 'idL' => $idL, 'search' => $search, 'idSV' => $idSV, 'diem' => $diem,]);
    }
    public function editDiem($idSV, $idL, $idMH, $tenMH)
    {
        $diem = Diem::where('idSV', '=', $idSV)->first();
        return view('diem.editDiem', ["diem" => $diem, "idL" => $idL, "idMH" => $idMH, "tenMH" => $tenMH,]);
    }
    public function updateDiem(Request $request, $idSV, $idL, $tenMH, $idMH)
    {
        $LyThuyet =  $request->get('LyThuyet');
        $ThucHanh = $request->get('ThucHanh');
        Diem::where('idSV', $idSV)->update([
            "LyThuyet" => $LyThuyet,
            "ThucHanh" => $ThucHanh,
        ]);
        return redirect()->route('diemlop', ['idL' => $idL, "tenMH" => $tenMH, "idMH" => $idMH]);
    }
    public function editDiemthilai($idSV, $idL, $idMH, $tenMH)
    {
        $diem = Diemthilai::where('idSV', '=', $idSV)->first();
        return view('diem.editDiemthilai', ["diem" => $diem, "idL" => $idL, "idMH" => $idMH, "tenMH" => $tenMH,]);
    }
    public function updateDiemthilai(Request $request, $idSV, $idL, $tenMH, $idMH)
    {
        $ThiLaiLyThuyet =  $request->get('ThiLaiLyThuyet');
        $ThiLaiThucHanh = $request->get('ThiLaiThucHanh');
        Diemthilai::where('idSV', $idSV)->update([
            "ThiLaiLyThuyet" => $ThiLaiLyThuyet,
            "ThiLaiThucHanh" => $ThiLaiThucHanh,
        ]);
        return redirect()->route('diemthilai', ['idL' => $idL, "tenMH" => $tenMH, "idMH" => $idMH]);
    }
    //điểm thi sinh viên
    public function insertDiemByExcel()
    {
        return view('diem.insertDiemByExcel');
    }
    public function insertDiemByExcelprocess(Request $request)
    {
        Excel::import(new DiemImport, $request->file('excel'));
        return view('diem.insertDiemByExcel');
    }
    public function exportDiem()
    {
        return Excel::download(new DiemExport, 'Mau_diem_thi.xlsx');
    }

    //Điểm thi lại sinh viên
    public function insertDiemthilaiByExcel()
    {
        return view('diem.insertDiemthilaiByExcel');
    }
    public function insertDiemthilaiByExcelprocess(Request $request)
    {
        Excel::import(new DiemthilaiImport, $request->file('excel'));
        return view('diem.insertDiemthilaiByExcel');
    }
    public function exportDiemthilai()
    {
        return Excel::download(new DiemthilaiExport, 'Diemthi.xlsx');
    }
}