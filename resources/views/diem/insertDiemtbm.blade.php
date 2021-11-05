@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <h1>Thêm điểm trung bình của sinh viên bằng Excel</h1>
        @if (session('status'))
            <div class="alert alert-danger" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="{{ route('previewDiemtbm') }}" enctype="multipart/form-data">
            @csrf
            @method("GET")
            <div class="form-group">
                <label for="formFileLg" class="form-label">Hí looo</label>
                <input class="form-control form-control-lg" name="excel" id="formFileLg" type="file"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                    required="true">
                </br>
                <button type="submit" class="btn btn-fill btn-info">Thêm điểm</button>
            </div>
        </form>
        <a href="{{ route('sample') }}"><button type="submit" class="btn btn-fill btn-info">Bản mẫu Excel full
                toping 0% đường và nhiều chân châu trắng</button></a>
    </div>
@endsection
