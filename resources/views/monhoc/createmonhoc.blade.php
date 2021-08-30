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
            <div class="header">Thêm môn học</div>
            <div class="content">
                <form method="post" action="{{ route('store') }}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label>Mã môn học</label>
                        <input type="text" name="idMH" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Tên môn học</label>
                        <input type="text" name="tenMH" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Chuyên ngành</label>
                        <select class="form-control" name="idCN">
                            <option value="1">Lập trình máy tính</option>
                            <option value="2">Quản trị mạng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Năm học</label>
                        <select class="form-control" name="idNH">
                            <option value="1">Năm 1</option>
                            <option value="2">Năm 2</option>
                            <option value="3">Năm 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <input type="text" name="idL" value="{{ $idL }}" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-fill btn-info" onclick="return confirm('Thêm môn học thành công')"
                        id="hihi">
                        Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
