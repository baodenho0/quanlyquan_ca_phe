@extends('admin.master')
@section('title','Sửa bàn')
@section('noidung')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$taikhoan->taikhoan}}</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-5 col-lg-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Cập nhật tài khoản
                </div>
                @include('errors.note')
                <div class="panel-body">
                    <div class="form-group">
                        <form  method="post">
                            @csrf()
                            <div class="form-group">
                                <label>Thay đổi mật khẩu</label>
                                <input disabled="" type="text"  class="form-control" name="taikhoan" value="{{$taikhoan->taikhoan}}"   />
                                <br>
                                <input type="password" name="oldpass" class="form-control" placeholder="Mật khẩu cũ..."  required />
                                <br>
                                <input  type="password" name="newpass" class="form-control" value="" placeholder="Mật khẩu mới...">
                                <br>
                                <input disabled="" type="text" class="form-control" value="{{$taikhoan->quyen}}">
                            </div>

                            <input type="submit" name="submit" value="Đổi mật khẩu" class="btn btn-primary" />
                            <a class="btn btn-danger" href="
                            @if(Auth::user()->quyen == "admin")
                            {{ asset('admin/tai-khoan') }}
                            @endif
                            @if(Auth::user()->quyen == "Nhân viên pha chế")
                            {{ asset('admin/pha-che') }}
                            @endif
                            @if(Auth::user()->quyen == "Nhân viên tiếp tân")
                            {{ asset('admin/tiep-tan') }}
                            @endif

                            ">Hủy bỏ</a>
                        </form>
                        <div class="form-group">
                            <br>
                            <form action="{{ asset('admin/cap-nhat/thong-tin') }}" method="post">
                                @csrf()
                                <label>Thông tin nhân viên</label>
                                <input disabled="" value="{{$taikhoan->nhanvien->chucvu}}" required type="text"  class="form-control" placeholder="Họ tên..."   />
                                <br>
                                <input value="{{$taikhoan->nhanvien->ten}}" required type="text" name="ten" class="form-control" placeholder="Họ tên..."   />
                                <br>
                                <input value="{{$taikhoan->nhanvien->ngaysinh}}" required type="date" name="ngaysinh" class="form-control" placeholder="Ngày sinh... " />
                                <br>
                                <input value="{{$taikhoan->nhanvien->gioitinh}}" required type="text"name="gioitinh" class="form-control" placeholder="Giới tính... ">
                                <br>
                                <input value="{{$taikhoan->nhanvien->cmnd}}" required type="number" name="cmnd" class="form-control" placeholder="Số CMND... "   />
                                <br>
                                <input value="{{$taikhoan->nhanvien->sdt}}" required type="number" name="sdt" class="form-control" placeholder="Số điện thoại... " />
                                <br>
                                <input value="{{$taikhoan->nhanvien->diachi}}" required type="text" name="diachi" class="form-control" placeholder="Địa chỉ... " />
                                <br>
                                <input  disabled="" type="text" class="form-control" placeholder="Ngày vào làm..." value="Ngày vào làm: {{$taikhoan->created_at}}">
                                <br>
                                <input type="submit" value="Cập nhật thông tin" class="btn btn-warning">
                            </form>
                                
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!--/.row-->
</div>  <!--/.main-->



@stop