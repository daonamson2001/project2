<style>
    #hihi:hover {
        color: black;
        background: white;
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
        <h1>Danh sách lớp</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="toolbar">
                        </div>
                        <div class="content">

                            <ul role="tablist" class="nav nav-tabs">
                                <li role="presentation" class="active">
                                    <a href="#agency" data-toggle="tab">
                                        <h5>Lập trình máy tính</h5>
                                    </a>
                                </li>
                                <li>
                                    <a href="#company" data-toggle="tab">
                                        <h5>Quản trị mạng</h5>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="agency" class="tab-pane active">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Mã lớp</th>
                                            <th>Tên lớp</th>
                                            <th>Chuyên ngành</th>
                                            <th colspan="3" style="text-align: center">Hành động</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($class as $lop): ?>
                                            @if ($lop->idCN == 1)
                                                <tr>
                                                    <td>{{ $lop->idL }}</td>
                                                    <td>{{ $lop->tenLop }}</td>
                                                    <td>{{ $lop->idCN == 1 ? 'Lập trình máy tính' : 'Quản trị mạng' }}
                                                    </td>
                                                    <td><a href="{{ route('class.show', $lop->idL) }}" rel="tooltip"
                                                            title="Thông tin lớp" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('showmonhoc', [$lop->idL]) }}" rel="tooltip"
                                                            title="Môn học" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-magic"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('class.edit', $lop->idL) }}" rel="tooltip"
                                                            title="Sửa lớp" class="btn btn-success btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="" rel="tooltip" title="Ẩn lớp"
                                                            class="btn btn-danger btn-simple btn-xs"
                                                            onclick="return confirm('Đang trong quá trình nâng cấp')">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="company" class="tab-pane">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Mã lớp</th>
                                            <th>Tên lớp</th>
                                            <th>Chuyên ngành</th>
                                            <th colspan="3" style="text-align: center">Hành động</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($class as $lop): ?>
                                            @if ($lop->idCN == 2)
                                                <tr>
                                                    <td>{{ $lop->idL }}</td>
                                                    <td>{{ $lop->tenLop }}</td>
                                                    <td>{{ $lop->idCN == 1 ? 'Lập trình máy tính' : 'Quản trị mạng' }}
                                                    </td>
                                                    <td><a href="{{ route('class.show', $lop->idL) }}" rel="tooltip"
                                                            title="Thông tin lớp" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-user"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('showmonhoc', [$lop->idL]) }}" rel="tooltip"
                                                            title="Môn học" class="btn btn-info btn-simple btn-xs">
                                                            <i class="fa fa-magic"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('class.edit', $lop->idL) }}" rel="tooltip"
                                                            title="Sửa lớp" class="btn btn-success btn-simple btn-xs">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="" rel="tooltip" title="Ẩn lớp"
                                                            class="btn btn-danger btn-simple btn-xs"
                                                            onclick="return confirm('Đang trong quá trình nâng cấp')">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        {{ $class->appends(['search' => '$search'])->links('pagination::bootstrap-4') }}
                    </div><!--  end card  -->
                    <a href="{{ route('class.create') }}"><button type="submit" class="btn btn-fill btn-info"
                            id="hihi">Thêm
                            lớp</button></a>
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
