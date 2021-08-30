@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <h1>Thêm sinh viên bằng Excel</h1>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $errors }}
                @endforeach
            </div>
        @endif

        @if (session()->has('failures'))
            <table class="table table-danger">
                <tr>
                    <th>Cột</th>
                    <th>Email</th>
                    <th>Lỗi</th>
                    <th>Dữ liệu</th>
                </tr>
                @foreach (session()->get('failures') as $validation)
                    <tr>
                        <td>{{ $validation->row() }}</td>
                        <td>{{ $validation->attribute() }}</td>
                        <td>
                            <ul>
                                @foreach ($validation->errors() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            {{ $validation->values()[$validation->attribute()] }}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
        <form method="post" action="{{ route('student.insertByExcelprocess') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="formFileLg" class="form-label">Hí looo</label>
                <input class="form-control form-control-lg" name="excel" id="formFileLg" type="file"
                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                </br>
                <button type="submit" class="btn btn-fill btn-info">Thêm sinh viên</button>
            </div>
        </form>
    </div>
@endsection
