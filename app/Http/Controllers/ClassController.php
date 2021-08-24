<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lop;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

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
        $class = Lop::where('tenLop', 'LIKE', "%$search%")->paginate(10);
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $dt = Carbon::create(2018, 10, 18, 14, 40, 16);
        $dt2 = Carbon::create(2018, 10, 18, 13, 40, 16);
        $now = Carbon::now();
        $dt->diffForHumans($now); //12 phút trước
        $dt2->diffForHumans($now); //1 giờ trước
        return view('class.index', ["class" => $class, "search" => $search, 'dt' => $dt]);
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

        $lop = new Lop();
        $lop->idL = $idL;
        $lop->tenLop = $tenLop;
        $lop->idCN = $idCN;
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
        $student = Student::join('lop', 'sinhvien.idL', '=', 'lop.idL')->select('*')->where('sinhvien.idL', '=', $id)->where('tenSV', 'LIKE', "%$search%")->paginate(10);
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
        Lop::where('idL', $id)->update([
            "tenLop" => $tenLop,
        ]);
        return redirect(route('class.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lop = Lop::find($id);
        $lop->delete();
        return redirect(route('class.index'));
    }
    public function hide($tenLop)
    {
        echo $tenLop;
    }
}