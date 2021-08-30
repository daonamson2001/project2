<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Models\Lop;
use App\Models\Student;
use Carbon\Carbon;
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
        $idL = $request->get('idL');

        $student = new Student();
        $student->idSV = $idSV;
        $student->tenSV = $tenSV;
        $student->email = $email;
        $student->passWord = $passWord;
        $student->gioiTinh = $gioiTinh;
        $student->ngaySinh = $ngaySinh;
        $student->queQuan = $queQuan;
        $student->idL = $idL;
        $student->save();
        return redirect()->route('class.show', ['class' => $idL]);
    }

    public function show($id)
    {
        $student = Student::all();
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

        Student::where('idSV', $idSV)->update([
            "tenSV" => $tenSV,
            "email" => $email,
            "passWord" => $password,
            "gioiTinh" => $gioiTinh == "Nam" ? 1 : 0,
            "ngaySinh" => $ngaySinh,
            "queQuan" => $queQuan,
        ]);
        return redirect()->route('class.show', ['class' => $idL]);
    }


    public function destroy($idSV, $idL)
    {
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $student = Student::where('idSV', $idSV);
        $student->delete();
        return redirect()->route('class.show', ['class' => $idL, "idSV" => $idSV]);
    }
    public function insertByExcel()
    {
        return view('student.insertByExcel');
    }
    public function insertByExcelprocess(Request $request)
    {
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
}