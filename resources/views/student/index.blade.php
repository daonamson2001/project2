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
            <form>
                Chọn lớp:<select name="idL" class="form-control">
                    <option selected>---</option>
                    <?php foreach ($class as $lop) : ?>
                    <option value="{{ $lop->idL }}" @if ($lop->idL == $idL) selected @endif>{{ $lop->tenLop }}</option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-fill btn-info">Chọn</button>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="toolbar">
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Mã sinh viên</th>
                                <th>Tên sinh viên</th>
                                <th>Email</th>
                                <th>Giới tính</th>
                                <th>Ngày sinh</th>
                                <th>Quê quán</th>
                                <th>Lớp</th>
                                <th colspan="3" style="text-align: center">Hành động</th>
                            </thead>
                            <tbody>
                                <?php foreach ($student as $sinhvien): ?>
                                <tr>
                                    <td>{{ $sinhvien->idSV }}</td>
                                    <td>{{ $sinhvien->tenSV }}</td>
                                    <td>{{ $sinhvien->email }}</td>
                                    <td>{{ $sinhvien->gioiTinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    {{-- Giới tính sẽ được sử qua Student.php nếu chỉnh gioiTinh->GenderName --}}
                                    <td>{{ $sinhvien->ngaySinh }}</td>
                                    <td>{{ $sinhvien->queQuan }}</td>
                                    <td>{{ $sinhvien->tenLop }}</td>
                                    <td><a href="" rel="tooltip" title="Điểm sinh viên"
                                            class="btn btn-info btn-simple btn-xs">
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
                                                <a href="#" rel="tooltip" title="Ẩn sinh viên"
                                                    class="btn btn-danger btn-simple btn-xs"
                                                    onclick="return confirm('Bạn có chắc muốn ẩn sinh viên này ?')">
                                                    <i class=" fa fa-times"></i>
                                                </a>
                                            </button>
                                        </form>
                                    </td>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                        {{-- {{ $student1->appends(['search' => '$search'])->links('pagination::bootstrap-4') }} --}}
                    </div><!--  end card  -->
                    <a href="{{ route('student.create', ['idL' => $idL]) }}">Thêm</a>
                </div> <!-- end col-md-12 -->
            </div>
        </div>
    </div>
@endsection
