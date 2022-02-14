@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header">Thêm lớp</div>
            <div class="content">
                <form method="post" action="{{ route('class.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Mã lớp</label>
                        <input type="text" name="idL" id="nhap-ma" class="form-control" placeholder="Nhập giống tên lớp">
                        <span id="error-nhap-ma" id="error" hidden></span>
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <input type="text" name="tenLop" id="nhap-ten" class="form-control"
                            placeholder="Nhập giống mã lớp">
                        <span id="error-nhap-ten" id="error" hidden></span>
                    </div>
                    <div class="form-group">
                        <label>Mã chuyên ngành</label>
                        <select class="form-control" name="idCN">
                            <option value="1">Lập trình máy tính</option>
                            <option value="2">Quản trị mạng</option>
                        </select>
                    </div>
                    <div class="form-group" hidden>
                        <label>Hoạt động</label>
                        <select class="form-control" name="HoatDong">
                            <option value="1" checked>Có</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-fill btn-info" onclick="return user()">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function user() {
            var vnhapma = document.getElementById("nhap-ma").value;
            var vnhapten = document.getElementById("nhap-ten").value;
            var errnhapma = document.getElementById("error-nhap-ma");
            var errnhapten = document.getElementById("error-nhap-ten");

            var dem = 0;
            var regegx1 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$/;
            var checkregegx1 = regegx1.test(vnhapten);

            if (vnhapten == "") {
                errnhapten.innerHTML = " * ";
            } else if (checkregegx1) {
                errnhapten.innerHTML = "";
                dem++;
            } else {
                errnhapten.innerHTML = " Mật khẩu tối thiểu 6 ký tự, ít nhất một chữ cái và một số ";
            }
            if (vnhapma == "") {
                errnhapma.innerHTML = " * ";
            } else if (vnhapma != vnhapten) {
                alert('Tên không trùng khớp. Xin vui lòng nhập lại');
            } else {
                errnhapma.innerHTML = "";
                dem++;
            }
            if (dem == 2) {
                return confirm('Đăng ký thành công');
            } else {
                alert('Kiểm tra lại thông tin !');
            }
            return false;
        }
    </script>
@endsection
