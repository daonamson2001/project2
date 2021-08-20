@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header">Thêm lớp</div>
            <div class="content">
                <form method="post" action="{{ route('class.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Mã lớp</label>
                        <input type="text" name="idL" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <input type="text" name="tenLop" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Mã chuyên ngành</label>
                        <select class="form-control" name="idCN">
                            <option value="1">Lập trình máy tính</option>
                            <option value="2">Quản trị mạng</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-fill btn-info" return
                        onclick="Thêm sinh viên thành công">Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
