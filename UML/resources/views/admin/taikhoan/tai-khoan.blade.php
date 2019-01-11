@extends('admin.master')
@section('title','Tài khoản')
@section('noidung')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thông tin tài khoản</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Thêm tài khoản
							
						</div>
						@include('errors.note')
						<div class="panel-body">
							<div class="form-group">
								<label>Tài khoản:</label>
								<form  method="post">
								@csrf()
    							<input required type="text"  name="taikhoan"class="form-control" placeholder="Tài khoản...">
    							<br>
    							<input required type="text" name="password" class="form-control" placeholder="Mật khẩu...">
    							<br>
    							<select name="quyen" class="form-control">
    								<option value="Nhân viên tiếp tân">Nhân viên tiếp tân</option>
    								<option value="Nhân viên pha chế">Nhân viên pha chế</option>
    								<option value="admin">admin</option>
    							</select>
    							<br>
    							<input class="form-control btn btn-primary" type="submit" name="submit" value="Thêm">
    							</form>
							</div>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách tài khoản</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Tài khoản</th>
					                  <th>Quyền</th>
					                  <th style="width:30%">Tùy chọn</th>
					                </tr>
				              	</thead>
				              	<tbody>
				              	@foreach ($taikhoan as $tk)
				              	<tr>
									<td>{{$tk->taikhoan}}</td>
									<td>{{$tk->quyen}}</td>
									<td>
			                    		<a href="{{asset('admin/tai-khoan/sua/'.$tk->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
			                    		<a href="{{asset('admin/tai-khoan/xoa/'.$tk->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
			                  		</td>
			                  	</tr>
			                  	@endforeach
				                </tbody>
				            </table>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop