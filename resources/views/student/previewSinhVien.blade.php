@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <h1>Bản mẫu sinh viên chưa hoàn thiện</h1>
        </br>
        <table class="table table-bordered">
            <thead>
                <?php $dem = 1; ?>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã sinh viên</th>
                <th style="text-align: center">Tên sinh viên</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Giới tính</th>
                <th style="text-align: center">Ngày sinh</th>
                <th style="text-align: center">Tên lớp</th>
                <th style="text-align: center">Quê quán</th>
                <th style="text-align: center">Mật khẩu</th>
                <th style="text-align: center">Hoạt Động</th>
            </thead>
            @foreach ($preview as $sinhvien)
                <tr>
                    <td style="text-align: center">&ensp;{{ $dem++ }} </td>
                    <td style="text-align: center">{{ $sinhvien['ma_sinh_vien'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['ho_ten'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['email'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['gioi_tinh'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['ngay_sinh'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['ten_lop'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['que_quan'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['mat_khau'] }}</td>
                    <td style="text-align: center">{{ $sinhvien['hoat_dong'] }}</td>
                </tr>
            @endforeach
        </table>
        </br>
        <form action="{{ route('student.confirmSinhVien') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-fill btn-info" onclick="return confirm('Thêm thành công !')">Thêm</button>
        </form>
    </div>
@endsection
