@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header">Sửa môn học</div>
            <div class="content">
                <form method="post" action="{{ route('updatemonhoc', $monhoc->idMH) }}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label>Tên môn học</label>
                        <input type="text" name="tenMH" value="{{ $monhoc->tenMH }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Năm học</label>
                        <input type="text" name="idNH" value="Năm {{ $monhoc->idNH }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <input type="text" name="idL" value="{{ $monhoc->idL }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Chuyên ngành</label>
                        <input type="text" name="idCN"
                            value="{{ $monhoc->idCN == 1 ? 'Lập trình máy tính' : 'Quản trị mạng' }}" readonly
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-fill btn-info" onclick="return confirm('Cập nhập thành công !')"
                        id="hihi">Cậpnhập</button>
                </form>
            </div>
        </div>
    </div>
@endsection
