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
            <div class="header">Thêm môn học</div>
            <div class="content">
                <form method="post" action="{{ route('store') }}">
                    @method("PUT")
                    @csrf
                    <div class="form-group">
                        <label>Mã môn học</label>
                        <input type="text" name="idMH" id="nhap-ma" class="form-control">
                        <span id="error-nhap-ma" id="error" hidden></span>
                    </div>
                    <div class="form-group">
                        <label>Tên môn học</label>
                        <input type="text" name="tenMH" id="nhap-ten" class="form-control">
                        <span id="error-nhap-ten" id="error" hidden></span>
                    </div>
                    <div class="form-group">
                        <label>Chuyên ngành</label>
                        <select class="form-control" name="idCN">
                            <option value="1">Lập trình máy tính</option>
                            <option value="2">Quản trị mạng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Năm học</label>
                        <select class="form-control" name="idNH">
                            <option value="1">Năm 1</option>
                            <option value="2">Năm 2</option>
                            <option value="3">Năm 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên lớp</label>
                        <input type="text" name="idL" value="{{ $idL }}" class="form-control" readonly>
                    </div>
                    <button type="submit" class="btn btn-fill btn-info" onclick="return user()" id="hihi">
                        Thêm</button>
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
            var regegx1 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/;
            var checkregegx1 = regegx1.test(vnhapten);
            var regegx2 = /^([A-Za-z0-9\_\.]+){2,10}$/;
            var checkregegx2 = regegx2.test(vnhapma);

            if (vnhapten == "") {
                errnhapten.innerHTML = " * ";
            } else {
                dem++;
            }
            if (vnhapma == "") {
                errnhapma.innerHTML = " * ";
            } else {
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
