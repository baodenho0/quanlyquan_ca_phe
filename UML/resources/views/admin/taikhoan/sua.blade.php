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
                    Sửa tài khoản
                </div>
                @include('errors.note')
                <div class="panel-body">
                    <div class="form-group">
                        <form  method="post">
                            @csrf()
                            <div class="form-group">
                                <label>Thông tin tài khoản</label>
                                <input disabled="" type="text"  class="form-control" value="{{$taikhoan->taikhoan}}"   />
                                <br>
                                <input type="text" name="password" class="form-control" placeholder="Mật khẩu..."  required />
                                <br>
                                <input  type="text" class="form-control" value="{{$taikhoan->chucvu}}" placeholder="Chức vụ...">
                                <br>
                                <input disabled="" type="text" class="form-control" value="{{$taikhoan->quyen}}">
                            </div>

                            <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary" />
                            <a class="btn btn-danger" href="{{ asset('admin/tai-khoan') }}">Hủy bỏ</a>
                        </form>
                        <div class="form-group">
                            <br>
                                <label>Thông tin nhân viên</label>
                                <input disabled="" type="text"  class="form-control" value="Họ tên:{{$taikhoan->nhanvien->ten}}"   />
                                <br>
                                <input disabled="" type="text"  class="form-control" value="Ngày sinh: {{$taikhoan->nhanvien->ngaysinh}}" />
                                <br>
                                <input disabled="" type="text" class="form-control" value="Giới tính: {{$taikhoan->nhanvien->gioitinh}}">
                                <br>
                                <input disabled="" type="text"  class="form-control" value="Số CMND: {{$taikhoan->nhanvien->cmnd}}"   />
                                <br>
                                <input disabled="" type="text"  class="form-control" value="Số điện thoại: {{$taikhoan->nhanvien->sdt}}" />
                                <br>
                                <input disabled="" type="text" class="form-control" value="Ngày vào làm: {{$taikhoan->created_at}}">
                                
                                
                                
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!--/.row-->
</div>  <!--/.main-->



@stop