@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <form class="navbar-search-form" role="search">
            <div class="input-group">
                <input type="text" value="{{ $search }}" name='search' class="form-control" placeholder="Search...">
                <span class="input-group-addon"><button><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <h2>Môn: {{ $tenMH }}</h2>

        <a href="{{ route('editmonhoc', [$idMH, $tenMH]) }}"><button type="submit" class="btn btn-fill btn-info"
                id="hihi">Sửa môn
                học</button>
        </a>
        {{-- <a href="{{ route('monhoc.destroy') }}"><button type="submit" class="btn btn-fill btn-info" id="hihi">Xóa môn
                học</button></a> --}}
        <table class="table table-hover table-striped">
            <thead>
                <?php $dem = 1; ?>
                <th>STT</th>
                <th>Mã học sinh</th>
                <th>Tên học sinh</th>
                <th>Điểm lí thuyết</th>
                <th>Điểm thực hành</th>
                <th>Điểm thi lại lí thuyết</th>
                <th>Điểm thi lại thực hành</th>
                <th>Nhận xét</th>
                <th colspan="3" style="text-align: right">Hành động</th>
            </thead>
            <tbody>
                {{-- ------------------------ --}}
                {{-- Diem duoi 5 --}}
                <?php $rong = '-'; ?>
                <?php $diemdo1 = 1; ?>
                <?php $diemdo2 = 2; ?>
                <?php $diemdo3 = 3; ?>
                <?php $diemdo4 = 4; ?>
                {{-- Diem tren 5 --}}
                <?php $diemxanh5 = 5; ?>
                <?php $diemxanh6 = 6; ?>
                <?php $diemxanh7 = 7; ?>
                <?php $diemxanh8 = 8; ?>
                <?php $diemxanh9 = 9; ?>
                <?php $diemxanh10 = 10; ?>
                {{-- ---------------------------- --}}
                <?php $result = 0; ?>
                <?php foreach ($monhoc as $sinhvien): ?>
                <?php $result = count($monhoc); ?>
                <tr>
                    <td>&ensp;{{ $dem++ }} </td>
                    <td>{{ $sinhvien->idSV }}</td>
                    <td>{{ $sinhvien->tenSV }}</td>
                    <td style="text-align: center">
                        @if ($sinhvien->LyThuyet == '')
                            <a style="color:pink"> {{ $rong }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo1 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo2 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo3 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo4 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh5)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh6)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh7)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh8)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh9)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh10)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if ($sinhvien->ThucHanh == '')
                            <a style="color:black"> {{ $rong }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo1 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo2 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo3 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo4 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh5)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh6)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh7)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh8)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh9)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh10)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @endif
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="#" rel="tooltip" title="Thông tin lớp" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-user"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" rel="tooltip" title="Môn học" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-magic"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" rel="tooltip" title="Sửa lớp" class="btn btn-success btn-simple btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        {{ $monhoc->appends(['search' => '$search'])->links('pagination::bootstrap-4') }}
        <div style="color:red; position: relative; font-size:18px">
            <?php $nd = 'Hiện điểm đang trống, hãy thêm điểm cho sinh viên !'; ?>
            @if ($result == 0)
                {{ $nd }}
            @endif
        </div>
        </br>
        <a href="{{ route('indexdiem') }}"><button type="submit" class="btn btn-fill btn-info" id="hihi">Thêm
                điểm</button></a>
    </div>
@endsection
