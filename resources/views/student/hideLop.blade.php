@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <form class="navbar-search-form" role="search">
            <div class="input-group">
                <input type="text" value="{{ $search }}" name='search' class="form-control" placeholder="Search...">
                <span class="input-group-addon"><button><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <h1>Danh sách lớp bị ẩn</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th style="text-align: center">STT</th>
                                <th style="text-align: center">Mã lớp</th>
                                <th style="text-align: center">Tên lớp</th>
                                <th style="text-align: center">Chuyên ngành</th>
                                <th style="text-align: center">Hành động</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php $result = 0; ?>
                                <?php foreach ($class as $lop): ?>
                                <?php $result = count($class); ?>
                                <tr>
                                    <td style="text-align: center">{{ $i++ }} </td>
                                    <td style="text-align: center">{{ $lop->idL }}</td>
                                    <td style="text-align: center">{{ $lop->tenLop }}</td>
                                    <td style="text-align: center">
                                        {{ $lop->idCN == 1 ? 'Lập trình máy tính' : 'Quản trị mạng' }}
                                    </td>
                                    <td style="text-align: center">
                                        <form action="{{ route('student.activeL', $lop->idL) }}" method="post">
                                            @csrf
                                            @method("PUT")
                                            <button style="border:hidden"
                                                onclick="return confirm('Bạn có chắc muốn hiện lớp này ?')" rel="tooltip"
                                                title="Hiện lớp" class="btn btn-success btn-simple btn-xs"><i
                                                    class=" fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $class->appends(['search' => '$search'])->links('pagination::bootstrap-4') }}
                <div style="color:red; position: relative; font-size:18px">
                    <?php $nd = 'Hiện đang trống !'; ?>
                    @if ($result == 0)
                        {{ $nd }}
                    @endif
                </div>
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
@endsection
