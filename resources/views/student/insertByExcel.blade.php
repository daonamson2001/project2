@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <h1>Thêm sinh viên bằng Excel</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="post" action="{{ route('student.previewSinhVien') }}" enctype="multipart/form-data">
            @csrf
            @method("GET")
            <div class="form-group">
                <label for="formFileLg" class="form-label">Hí looo</label>
                <input class="form-control form-control-lg" name="excel" id="formFileLg" type="file" required="true"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                </br>
                <button type="submit" class="btn btn-fill btn-info">Thêm sinh viên</button>
            </div>
        </form>
    </div>
@endsection
