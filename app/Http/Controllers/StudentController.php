<?php

namespace App\Http\Controllers;

use App\Exports\DiemMonExport;
use App\Exports\StudentsExport;
use App\Exports\UsersExport;
use App\Imports\StudentsImport;
use App\Models\Lop;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function create(Request $request, $idL)
    {
        $idL = $request->get('idL');
        $class = Lop::all();
        return view('student.create', ["class" => $class, "idL" => $idL]);
    }

    public function store(Request $request)
    {
        $idSV = $request->get('idSV');
        $tenSV = $request->get('tenSV');
        $email = $request->get('email');
        $passWord = $request->get('passWord');
        $gioiTinh = $request->get('gioiTinh');
        $ngaySinh = $request->get('ngaySinh');
        $queQuan = $request->get('queQuan');
        $HoatDong = $request->get('HoatDong');
        $idL = $request->get('idL');

        $student = new Student();
        $student->idSV = $idSV;
        $student->tenSV = $tenSV;
        $student->email = $email;
        $student->passWord = $passWord;
        $student->gioiTinh = $gioiTinh;
        $student->ngaySinh = $ngaySinh;
        $student->queQuan = $queQuan;
        $student->HoatDong = $HoatDong;
        $student->idL = $idL;
        $student->save();
        return redirect()->route('class.show', ['class' => $idL]);
    }

    public function show($id)
    {
        $student = Student::all();
    }
    public function activeLop($idL)
    {
        Lop::where('idL', $idL)->update(
            ["HoatDong" => 0]
        );
        return redirect()->back();
    }
    public function activeL($idL, Request $request)
    {
        Lop::where('idL', $idL)->update(
            ["HoatDong" => 1]
        );
        $search = $request->get('search');
        $class = Lop::where('tenLop', 'LIKE', "%$search%")->paginate(10);
        return view('class.index', ["class" => $class, "search" => $search,]);
    }
    public function activeSv($idSV)
    {
        Student::where('idSV', $idSV)->update(
            ["HoatDong" => 0]
        );
        return redirect()->back();
    }
    public function activeS($idSV)
    {
        Student::where('idSV', $idSV)->update(
            ["HoatDong" => 1]
        );
        return redirect()->back();
    }
    public function hideLop(Request $request)
    {
        $search = $request->get('search');
        $class = Lop::where('tenLop', 'LIKE', "%$search%")->where('HoatDong', '=', 0)->paginate(10);
        return view('student.hideLop', ["class" => $class, "search" => $search,]);
    }
    public function hideSv(Request $request)
    {
        $search = $request->get('search');
        $student = Student::join('lop', 'sinhvien.idL', '=', 'lop.idL')->select('*')->where('sinhvien.HoatDong', '=', 0)->where('sinhvien.tenSV', 'LIKE', "%$search%")->paginate(10);
        return view('student.hideSv', ["student" => $student, "search" => $search,]);
    }
    public function edit($idSV, $idL)
    {
        // dd($idSV);
        $class = Lop::all();
        $student = Student::where('idSV', '=', $idSV)->first();
        return view('student.edit', ["student" => $student, "class" => $class, "idL" => $idL, 'idSV' => $idSV]);
    }


    public function update(Request $request, $idSV, $idL)
    {
        $tenSV = $request->get('tenSV');
        $email = $request->get('email');
        $password = $request->get('passWord');
        $gioiTinh = $request->get('gioiTinh');
        $ngaySinh = $request->get('ngaySinh');
        $queQuan = $request->get('queQuan');
        $HoatDong = $request->get('HoatDong');

        Student::where('idSV', $idSV)->update([
            "tenSV" => $tenSV,
            "email" => $email,
            "passWord" => $password,
            "gioiTinh" => $gioiTinh == "Nam" ? 1 : 0,
            "ngaySinh" => $ngaySinh,
            "queQuan" => $queQuan,
            "HoatDong" => $HoatDong == "Có" ? 1 : 0,
        ]);
        return redirect()->route('class.show', ['class' => $idL]);
    }
    public function destroy($idSV, $idL)
    {
        $student = Student::where('idSV', $idSV);
        $student->delete();
        return redirect()->route('class.show', ['class' => $idL, "idSV" => $idSV]);
    }
    public function insertByExcel()
    {
        return view('student.insertByExcel');
    }
    public function sampleSinhVien()
    {
        return Excel::download(new StudentsExport(true), 'Mau_sinh_vien.xlsx');
    }
    public function insertByExcelprocess(Request $request)
    {
        $preview = Excel::toArray(new StudentsImport, $request->file('excel'));
        try {
            $previews = $preview[0][0];
            $idSV = $previews['ma_sinh_vien'];
            $tenSV = $previews['ho_ten'];
            $email = $previews['email'];
            $gioiTinh = $previews['gioi_tinh'];
            $ngaySinh = $previews['ngay_sinh'];
            $idL = $previews['ten_lop'];
            $queQuan = $previews['que_quan'];
            $passWord = $previews['mat_khau'];
            $HoatDong = $previews['hoat_dong'];
            if ($idSV == '' && $tenSV == '' && $email == '' && $gioiTinh == '' && $ngaySinh == '' && $idL == '' && $queQuan == '' && $passWord == '' && $HoatDong == '') throw new Exception();
        } catch (Exception $e) {
            return redirect()->back()->withMessage('File bị trống hoặc sai định dạng. Vui lòng kiểm tra lại !');
        }
        // Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $file = $request->file('excel')->store('import');
        $import = new StudentsImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return redirect()->back()->withFailures($import->failures());
        }
        // dd($import->failures());
        return redirect()->back()->withStatus('Excel file imported successfully !');
    }
    public function export()
    {
        return Excel::download(new StudentsExport, 'Students.xlsx');
    }
    public function DowSV($idL)
    {
        return Excel::download(new UsersExport($idL), 'Danh_sach_sinh_vien.xlsx');
    }
}