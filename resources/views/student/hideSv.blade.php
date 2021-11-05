@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <form class="navbar-search-form" role="search">
            <div class="input-group">
                <input type="text" value="{{ $search }}" name='search' class="form-control" placeholder="Search...">
                <span class="input-group-addon"><button><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <h1>Danh sách sinh viên</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-hover table-striped">
                            <thead>
                                <?php $dem = 1; ?>
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">Mã sinh viên</th>
                                <th style="text-align: center">Tên sinh viên</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Giới tính</th>
                                <th style="text-align: center">Ngày sinh</th>
                                <th style="text-align: center">Quê quán</th>
                                <th style="text-align: center">Lớp</th>
                                <th style="text-align: center">Chuyên ngành</th>
                                <th style="text-align: center">Hành động</th>
                            </thead>

                            <tbody>
                                <?php $result = 0; ?>
                                <?php foreach ($student as $sinhvien): ?>
                                <?php $result = count($student); ?>
                                <tr>
                                    <td style="text-align: center">&ensp;{{ $dem++ }}</td>
                                    <td style="text-align: center">{{ $sinhvien->idSV }}</td>
                                    <td style="text-align: center">{{ $sinhvien->tenSV }}</td>
                                    <td style="text-align: center">{{ $sinhvien->email }}</td>
                                    <td style="text-align: center">{{ $sinhvien->gioiTinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    {{-- Giới tính sẽ được sửa qua Student.php nếu chỉnh gioiTinh->GenderName --}}
                                    <td style="text-align: center">{{ $sinhvien->ngaySinh }}</td>
                                    <td style="text-align: center">{{ $sinhvien->queQuan }}</td>
                                    <td style="text-align: center">{{ $sinhvien->tenLop }}</td>
                                    <td style="text-align: center">
                                        {{ $sinhvien->idCN == 1 ? 'Lập trình máy tính' : 'Quản trị mạng' }}</td>
                                    <td style="text-align: center">
                                        <form action="{{ route('student.activeS', [$sinhvien->idSV]) }}" method="post">
                                            @csrf
                                            @method("PUT")
                                            <button style="border:hidden"
                                                onclick="return confirm('Bạn có chắc muốn hiện sinh viên này ?')"
                                                rel="tooltip" title="Hiện sviên"
                                                class="btn btn-success btn-simple btn-xs"><i class=" fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        {{ $student->appends(['search' => '$search'])->links('pagination::bootstrap-4') }}
                    </div>
                    <div style="color:red; position: relative; font-size:18px">
                        <?php $nd = 'Hiện đang trống !'; ?>
                        @if ($result == 0)
                            {{ $nd }}
                        @endif
                    </div>
                </div> <!-- end col-md-12 -->
            </div>
        </div>
    </div>
@endsection
