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
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>Mã lớp</th>
                                <th>Tên lớp</th>
                                <th>Chuyên ngành</th>
                                <th>Xem</th>
                                <th>Sửa</th>
                                <th>Ẩn</th>
                            </thead>
                            <tbody>
                                <?php foreach ($class as $lop): ?>
                                <tr>
                                    <td>{{ $lop->idL }}</td>
                                    <td>{{ $lop->tenLop }}</td>
                                    <td>{{ $lop->idCN == 1 ? 'Lập trình máy tính' : 'Quản trị mạng' }}</td>
                                    <td><a href="{{ route('class.show', $lop->idL) }}">Xem</a></td>
                                    <td><a href="{{ route('class.edit', $lop->idL) }}">Sửa</a></td>
                                    <td>
                                        <a href="{{ route('class.hide', $lop->tenLop) }}">Ẩn</a>
                                        {{-- <form action="{{ route('class.destroy', $lop->idL) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button>Ẩn</button>
                                        </form> --}}
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        {{ $class->appends(['search' => '$search'])->links('pagination::bootstrap-4') }}
                    </div><!--  end card  -->
                    <a href="{{ route('class.create') }}">Them</a>
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div><!--   Core JS Files  -->

@endsection
