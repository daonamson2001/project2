@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <h1>Thêm sinh viên bằng Excel</h1>
        <form method="post" action="{{ route('student.insertByExcelprocess') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="formFileLg" class="form-label">Large file input example</label>
                <input class="form-control form-control-lg" name="excel" id="formFileLg" type="file"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                <button type="submit" class="btn btn-fill btn-info" onclick="return confirm('Thêm sinh viên thành công !')"
                    id="hihi">Thêm sinh viên</button>
            </div>
        </form>
    </div>
@endsection
