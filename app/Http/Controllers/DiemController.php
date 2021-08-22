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

        return view('diem.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $idL, $idNH)
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
        //
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
}