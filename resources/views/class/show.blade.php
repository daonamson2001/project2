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
                <h3>&ensp;Lớp: {{ $idL }}</h3>
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-hover table-striped">
                            <thead>
                                <?php $dem = 1; ?>
                                <th>STT</th>
                                <th>Mã sinh viên</th>
                                <th>Tên sinh viên</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Quê quán</th>
                                {{-- <th>Lớp</th> --}}
                                <th>Chuyên ngành</th>
                                <th colspan="3" style="text-align: center">Hành động</th>
                            </thead>

                            <tbody>
                                <?php $result = 0; ?>
                                <?php foreach ($student as $sinhvien): ?>
                                <?php $result = count($student); ?>
                                <tr>
                                    <td>&ensp;{{ $dem++ }}</td>
                                    <td>{{ $sinhvien->idSV }}</td>
                                    <td>{{ $sinhvien->tenSV }}</td>
                                    <td>{{ $sinhvien->email }}</td>
                                    <td>{{ $sinhvien->gioiTinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    {{-- Giới tính sẽ được sửa qua Student.php nếu chỉnh gioiTinh->GenderName --}}
                                    <td>{{ $sinhvien->ngaySinh }}</td>
                                    <td>{{ $sinhvien->queQuan }}</td>
                                    {{-- <td>{{ $sinhvien->tenLop }}</td> --}}
                                    <td>{{ $sinhvien->idCN == 1 ? 'Lập trình máy tính' : 'Quản trị mạng' }}</td>
                                    <td><a href="{{ route('diemsinhvien', [$sinhvien->idL, $sinhvien->tenSV, $sinhvien->idSV]) }}"
                                            rel="tooltip" title="Điểm sinh viên" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-magic"></i>
                                        </a>
                                    </td>
                                    <td><a href="{{ route('student.edit', $sinhvien->idSV) }}" rel="tooltip"
                                            title="Sửa thông tin" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('student.destroy', $sinhvien->idSV) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button>
                                                <a href="#" rel="tooltip" title="Ẩn sviên"
                                                    class="btn btn-danger btn-simple btn-xs"
                                                    onclick="return confirm('Bạn có chắc muốn ẩn sinh viên này ?')">
                                                    <i class=" fa fa-times"></i>
                                                </a>
                                            </button>
                                        </form>
                                    </td>
                                    {{-- @endif --}}
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        {{ $student->appends(['search' => '$search'])->links('pagination::bootstrap-4') }}
                    </div>
                    <div style="color:red; position: relative; font-size:18px">
                        <?php $nd = 'Hiện lớp đang trống, hãy thêm sinh viên'; ?>
                        @if ($result == 0)
                            {{ $nd }}
                        @endif
                    </div>
                    </br>
                    <a href="{{ route('student.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info">Thêm sinh viên</button></a>
                </div> <!-- end col-md-12 -->
            </div>
        </div>
    </div>
@endsection
