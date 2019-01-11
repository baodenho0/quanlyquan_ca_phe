@extends('admin.master')
@section('title','Khuyến mãi')
@section('noidung')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Khuyến mãi</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Thêm khuyến mãi
						</div>
						@include('errors.note')
						<div class="panel-body">
							<form method="post">
								@csrf()
							<div class="form-group">
								<label>Thông tin khuyến mãi:</label>
    							<input required type="text" name="ma" class="form-control" placeholder="Mã khuyến mãi..."><br>
    							<input required type="text" name="giatien" class="form-control" placeholder="Giá tiền..."><br>
    							<input type="submit" value="Thêm" class="form-control btn btn-primary">
							</div>
							</form>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách khuyến mãi</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Mã khuyến mãi</th>
					                  <th>Giá tiền</th>
					                  <th style="width:30%">Tùy chọn</th>
					                </tr>
				              	</thead>
				              	<tbody>
				              	@foreach($khuyenmai as $km)
								<tr>
									<td>{{$km->makhuyenmai}}</td>
									<td>{{$km->giatien}} VND</td>
									<td>
			                    		<a href="{{ asset('admin/khuyen-mai/sua/'.$km->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
			                    		<a href="{{ asset('admin/khuyen-mai/xoa/'.$km->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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