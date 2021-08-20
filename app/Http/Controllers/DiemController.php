<?php

namespace App\Http\Controllers;

use App\Models\Diem;
use App\Models\Monhoc;
use App\Models\Lop;
use App\Models\Student;
use Illuminate\Http\Request;


class DiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
        return view('diem.create', ['idL' => $idL, 'class' => $class]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $search = $request->get('search');
        $student = Student::join('diem', 'sinhvien.idSV', '=', 'diem.idSV')->select('*')->where('sinhvien.idL', '=', $id)->where('tenSV', 'LIKE', "%$search%")->paginate(10);
        $class = Monhoc::all();
        return view('diem.show', ['search' => $search, 'student' => $student, 'idL' => $id, 'class' => $class,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}