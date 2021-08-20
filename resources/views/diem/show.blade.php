@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <form class="navbar-search-form" role="search">
            <div class="input-group">
                <input type="text" value="{{ $search }}" name='search' class="form-control" placeholder="Search...">
                <span class="input-group-addon"><button><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <h2>Điểm lớp: {{ $idL }}</h2>
        <div class="content content-full-width">
            <ul role="tablist" class="nav nav-tabs">
                <li role="presentation" class="active">
                    <a href="#icon-info" data-toggle="tab"> Năm nhất</a>
                </li>
                <li>
                    <a href="#icon-account" data-toggle="tab"> Năm hai</a>
                </li>
                <li>
                    <a href="#icon-style" data-toggle="tab"> Năm ba</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="icon-info" class="tab-pane active">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="3" style="text-align: center">Môn học</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <thead>
                            <?php $dem = 1; ?>
                            <?php $idMH = 1; ?>
                            <th>STT</th>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            @foreach ($class as $monhoc)
                                @if ($monhoc->idNH == $idMH)
                                    @if ($monhoc->idL == $idL)
                                        <th>{{ $monhoc->tenMH }}</th>
                                    @endif
                                @endif
                            @endforeach
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="3" style="text-align: center">Hành động</th>
                        </thead>
                        <tbody>
                            <?php foreach ($student as $sinhvien): ?>
                            <tr>
                                <td>&ensp;{{ $dem++ }} </td>
                                <td>{{ $sinhvien->idSV }}</td>
                                <td>{{ $sinhvien->tenSV }}</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="{{ route('diem.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info">Thêm
                            điểm</button></a>
                    <a href="{{ route('monhoc.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info">Thêm
                            môn học</button></a>
                </div>
                <div id="icon-account" class="tab-pane">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="3" style="text-align: center">Môn học</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <thead>
                            <?php $dem = 1; ?>
                            <?php $idMH = 2; ?>
                            <th>STT</th>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            @foreach ($class as $monhoc)
                                @if ($monhoc->idNH == $idMH)
                                    @if ($monhoc->idL == $idL)
                                        <th>{{ $monhoc->tenMH }}</th>
                                    @endif
                                @endif
                            @endforeach
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="3" style="text-align: center">Hành động</th>
                        </thead>
                        <tbody>
                            <?php foreach ($student as $sinhvien): ?>
                            <tr>
                                <td>&ensp;{{ $dem++ }} </td>
                                <td>{{ $sinhvien->idSV }}</td>
                                <td>{{ $sinhvien->tenSV }}</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="{{ route('diem.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info">Thêm
                            điểm</button></a>
                    <a href="{{ route('monhoc.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info">Thêm
                            môn học</button></a>
                </div>
                <div id="icon-style" class="tab-pane">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="3" style="text-align: center">Môn học</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        <thead>
                            <?php $dem = 1; ?>
                            <?php $idMH = 3; ?>
                            <th>STT</th>
                            <th>Mã sinh viên</th>
                            <th>Tên sinh viên</th>
                            @foreach ($class as $monhoc)
                                @if ($monhoc->idNH == $idMH)
                                    @if ($monhoc->idL == $idL)
                                        <th>{{ $monhoc->tenMH }}</th>
                                    @endif
                                @endif
                            @endforeach
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="3" style="text-align: center">Hành động</th>
                        </thead>
                        <tbody>
                            <?php foreach ($student as $sinhvien): ?>
                            <tr>
                                <td>&ensp;{{ $dem++ }} </td>
                                <td>{{ $sinhvien->idSV }}</td>
                                <td>{{ $sinhvien->tenSV }}</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="{{ route('diem.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info">Thêm
                            điểm</button></a>
                    <a href="{{ route('monhoc.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info">Thêm
                            môn học</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
