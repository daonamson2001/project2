<style>
    #hihi:hover {
        color: black;
        background: white;
    }

</style>
@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header">Thêm sinh viên</div>
            <div class="content">
                <form method="post" action="{{ route('student.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Mã sinh viên</label>
                        <input type="text" name="idSV" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Tên sinh viên</label>
                        <input type="text" name="tenSV" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="passWord" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <input type="radio" value="1" name="gioiTinh" checked>Nam
                        <input type="radio" value="0" name="gioiTinh">Nữ
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="text" name="ngaySinh" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Quê quán</label>
                        <input type="text" name="queQuan" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <select class="form-control" name="idL">
                            @foreach ($class as $lop)
                                <option value="{{ $lop->idL }}" @if ($lop->idL == $idL) selected @endif>{{ $lop->idL }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-fill btn-info"
                        onclick="return confirm('Thêm sinh viên thành công !')" id="hihi">Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
