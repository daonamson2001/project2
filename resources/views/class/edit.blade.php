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
            <div class="header">Sửa lớp</div>
            <div class="content">
                <form method="post" action="{{ route('class.update', $class->idL) }}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <input type="text" name="tenLop" value="{{ $class->tenLop }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Chuyên ngành</label>
                        <input type="text" name="idCN"
                            value="{{ $class->idCN == 1 ? 'Lập trình máy tính' : 'Quản trị mạng' }}" readonly
                            class="form-control">
                    </div>
                    <button type="submit" class="btn btn-fill btn-info" onclick="return confirm='Cập nhập thành công !'"
                        id="hihi">Cập
                        nhập</button>
                </form>
            </div>
        </div>
    </div>
@endsection
