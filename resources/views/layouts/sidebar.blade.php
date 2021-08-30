<div class="sidebar" data-color="orange" data-image="../assets/img/full-screen-image-3.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
    <div class="logo">
    </div>

    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info text-center">
                <span>
                    <font color="black">
                        <h5>
                            {{ Session::get('gioiTinh') }}&nbsp;{{ Session::get('tenGV') }}
                        </h5>
                    </font>
                </span>
            </div>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('class.index') }}">
                    <i class="pe-7s-users"></i>
                    <p>Danh sách lớp</p>
                </a>
            </li>
            <li>
                <a href="{{ route('insertDiemByExcel') }}">
                    <i class="pe-7s-smile"></i>
                    <p>Thêm điểm sinh viên</p>
                </a>
            </li>
            <li>
                <a href="{{ route('insertDiemthilaiByExcel') }}">
                    <i class="pe-7s-piggy"></i>
                    <p>Thêm điểm thi lại sinh viên</p>
                </a>
            </li>
            <li>
                <a href="{{ route('calendar') }}">
                    <i class="pe-7s-date"></i>
                    <p>Lịch công tác</p>
                </a>
            </li>
        </ul>
    </div>
</div>
