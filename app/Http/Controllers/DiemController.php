<?php

namespace App\Http\Controllers;

use App\Exports\DiemExport;
use App\Exports\DiemMonExport;
use App\Exports\DiemthilaiExport;
use App\Exports\idStudentDiemsExport;
use App\Imports\DiemImport;
use App\Imports\DiemthilaiImport;

use App\Models\Diem;
use App\Models\Diemthilai;
use Exception;
use App\Models\Giaovu;
use App\Models\Namhoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DiemController extends Controller
{
    public function doipass($idGV)
    {
        return view('diem.doipass', ['idGV' => $idGV]);
    }
    public function doipass2(Request $request, $idGV)
    {
        $password = $request->get('passWord');
        Giaovu::where('idGV', $idGV)->update([
            "passWord" => $password,
        ]);
        return redirect()->route('login');
    }
    public function diemlop($idL, $tenMH, Request $request, $idMH)
    {
        $search = $request->get('search');
        $monhoc = Diem::join('sinhvien', 'diem.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diem.idMH', '=', 'monhoc.idMH')
            ->select('*')
            ->where('sinhvien.idL', '=', $idL)
            ->where('sinhvien.HoatDong', '=', 1)
            ->where('monhoc.idMH', '=', $idMH)
            ->where('tenSV', 'LIKE', "%$search%")
            ->paginate(10);
        return view('diem.diemlop', ['tenMH' => $tenMH, 'idL' => $idL, 'search' => $search, 'idMH' => $idMH, 'monhoc' => $monhoc,]);
    }
    public function deleteDiem($idSV, $idMH, $idNH)
    {
        $diem = Diem::where('idSV', $idSV)->where('idMH', $idMH)->where('idNH', $idNH);
        $diem->delete();
        return redirect()->back();
    }
    public function diemthilai($idL, $tenMH, $idMH, Request $request)
    {
        $search = $request->get('search');
        $monhoclai = Diemthilai::join('sinhvien', 'diemthilai.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diemthilai.idMH', '=', 'monhoc.idMH')
            ->select('*')
            ->where('sinhvien.idL', '=', $idL)
            ->where('sinhvien.HoatDong', '=', 1)
            ->where('monhoc.idMH', '=', $idMH)
            ->where('tenSV', 'LIKE', "%$search%")
            ->paginate(10);
        return view('diem.diemthilai', ['tenMH' => $tenMH, 'idL' => $idL, 'search' => $search, 'idMH' => $idMH, 'monhoclai' => $monhoclai,]);
    }
    public function diemsinhvien($idL, $tenSV, $idSV, $idNH, Request $request)
    {
        $search = $request->get('search');
        $diem = Diem::join('sinhvien', 'diem.idSV', '=', 'sinhvien.idSV')
            ->join('monhoc', 'diem.idMH', '=', 'monhoc.idMH')
            ->select('*')
            ->where('diem.idSV', '=', $idSV)
            ->where('sinhvien.HoatDong', '=', 1)
            ->where('diem.idNH', '=', $idNH)
            ->where('tenSV', 'LIKE', "%$search%")
            ->paginate(10);
        return view('diem.diemsinhvien', ['tenSV' => $tenSV, 'idL' => $idL, 'search' => $search, 'idSV' => $idSV, 'diem' => $diem, 'idNH' => $idNH,]);
    }
    public function diemnamhoc($idL, $tenSV, $idSV, Request $request)
    {
        $search = $request->get('search');
        $namhoc = Namhoc::all();
        return view('diem.diemnamhoc', ['tenSV' => $tenSV, 'idL' => $idL, 'search' => $search, 'idSV' => $idSV, 'namhoc' => $namhoc,]);
    }
    //Điêm sinh viên
    public function editDiem($idSV, $idL, $idMH, $tenMH)
    {
        $diem = Diem::where('idSV', '=', $idSV)->first();
        return view('diem.editDiem', ["diem" => $diem, "idL" => $idL, "idMH" => $idMH, "tenMH" => $tenMH,]);
    }
    public function updateDiem(Request $request, $idSV, $idL, $tenMH, $idMH)
    {
        $LyThuyet =  $request->get('LyThuyet');
        $ThucHanh = $request->get('ThucHanh');
        $ThoiGian = $request->get('ThoiGian');
        Diem::where('idSV', $idSV)->update([
            "LyThuyet" => $LyThuyet,
            "ThucHanh" => $ThucHanh,
            "ThoiGian" => $ThoiGian,
        ]);
        return redirect()->route('diemlop', ['idL' => $idL, "tenMH" => $tenMH, "idMH" => $idMH]);
    }
    //Điểm thi lại
    public function editDiemthilai($idSV, $idL, $idMH, $tenMH)
    {
        $diem = Diemthilai::where('idSV', '=', $idSV)->first();
        return view('diem.editDiemthilai', ["diem" => $diem, "idL" => $idL, "idMH" => $idMH, "tenMH" => $tenMH,]);
    }
    public function updateDiemthilai(Request $request, $idSV, $idL, $tenMH, $idMH)
    {
        $ThiLaiLyThuyet =  $request->get('ThiLaiLyThuyet');
        $ThiLaiThucHanh = $request->get('ThiLaiThucHanh');
        $ThoiGian = $request->get('ThoiGian');
        Diemthilai::where('idSV', $idSV)->update([
            "ThiLaiLyThuyet" => $ThiLaiLyThuyet,
            "ThiLaiThucHanh" => $ThiLaiThucHanh,
            "ThoiGian" => $ThoiGian,
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
        $preview = Excel::toArray(new DiemImport, $request->file('excel'));
        try {
            $previews = $preview[0][0];
            $idSV = $previews['ma_sinh_vien'];
            $idMH = $previews['ma_mon_hoc'];
            $idNH = $previews['ma_nam_hoc'];
            $ThoiGian = $previews['thoi_gian_cua_mon_duoc_them'];
            $LyThuyet = $previews['diem_ly_thuyet'];
            $ThucHanh = $previews['diem_thuc_hanh'];
            if ($idSV == '' && $idMH == '' && $idNH == '' && $ThoiGian == '') throw new Exception();
        } catch (Exception $e) {
            return redirect()->back()->withMessage('File bị trống hoặc sai định dạng. Vui lòng kiểm tra lại');
        }
        Excel::import(new DiemImport, $request->file('excel'));
        return redirect()->back()->withStatus('Thêm thành công !');
    }

    public function exportDiem()
    {
        return Excel::download(new DiemExport, now() . 'Danh_sach_diem_sv.xlsx');
    }
    public function sample()
    {
        return Excel::download(new DiemExport(true), 'Mau_diem_thi.xlsx');
    }

    //Điểm trung bình môn sinh viên
    public function insertDiemtbm()
    {
        return view('diem.insertDiemtbm');
    }
    public function previewDiemtbm(Request $request)
    {
        $previews = Excel::toArray(new DiemImport, $request->file('excel'));
        try {
            $previewDiem = $previews[0][0];
            $idSV = $previewDiem['ma_sinh_vien'];
            $idMH = $previewDiem['ma_mon_hoc'];
            $idNH = $previewDiem['ma_nam_hoc'];
            $ThoiGian = $previewDiem['thoi_gian_cua_mon_duoc_them'];
            $LyThuyet = $previewDiem['diem_ly_thuyet'];
            $ThucHanh = $previewDiem['diem_thuc_hanh'];
            if ($idSV == '' && $idMH == '' && $idNH == '' && $ThoiGian == '') throw new Exception();
        } catch (Exception $e) {
            return redirect()->back()->withStatus('File bị trống hoặc sai định dạng. Vui lòng kiểm tra lại');
        }
        session(['tmp_preview' => $previews[0]]);
        return view('diem.previewDiemtbm', ['previews' => $previews[0]]);
    }
    public function confirmDiemtbm()
    {
        $previews = session('tmp_preview');
        if ($previews != null && count($previews) > 0) {
            foreach ($previews as $previews) {
                Diem::where(
                    [
                        "idSV" => $previews['ma_sinh_vien'],
                        "idMH" => $previews['ma_mon_hoc'],
                        "idNH" => $previews['ma_nam_hoc'],
                    ]
                )->update(
                    [
                        "LyThuyet" => $previews['diem_ly_thuyet'],
                        "ThucHanh" => $previews['diem_thuc_hanh'],
                    ]
                );
            }
        }
        return view('diem.insertDiemByExcel');
    }

    //Điểm thi lại sinh viên
    public function insertDiemthilaiByExcel()
    {
        return view('diem.insertDiemthilaiByExcel');
    }
    public function insertDiemthilaiByExcelprocess(Request $request)
    {
        $preview = Excel::toArray(new DiemthilaiImport, $request->file('excel'));
        try {
            $previews = $preview[0][0];
            $idSV = $previews['ma_sinh_vien'];
            $idMH = $previews['ma_mon_hoc'];
            $idNH = $previews['ma_nam_hoc'];
            $ThoiGian = $previews['thoi_gian_cua_mon_duoc_them'];
            $LyThuyet = $previews['diem_ly_thuyet_thi_lai'];
            $ThucHanh = $previews['diem_thuc_hanh_thi_lai'];
            if ($idSV == '' && $idMH == '' && $idNH == '' && $ThoiGian == '') throw new Exception();
        } catch (Exception $e) {
            return redirect()->back()->withMessage('File bị trống hoặc sai định dạng. Vui lòng kiểm tra lại !');
        }
        Excel::import(new DiemthilaiImport, $request->file('excel'));
        return redirect()->back()->withStatus('Thêm thành công !');
    }
    public function exportDiemthilai()
    {
        return Excel::download(new DiemthilaiExport, 'Diemthi.xlsx');
    }
    public function sampleDiem()
    {
        return Excel::download(new DiemthilaiExport(true), 'Mau_diem_thi_lai.xlsx');
    }
    public function exportDiemSV($idSV, $idNH)
    {
        return Excel::download(new idStudentDiemsExport($idSV, $idNH), 'Mau_diem_thi_lai.xlsx');
    }
    public function DowDiemMonHoc($idL, $idMH)
    {
        return Excel::download(new DiemMonExport($idL, $idMH), 'Danh_sach.xlsx');
    }
}