@extends('layouts.layout-sv')
@section('main')
    <div class="main-content">
        <form class="navbar-search-form" role="search">
            <div class="input-group">
                <input type="text" value="{{ $search }}" name='search' class="form-control" placeholder="Search...">
                <span class="input-group-addon"><button><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <h2>Môn thi lại: {{ $tenMH }}</h2>
        <table class=" table table-hover table-striped">
            <thead>
                <th style="text-align: center">Mã học sinh</th>
                <th style="text-align: center">Tên học sinh</th>
                <th style="text-align: center">Điểm thi lại lí thuyết</th>
                <th style="text-align: center">Điểm thi lại thực hành</th>
                <th style="text-align: center">Nhận xét</th>
            </thead>
            <tbody>
                <?php $rong = '-'; ?>
                <?php $result = 0; ?>
                <?php foreach ($monhoclai as $sinhvien): ?>
                <?php $result = count($monhoclai); ?>
                <tr>
                    <td style="text-align: center">{{ $sinhvien->idSV }}</td>
                    <td style="text-align: center">{{ $sinhvien->tenSV }}</td>
                    <td style="text-align: center">
                        @if ($sinhvien->ThiLaiLyThuyet == '')
                            <a style="color:hotpink">{{ $rong }}</a>
                        @elseif($sinhvien->ThiLaiLyThuyet==0or$sinhvien->ThiLaiLyThuyet==1or$sinhvien->ThiLaiLyThuyet==2
                            or$sinhvien->ThiLaiLyThuyet==3or$sinhvien->ThiLaiLyThuyet==4)
                            <a style="color:red"> {{ $sinhvien->ThiLaiLyThuyet }}</a>
                        @elseif($sinhvien->ThiLaiLyThuyet==5or$sinhvien->ThiLaiLyThuyet==6or$sinhvien->ThiLaiLyThuyet==7
                            or$sinhvien->ThiLaiLyThuyet==8or$sinhvien->ThiLaiLyThuyet==9or$sinhvien->ThiLaiLyThuyet==10)
                            <a style="color:#0099FF"> {{ $sinhvien->ThiLaiLyThuyet }}</a>
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if ($sinhvien->ThiLaiThucHanh == '')
                            <a style="color:hotpink">{{ $rong }}</a>
                        @elseif($sinhvien->ThiLaiThucHanh==0or$sinhvien->ThiLaiThucHanh==1or$sinhvien->ThiLaiThucHanh==2
                            or$sinhvien->ThiLaiThucHanh==3or$sinhvien->ThiLaiThucHanh==4)
                            <a style="color:red"> {{ $sinhvien->ThiLaiThucHanh }}</a>
                        @elseif($sinhvien->ThiLaiThucHanh==5or$sinhvien->ThiLaiThucHanh==6or$sinhvien->ThiLaiThucHanh==7
                            or$sinhvien->ThiLaiThucHanh==8or$sinhvien->ThiLaiThucHanh==9or$sinhvien->ThiLaiThucHanh==10)
                            <a style="color:#0099FF"> {{ $sinhvien->ThiLaiThucHanh }}</a>
                        @endif
                    </td>
                    <?php $quamon = 'Qua môn'; ?>
                    <?php $hoclai = 'Thi Lại'; ?>
                    <td style="text-align: center">
                        @if ($sinhvien->ThiLaiLyThuyet == '')
                            @if ($sinhvien->ThiLaiThucHanh == 0 or $sinhvien->ThiLaiThucHanh == 1 or $sinhvien->ThiLaiThucHanh == 2 or $sinhvien->ThiLaiThucHanh == 3 or $sinhvien->ThiLaiThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThiLaiThucHanh==5or$sinhvien->ThiLaiThucHanh==6or$sinhvien->ThiLaiThucHanh==7
                                or$sinhvien->ThiLaiThucHanh==8or$sinhvien->ThiLaiThucHanh==9or$sinhvien->ThiLaiThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->ThiLaiThucHanh =='')
                            @if ($sinhvien->ThiLaiLyThuyet == 0 or $sinhvien->ThiLaiLyThuyet == 1 or $sinhvien->ThiLaiLyThuyet == 2 or $sinhvien->ThiLaiLyThuyet == 3 or $sinhvien->ThiLaiLyThuyet == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThiLaiLyThuyet==5or$sinhvien->ThiLaiLyThuyet==6or$sinhvien->ThiLaiLyThuyet==7
                                or$sinhvien->ThiLaiLyThuyet==8or$sinhvien->ThiLaiLyThuyet==9or$sinhvien->ThiLaiLyThuyet==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->ThiLaiLyThuyet==0or$sinhvien->ThiLaiLyThuyet==1or$sinhvien->ThiLaiLyThuyet==2or$sinhvien->ThiLaiLyThuyet==3or$sinhvien->ThiLaiLyThuyet==4)
                            <a style="color:red">{{ $hoclai }}</a>
                        @elseif($sinhvien->ThiLaiLyThuyet==5)
                            @if ($sinhvien->ThiLaiThucHanh == 0 or $sinhvien->ThiLaiThucHanh == 1 or $sinhvien->ThiLaiThucHanh == 2 or $sinhvien->ThiLaiThucHanh == 3 or $sinhvien->ThiLaiThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThiLaiThucHanh==5or$sinhvien->ThiLaiThucHanh==6or$sinhvien->ThiLaiThucHanh==7
                                or$sinhvien->ThiLaiThucHanh==8or$sinhvien->ThiLaiThucHanh==9or$sinhvien->ThiLaiThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->ThiLaiLyThuyet==6)
                            @if ($sinhvien->ThiLaiThucHanh == 0 or $sinhvien->ThiLaiThucHanh == 1 or $sinhvien->ThiLaiThucHanh == 2 or $sinhvien->ThiLaiThucHanh == 3 or $sinhvien->ThiLaiThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThiLaiThucHanh==5or$sinhvien->ThiLaiThucHanh==6or$sinhvien->ThiLaiThucHanh==7
                                or$sinhvien->ThiLaiThucHanh==8or$sinhvien->ThiLaiThucHanh==9or$sinhvien->ThiLaiThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->ThiLaiLyThuyet==7)
                            @if ($sinhvien->ThiLaiThucHanh == 0 or $sinhvien->ThiLaiThucHanh == 1 or $sinhvien->ThiLaiThucHanh == 2 or $sinhvien->ThiLaiThucHanh == 3 or $sinhvien->ThiLaiThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThiLaiThucHanh==5or$sinhvien->ThiLaiThucHanh==6or$sinhvien->ThiLaiThucHanh==7
                                or$sinhvien->ThiLaiThucHanh==8or$sinhvien->ThiLaiThucHanh==9or$sinhvien->ThiLaiThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->ThiLaiLyThuyet==8)
                            @if ($sinhvien->ThiLaiThucHanh == 0 or $sinhvien->ThiLaiThucHanh == 1 or $sinhvien->ThiLaiThucHanh == 2 or $sinhvien->ThiLaiThucHanh == 3 or $sinhvien->ThiLaiThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThiLaiThucHanh==5or$sinhvien->ThiLaiThucHanh==6or$sinhvien->ThiLaiThucHanh==7
                                or$sinhvien->ThiLaiThucHanh==8or$sinhvien->ThiLaiThucHanh==9or$sinhvien->ThiLaiThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->ThiLaiLyThuyet==9)
                            @if ($sinhvien->ThiLaiThucHanh == 0 or $sinhvien->ThiLaiThucHanh == 1 or $sinhvien->ThiLaiThucHanh == 2 or $sinhvien->ThiLaiThucHanh == 3 or $sinhvien->ThiLaiThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThiLaiThucHanh==5or$sinhvien->ThiLaiThucHanh==6or$sinhvien->ThiLaiThucHanh==7
                                or$sinhvien->ThiLaiThucHanh==8or$sinhvien->ThiLaiThucHanh==9or$sinhvien->ThiLaiThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->ThiLaiLyThuyet==10)
                            @if ($sinhvien->ThiLaiThucHanh == 0 or $sinhvien->ThiLaiThucHanh == 1 or $sinhvien->ThiLaiThucHanh == 2 or $sinhvien->ThiLaiThucHanh == 3 or $sinhvien->ThiLaiThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThiLaiThucHanh==5or$sinhvien->ThiLaiThucHanh==6or$sinhvien->ThiLaiThucHanh==7
                                or$sinhvien->ThiLaiThucHanh==8or$sinhvien->ThiLaiThucHanh==9or$sinhvien->ThiLaiThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @endif
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div style="color: red; font-size:18px">
            <?php $nd = 'Hiện sinh viên đã qua môn hoặc điểm đang trong quá trình update. Xin lòng quay lại sau !'; ?>
            @if ($result == 0)
                {{ $nd }}
            @endif
        </div>
    </div>
@endsection
