@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <h1>Bản mẫu thi lại chưa hoàn thiện</h1>
        </br>
        <table class="table table-bordered">
            <thead>
                <?php $dem = 1; ?>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã sinh viên</th>
                <th style="text-align: center">Mã môn học</th>
                <th style="text-align: center">Mã năm học</th>
                <th style="text-align: center">Thời gian của môn được thêm</th>
                <th style="text-align: center">Điểm thi lại lý thuyết</th>
                <th style="text-align: center">Điểm thi lại thực hành</th>
            </thead>
            @foreach ($preview as $sinhvien)
                <tr>
                    <td style="text-align: center">&ensp;{{ $dem++ }} </td>
                    <td style="text-align: center">{{ $sinhvien['ma_sinh_vien'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['ma_mon_hoc'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['ma_nam_hoc'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['thoi_gian_cua_mon_duoc_them'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['diem_ly_thuyet_thi_lai'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['diem_thuc_hanh_thi_lai'] }}</td>
                </tr>
            @endforeach
        </table>
        </br>
        <form action="{{ route('confirmDiem') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-fill btn-info" onclick="return confirm('Thêm thành công !')">Thêm</button>
        </form>
    </div>
@endsection
