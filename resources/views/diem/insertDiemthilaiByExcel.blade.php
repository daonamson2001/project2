@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <h1>Thêm điểm thi lại sinh viên bằng Excel</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <form method="post" action="{{ route('insertDiemthilaiByExcelprocess') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="formFileLg" class="form-label">Hí looo</label>
                <input class="form-control form-control-lg" required="true" name="excel" id="formFileLg" type="file"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                </br></br>
                <button type="submit" class="btn btn-fill btn-info">Thêm điểm</button>
            </div>
        </form>
        {{-- <a href="{{ route('exportDiemthilai') }}"><button type="submit" class="btn btn-fill btn-info">Danh sách điểm thi
                lại sinh
                viên</button></a> --}}

        </br>
        <a href="{{ route('sampleDiem') }}"><button type="submit" class="btn btn-fill btn-info">Bản mẫu Excel full
                toping 0% đường và nhiều chân châu trắng</button></a>
    </div>
@endsection
