<style>
    #hihi {
        position: relative;
        float: right;
        background: #FAF0E6;
        top: -53px;
        padding: 5px 20px;
        border: 2px solid pink;
        transition: 0.6s ease;
        color: black !important;
    }

    #hihi:hover {
        background-color: #F5F5F5;
        border: 2px solid #F5F5F5;
        color: hotpink !important;
        transition: 1s ease;
    }

    #hehee {
        float: left;
        right: -40px;
        position: relative;
    }

    #heheee {
        float: right;
        right: -70px;
        position: relative;
    }

    #hi {
        position: relative;
        top: 8px;
    }

</style>
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
        <div style="float: right; color:#F5F5F5">|</div>
        <form action="{{ route('deletemonhoc', [$idMH, $idL]) }}" method="post">
            {{-- @method("DELETE") --}}
            @method("PUT")
            @csrf
            <button type="submit" class="btn btn-fill btn-info" id="hihi"
                onclick="return confirm('Bạn có chắc muốn xóa môn học này ?')">
                Xóa môn học
            </button>
        </form>
        {{-- <a href="{{ route('monhoc.destroy') }}"><button type="submit" class="btn btn-fill btn-info" id="hihi">Xóa môn
                học</button></a> --}}
        <table class=" table table-hover table-striped">
            <thead>
                <?php $dem = 1; ?>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã học sinh</th>
                <th style="text-align: center">Tên học sinh</th>
                <th style="text-align: center">Điểm lí thuyết</th>
                <th style="text-align: center">Điểm thực hành</th>
                <th style="text-align: center">Nhận xét</th>
                <th colspan="3" style="text-align: center">Hành động</th>
            </thead>
            <tbody>
                {{-- ------------------------ --}}
                {{-- Diem duoi 5 --}}
                <?php $rong = '-'; ?>
                {{-- ---------------------------- --}}
                <?php $result = 0; ?>
                <?php foreach ($monhoc as $sinhvien): ?>
                <?php $result = count($monhoc); ?>
                <tr>
                    <td style="text-align: center">&ensp;{{ $dem++ }} </td>
                    <td style="text-align: center">{{ $sinhvien->idSV }}</td>
                    <td style="text-align: center">{{ $sinhvien->tenSV }}</td>
                    <td style="text-align: center">
                        @if ($sinhvien->LyThuyet == '')
                            <a style="color:hotpink">{{ $rong }}</a>
                        @elseif($sinhvien->LyThuyet==0or$sinhvien->LyThuyet==1or$sinhvien->LyThuyet==2
                            or$sinhvien->LyThuyet==3or$sinhvien->LyThuyet==4)
                            <a style="color:red"> {{ $sinhvien->LyThuyet }}</a>
                        @elseif($sinhvien->LyThuyet==5or$sinhvien->LyThuyet==6or$sinhvien->LyThuyet==7
                            or$sinhvien->LyThuyet==8or$sinhvien->LyThuyet==9or$sinhvien->LyThuyet==10)
                            <a style="color:#0099FF"> {{ $sinhvien->LyThuyet }}</a>
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if ($sinhvien->ThucHanh == '')
                            <a style="color:hotpink">{{ $rong }}</a>
                        @elseif($sinhvien->ThucHanh==0or$sinhvien->ThucHanh==1or$sinhvien->ThucHanh==2
                            or$sinhvien->ThucHanh==3or$sinhvien->ThucHanh==4)
                            <a style="color:red"> {{ $sinhvien->ThucHanh }}</a>
                        @elseif($sinhvien->ThucHanh==5or$sinhvien->ThucHanh==6or$sinhvien->ThucHanh==7
                            or$sinhvien->ThucHanh==8or$sinhvien->ThucHanh==9or$sinhvien->ThucHanh==10)
                            <a style="color:#0099FF"> {{ $sinhvien->ThucHanh }}</a>
                        @endif
                    </td>
                    <?php $quamon = 'Qua môn'; ?>
                    <?php $hoclai = 'Thi Lại'; ?>
                    <td style="text-align: center">
                        @if ($sinhvien->LyThuyet == '')
                            @if ($sinhvien->ThucHanh == 0 or $sinhvien->ThucHanh == 1 or $sinhvien->ThucHanh == 2 or $sinhvien->ThucHanh == 3 or $sinhvien->ThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThucHanh==5or$sinhvien->ThucHanh==6or$sinhvien->ThucHanh==7
                                or$sinhvien->ThucHanh==8or$sinhvien->ThucHanh==9or$sinhvien->ThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->ThucHanh =='')
                            @if ($sinhvien->LyThuyet == 0 or $sinhvien->LyThuyet == 1 or $sinhvien->LyThuyet == 2 or $sinhvien->LyThuyet == 3 or $sinhvien->LyThuyet == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->LyThuyet==5or$sinhvien->LyThuyet==6or$sinhvien->LyThuyet==7
                                or$sinhvien->LyThuyet==8or$sinhvien->LyThuyet==9or$sinhvien->LyThuyet==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->LyThuyet==0or$sinhvien->LyThuyet==1or$sinhvien->LyThuyet==2or$sinhvien->LyThuyet==3or$sinhvien->LyThuyet==4)
                            <a style="color:red">{{ $hoclai }}</a>
                        @elseif($sinhvien->LyThuyet==5)
                            @if ($sinhvien->ThucHanh == 0 or $sinhvien->ThucHanh == 1 or $sinhvien->ThucHanh == 2 or $sinhvien->ThucHanh == 3 or $sinhvien->ThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThucHanh==5or$sinhvien->ThucHanh==6or$sinhvien->ThucHanh==7
                                or$sinhvien->ThucHanh==8or$sinhvien->ThucHanh==9or$sinhvien->ThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->LyThuyet==6)
                            @if ($sinhvien->ThucHanh == 0 or $sinhvien->ThucHanh == 1 or $sinhvien->ThucHanh == 2 or $sinhvien->ThucHanh == 3 or $sinhvien->ThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThucHanh==5or$sinhvien->ThucHanh==6or$sinhvien->ThucHanh==7
                                or$sinhvien->ThucHanh==8or$sinhvien->ThucHanh==9or$sinhvien->ThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->LyThuyet==7)
                            @if ($sinhvien->ThucHanh == 0 or $sinhvien->ThucHanh == 1 or $sinhvien->ThucHanh == 2 or $sinhvien->ThucHanh == 3 or $sinhvien->ThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThucHanh==5or$sinhvien->ThucHanh==6or$sinhvien->ThucHanh==7
                                or$sinhvien->ThucHanh==8or$sinhvien->ThucHanh==9or$sinhvien->ThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->LyThuyet==8)
                            @if ($sinhvien->ThucHanh == 0 or $sinhvien->ThucHanh == 1 or $sinhvien->ThucHanh == 2 or $sinhvien->ThucHanh == 3 or $sinhvien->ThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThucHanh==5or$sinhvien->ThucHanh==6or$sinhvien->ThucHanh==7
                                or$sinhvien->ThucHanh==8or$sinhvien->ThucHanh==9or$sinhvien->ThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->LyThuyet==9)
                            @if ($sinhvien->ThucHanh == 0 or $sinhvien->ThucHanh == 1 or $sinhvien->ThucHanh == 2 or $sinhvien->ThucHanh == 3 or $sinhvien->ThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThucHanh==5or$sinhvien->ThucHanh==6or$sinhvien->ThucHanh==7
                                or$sinhvien->ThucHanh==8or$sinhvien->ThucHanh==9or$sinhvien->ThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @elseif($sinhvien->LyThuyet==10)
                            @if ($sinhvien->ThucHanh == 0 or $sinhvien->ThucHanh == 1 or $sinhvien->ThucHanh == 2 or $sinhvien->ThucHanh == 3 or $sinhvien->ThucHanh == 4)
                                <a style="color:red">{{ $hoclai }}</a>
                            @elseif($sinhvien->ThucHanh==5or$sinhvien->ThucHanh==6or$sinhvien->ThucHanh==7
                                or$sinhvien->ThucHanh==8or$sinhvien->ThucHanh==9or$sinhvien->ThucHanh==10)
                                <a style="color:#0099FF">{{ $quamon }}</a>
                            @endif
                        @endif
                    </td>
                    <td style="text-align: right">
                        <a href="{{ route('editDiem', [$sinhvien->idSV, $sinhvien->idL, $sinhvien->idMH, $sinhvien->tenMH]) }}"
                            rel="tooltip" title="Sửa điểm" class="btn btn-info btn-simple btn-xs">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td style="text-align: center" id="hi">
                        <form action="{{ route('deleteDiem', [$sinhvien->idSV, $sinhvien->idMH, $sinhvien->idNH]) }}"
                            method="post">
                            @csrf
                            @method('PUT')
                            <button style="border:hidden" onclick="return confirm('Bạn có chắc muốn xóa điểm này ?')"
                                rel="tooltip" title="Xóa điểm" class="btn btn-danger btn-simple btn-xs"><i
                                    class=" fa fa-times"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('diemthilai', [$sinhvien->idL, $sinhvien->tenMH, $sinhvien->idMH]) }}"
                            rel="tooltip" title="Điểm thi lại" class="btn btn-success btn-simple btn-xs">
                            <i class="fa fa-magic"></i>
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
        <a href="{{ route('insertDiemByExcel') }}"><button type="submit" class="btn btn-fill btn-info">Thêm
                điểm</button></a>
        <a href="{{ route('DowDiemMonHoc', [$idL, $idMH]) }}"><button type="submit" class="btn btn-fill btn-info">Tải điểm
                môn
                học</button></a>
    </div>
@endsection
