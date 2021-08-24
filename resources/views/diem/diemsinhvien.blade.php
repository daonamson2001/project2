@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <form class="navbar-search-form" role="search">
            <div class="input-group">
                <input type="text" value="{{ $search }}" name='search' class="form-control" placeholder="Search...">
                <span class="input-group-addon"><button><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <h2>Tên sinh viên : {{ $tenSV }}</h2>
        <table class="table table-hover table-striped">
            <thead>
                <?php $dem = 1; ?>
                <th>STT</th>
                <th>Mã môn học</th>
                <th>Tên môn học</th>
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
                <?php $diemdo125 = 1.25; ?>
                <?php $diemdo15 = 1.5; ?>
                <?php $diemdo175 = 1.75; ?>

                <?php $diemdo2 = 2; ?>
                <?php $diemdo225 = 2.25; ?>
                <?php $diemdo25 = 2.5; ?>
                <?php $diemdo275 = 2.75; ?>

                <?php $diemdo3 = 3; ?>
                <?php $diemdo325 = 3.25; ?>
                <?php $diemdo35 = 3.5; ?>
                <?php $diemdo375 = 3.75; ?>

                <?php $diemdo4 = 4; ?>
                <?php $diemdo425 = 4.25; ?>
                <?php $diemdo45 = 4.5; ?>
                <?php $diemdo475 = 4.75; ?>
                {{-- Diem tren 5 --}}
                <?php $diemxanh5 = 5; ?>
                <?php $diemxanh525 = 5.25; ?>
                <?php $diemxanh55 = 5.5; ?>
                <?php $diemxanh575 = 5.75; ?>

                <?php $diemxanh6 = 6; ?>
                <?php $diemxanh625 = 6.25; ?>
                <?php $diemxanh65 = 6.5; ?>
                <?php $diemxanh675 = 6.75; ?>

                <?php $diemxanh7 = 7; ?>
                <?php $diemxanh725 = 7.25; ?>
                <?php $diemxanh75 = 7.5; ?>
                <?php $diemxanh775 = 7.75; ?>

                <?php $diemxanh8 = 8; ?>
                <?php $diemxanh825 = 8.25; ?>
                <?php $diemxanh85 = 8.5; ?>
                <?php $diemxanh875 = 8.75; ?>

                <?php $diemxanh9 = 9; ?>
                <?php $diemxanh925 = 9.25; ?>
                <?php $diemxanh95 = 9.5; ?>
                <?php $diemxanh975 = 9.75; ?>

                <?php $diemxanh10 = 10; ?>
                {{-- ---------------------------- --}}
                <?php $result = 0; ?>
                <?php $bienrong = ''; ?>
                <?php foreach ($diem as $sinhvien): ?>
                <?php $result = count($diem); ?>
                <tr>
                    <td>&ensp;{{ $dem++ }} </td>
                    <td>{{ $sinhvien->idMH }}</td>
                    <td>{{ $sinhvien->tenMH }}</td>
                    <td style="text-align: center">
                        @if ($sinhvien->LyThuyet == '')
                            <a style="color:hotpink">{{ $rong }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo1 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo125 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo15 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo175 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo2 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo225 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo25 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo275 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo3 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo325 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo35 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo375 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo4 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo425 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo45 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemdo475 )
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh5)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh525)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh55)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh575)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh6)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh625)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh65)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh675)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh7)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh725)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh75)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh775)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh8)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh825)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh85)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh875)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh9)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh925)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh95)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh975)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet == $diemxanh10)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if ($sinhvien->ThucHanh == '')
                            <a style="color:hotpink">{{ $rong }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo1 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo125 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo15 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo175 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo2 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo225 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo25 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo275 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo3 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo325 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo35 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo375 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo4 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo425 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo45 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemdo475 )
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh5)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh525)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh55)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh575)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh6)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh625)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh65)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh675)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh7)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh725)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh75)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh775)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh8)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh825)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh85)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh875)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh9)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh925)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh95)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh == $diemxanh975)
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
        <div style="color: red; font-size:18px">
            <?php $nd = 'Hiện điểm đang trống, hay thêm điểm cho sinh viên !'; ?>
            @if ($result == 0)
                {{ $nd }}
            @endif
        </div>
    </div>
@endsection
