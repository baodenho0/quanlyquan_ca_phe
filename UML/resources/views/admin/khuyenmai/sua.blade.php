@extends('admin.master')
@section('title','Sửa bàn')
@section('noidung')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$khuyenmai->makhuyenmai}}</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-5 col-lg-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Sửa khuyến mãi
                </div>
                @include('errors.note')
                <div class="panel-body">
                    <div class="form-group">
                        <form  method="post">
                            @csrf()
                            <div class="form-group">
                                <label>Thông tin khuyến mãi</label>
                                <input type="text" name="ma" class="form-control" placeholder="Mã..." value="" required />
                                <br>
                                <input type="text" name="giatien" class="form-control" placeholder="Giá tiền...VND" value="" required />
                            </div>

                            <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary" />
                            <a class="btn btn-danger" href="{{ asset('admin/khuyen-mai') }}">Hủy bỏ</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!--/.row-->
</div>  <!--/.main-->



@stop