@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header">Thêm lớp</div>
            <div class="content">
                <form method="post" action="{{ route('class.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Mã lớp</label>
                        <input type="text" name="idL" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <input type="text" name="tenLop" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mã chuyên ngành</label>
                        <input type="text" name="idCN" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-fill btn-info">Thêm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
