<style>
    #hihi:hover {
        color: black;
        background: white;
    }

</style>
@extends('layouts.layout')
@section('main')
    <div class="main-content">
        <div class="card">
            <div class="header">Thêm sinh viên</div>
            <div class="content">
                <form method="post" action="{{ route('student.store') }}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label>Mã sinh viên</label>
                        <input type="text" name="idSV" id="nhap-ma" class="form-control">
                        <span id="error-nhap-ma" hidden></span>
                    </div>
                    <div class="form-group">
                        <label>Tên sinh viên</label>
                        <input type="text" name="tenSV" id="nhap-ten" class="form-control">
                        <span id="error-nhap-ten" hidden></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" id="nhap-email" class="form-control">
                        <span id="error-nhap-email" hidden></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="passWord" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <input type="radio" value="1" name="gioiTinh" checked>Nam
                        <input type="radio" value="0" name="gioiTinh">Nữ
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="text" name="ngaySinh" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Quê quán</label>
                        <input type="text" name="queQuan" class="form-control" required="true">
                    </div>
                    <div class="form-group">
                        <label>Hoạt động</label>
                        <select class="form-control" name="HoatDong">
                            <option value="1">Có</option>
                            <option value="0">Không</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <select class="form-control" name="idL">
                            @foreach ($class as $lop)
                                <option value="{{ $lop->idL }}" @if ($lop->idL == $idL) selected @endif>{{ $lop->idL }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-fill btn-info" onclick="return user()" id="hihi">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function user() {
            //
            var vnhapma = document.getElementById("nhap-ma").value;
            var vnhapten = document.getElementById("nhap-ten").value;
            var vnhapemail = document.getElementById("nhap-email").value;
            //
            var errnhapma = document.getElementById("error-nhap-ma");
            var errnhapten = document.getElementById("error-nhap-ten");
            var errnhapemail = document.getElementById("error-nhap-email");
            //
            var dem = 0;
            var regegx = /^([A-Za-z0-9\_\.]+){6,30}$/;
            var checkregegx = regegx.test(vnhapten);
            var regegx1 = /^[A-Za-z_]{6,18}$/;
            var checkregegx1 = regegx1.test(vnhapma);
            var regegx2 = /^[A-Za-z0-9\.\_]+@+[A-Za-z0-9\.]+$/;
            var checkregegx2 = regegx2.test(vnhapemail);
            //
            if (vnhapma === "") {
                errnhapma.innerHTML = " * ";
            } else if (checkregegx1) {
                errnhapma.innerHTML = "";
                dem++;
            } else {
                errnhapma.innerHTML = " Tên không được chứa kí tự đặc biệt";
            }
            if (vnhapten === "") {
                errnhapten.innerHTML = " * ";
            } else if (checkregegx) {
                errnhapten.innerHTML = "";
                dem++;
            } else {
                errnhaptem.innerHTML = " Tên không được chứa kí tự đặc biệt";
            }
            if (vnhapemail === "") {
                errnhapemail.innerHTML = " * ";
            } else if (checkregegx2) {
                errnhapemail.innerHTML = "";
                dem++;
            } else {
                errnhapemail.innerHTML = " Không đúng định dạng mail";
            }
            if (dem == 3) {
                return confirm('Đăng ký thành công');
            } else {
                alert('Kiểm tra lại thông tin !');
            }
            return false;
        }
    </script>
@endsection
