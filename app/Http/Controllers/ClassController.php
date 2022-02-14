<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\Student;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $class = Lop::where('tenLop', 'LIKE', "%$search%")->where('HoatDong', '=', 1)->paginate(10);
        return view('class.index', ["class" => $class, "search" => $search,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $idL = $req->get('idL');
        $tenLop = $req->get('tenLop');
        $idCN = $req->get('idCN');
        $HoatDong = $req->get('HoatDong');

        $lop = new Lop();
        $lop->idL = $idL;
        $lop->tenLop = $tenLop;
        $lop->idCN = $idCN;
        $lop->HoatDong = $HoatDong;
        $lop->save();
        return redirect(route('class.index'));
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
        $student = Student::join('lop', 'sinhvien.idL', '=', 'lop.idL')->select('*')->where('sinhvien.idL', '=', $id)->where('sinhvien.HoatDong', '=', 1)->where('sinhvien.tenSV', 'LIKE', "%$search%")->paginate(10);
        return view('class.show', ["student" => $student, "idL" => $id, "search" => $search,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Lop::where('idL', '=', $id)->first();
        return view('class.edit', ["class" => $class]);
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
        $tenLop =  $request->get('tenLop');
        $HoatDong = $request->get('HoatDong');
        Lop::where('idL', $id)->update([
            "tenLop" => $tenLop,
            "HoatDong" => $HoatDong == "Có" ? 1 : 0,
        ]);
        return redirect(route('class.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}