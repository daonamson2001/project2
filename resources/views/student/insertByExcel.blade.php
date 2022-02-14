@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <h1>Thêm sinh viên bằng Excel</h1>
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
        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        @if (session()->has('failures'))
            <table class="table table-danger">
                <tr>
                    <th style="text-align: center">Row</th>
                    <th style="text-align: center">Attributes</th>
                    <th style="text-align: center">Errors</th>
                    <th style="text-align: center">Values</th>
                </tr>
                @foreach (session()->get('failures') as $validation)
                    <tr>
                        <td style="text-align: center;color:red">{{ $validation->row() }}</td>
                        <td style="text-align: center;color:red">{{ $validation->attribute() }}</td>
                        <td style="text-align: center;color:red">
                            <ul>
                                @foreach ($validation->errors() as $e)
                                    {{ $e }}
                                @endforeach
                            </ul>
                        </td>
                        <td style="text-align: center;color:red">
                            {{ $validation->values()[$validation->attribute()] }}</td>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
        <form method="post" action="{{ route('student.insertByExcelprocess') }}" enctype="multipart/form-data">
            @csrf
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
