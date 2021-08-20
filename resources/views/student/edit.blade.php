@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header">Sửa lớp</div>
            <div class="content">
                <form method="post" action="{{ route('student.update', $student->idSV) }}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label>Tên sinh viên</label>
                        <input type="text" name="tenSV" value="{{ $student->tenSV }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $student->email }}" class="form-control">
                    </div>
                    <input type="hidden" name="passWord" value="{{ $student->passWord }}" class="form-control">
                    <div class="form-group">
                        <label>Giới tính</label>
                        <input type="text" name="gioiTinh" value="{{ $student->gioiTinh == 1 ? 'Nam' : 'Nữ' }}"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="text" name="ngaySinh" value="{{ $student->ngaySinh }}" class="form-control"
                            required="true">
                    </div>
                    <div class="form-group">
                        <label>Quê quán</label>
                        <input type="text" name="queQuan" value="{{ $student->queQuan }}" class="form-control"
                            required="true">
                    </div>
                    <div class="form-group">
                        <label>Lớp</label>
                        <input type="text" name="idL" value="{{ $student->idL }}" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-fill btn-info">Cập nhập</button>
                </form>
            </div>
        </div>
    </div>
@endsection
