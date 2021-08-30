@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header">Sửa điểm môn học: {{ $tenMH }}</div>
            <div class="content">
                <form method="post" action="{{ route('updateDiemthilai', [$diem->idSV, $idL, $tenMH, $diem->idMH]) }}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label>Điểm thi lại lý thuyết</label>
                        <input type="text" name="ThiLaiLyThuyet" value="{{ $diem->ThiLaiLyThuyet }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Điểm thi lại thực hành</label>
                        <input type="text" name="ThiLaiThucHanh" value="{{ $diem->ThiLaiThucHanh }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Thời gian sửa điểm lần cuối</label>
                        <input type="date" name="ThoiGian" value="{{ $diem->ThoiGian }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mã môn học</label>
                        <input type="text" name="idMH" value="{{ $diem->idMH }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Năm học</label>
                        <input type="text" name="idNH" value="{{ $diem->idNH }}" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-fill btn-info"
                        onclick="return confirm('Cập nhập thành công !')">Cập
                        nhập</button>
                </form>
            </div>
        </div>
    </div>
@endsection
