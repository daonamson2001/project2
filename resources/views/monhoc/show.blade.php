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
        <h2>Lớp: {{ $idL }}</h2>
        <div class="content content-full-width">
            <ul role="tablist" class="nav nav-tabs">
                <li role="presentation" class="active">
                    <a href="#icon-info" data-toggle="tab"> Năm nhất</a>
                </li>
                <li>
                    <a href="#icon-account" data-toggle="tab"> Năm hai</a>
                </li>
                <li>
                    <a href="#icon-style" data-toggle="tab"> Năm ba</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="icon-info" class="tab-pane active">
                    <?php $idNH = 1; ?>
                    <?php $result = 0; ?>
                    @foreach ($class as $item)
                        @if ($item->idNH == $idNH)
                            @if ($item->idL == $idL)
                                <?php $result = count($class); ?>
                                <a href="{{ route('diemlop', [$item->idL, $item->tenMH, $item->idMH]) }}">
                                    <button type="submit" class="btn btn-fill btn-info">
                                        <th>{{ $item->tenMH }}</th>
                                    </button>
                                </a>
                            @endif
                        @endif
                    @endforeach
                    {{ $student->appends(['search' => '$search'])->links('pagination::bootstrap-4') }}
                    <div style="color:red; position: relative; font-size:18px">
                        <?php $nd = 'Hiện lớp đang trống ! Hãy thêm môn học'; ?>
                        @if ($result == 0)
                            {{ $nd }}
                        @endif
                    </div>
                    </br>
                    </br>
                    </br>
                    </br>
                    <a href="{{ route('monhoc.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info" id="hihi">Thêm
                            môn học</button></a>
                </div>
                <div id="icon-account" class="tab-pane">
                    <?php $idNH = 2; ?>
                    <?php $result = 0; ?>
                    @foreach ($class as $item)
                        @if ($item->idNH == $idNH)
                            @if ($item->idL == $idL)
                                <?php $result = count($class); ?>
                                <a href="{{ route('diemlop', [$item->idL, $item->tenMH, $item->idMH]) }}">
                                    <button type="submit" class="btn btn-fill btn-info">
                                        <th>{{ $item->tenMH }}</th>
                                    </button>
                                </a>
                            @endif
                        @endif
                    @endforeach
                    <div style="color:red; position: relative; font-size:18px">
                        <?php $nd = 'Hiện lớp đang trống ! Hãy thêm môn học'; ?>
                        @if ($result == 0)
                            {{ $nd }}
                        @endif
                    </div>
                    </br>
                    </br>
                    </br>
                    </br>
                    <a href="{{ route('monhoc.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info" id="hihi">Thêm
                            môn học</button></a>
                </div>
                <div id="icon-style" class="tab-pane">
                    <?php $idNH = 3; ?>
                    <?php $result = 0; ?>
                    @foreach ($class as $item)
                        @if ($item->idNH == $idNH)
                            @if ($item->idL == $idL)
                                <?php $result = count($class); ?>
                                <a href="{{ route('diemlop', [$item->idL, $item->tenMH, $item->idMH]) }}">
                                    <button type="submit" class="btn btn-fill btn-info">
                                        <th>{{ $item->tenMH }}</th>
                                    </button>
                                </a>
                            @endif
                        @endif
                    @endforeach
                    <div style="color:red; position: relative; font-size:18px">
                        <?php $nd = 'Hiện lớp đang trống ! Hãy thêm môn học'; ?>
                        @if ($result == 0)
                            {{ $nd }}
                        @endif
                    </div>
                    </br>
                    </br>
                    </br>
                    </br>
                    <a href="{{ route('monhoc.create', ['idL' => $idL]) }}"><button type="submit"
                            class="btn btn-fill btn-info" id="hihi">Thêm
                            môn học</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
