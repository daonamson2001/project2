<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Models\Lop;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $idL = $request->get('idL');
        $student = Student::where('tenSV', 'LIKE', "%$search%")->where("idL", $idL)->paginate(10);
        // $student = DB::table('sinhvien')->join('lop', 'sinhvien.idL', '=', 'lop.idL')->select('*')->get();
        $class = Lop::all();
        return view('student.index', ["student" => $student, "search" => $search, "class" => $class, "idL" => $idL]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idL = $request->get('idL');
        $class = Lop::all();
        return view('student.create', ["class" => $class, "idL" => $idL]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect(route('student.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Lop::all();
        $student = Student::where('idSV', '=', $id)->first();
        return view('student.edit', ["student" => $student, "class" => $class]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tenSV = $request->get('tenSV');
        $email = $request->get('email');
        $password = $request->get('passWord');
        $gioiTinh = $request->get('gioiTinh');
        $ngaySinh = $request->get('ngaySinh');
        $queQuan = $request->get('queQuan');

        Student::where('idSV', $id)->update([
            "tenSV" => $tenSV,
            "email" => $email,
            "passWord" => $password,
            "gioiTinh" => $gioiTinh,
            "ngaySinh" => $ngaySinh,
            "queQuan" => $queQuan,
        ]);
        return redirect(route('student.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('idSV', $id);
        $student->delete();
        return redirect(route('student.index'));
    }
    public function hide($id)
    {
    }
    public function insertByExcel()
    {
        return view('student.insertByExcel');
    }
    public function insertByExcelprocess(Request $request)
    {
        Excel::import(new StudentsImport, $request->file('excel'));
    }
    public function export()
    {
        return Excel::download(new StudentsExport, 'Students.xlsx');
    }
}