<?php

namespace App\Http\Controllers;

use App\Models\Lop;
use App\Models\Monhoc;
use App\Models\Student;
use Illuminate\Http\Request;

class MonhocController extends Controller
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
        $monhoc = Monhoc::all();
        $class = Lop::all();
        return view('monhoc.create', ['idL' => $idL, 'monhoc' => $monhoc, 'class' => $class]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect(route('monhoc.show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $idMH = $request->get('idMH');
        $tenMH = $request->get('tenMH');
        $search = $request->get('search');
        $student = Student::join('diem', 'sinhvien.idSV', '=', 'diem.idSV')->select('*')->where('sinhvien.idL', '=', $id)->where('tenSV', 'LIKE', "%$search%")->paginate(10);
        $class = Monhoc::all();
        return view('monhoc.show', ['search' => $search, 'student' => $student, 'idL' => $id, 'class' => $class, 'tenMH' => $tenMH, 'idMH' => $idMH]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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