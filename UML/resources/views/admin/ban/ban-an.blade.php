@extends('admin.master')
@section('title','Bàn ăn')
@section('noidung')
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục bàn ăn</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
					<div class="panel panel-primary">
						<div class="panel-heading">
							Thêm bàn
							
						</div>
						@include('errors.note')
						<div class="panel-body">
							<div class="form-group">
								<label>Tên bàn:</label>
								<form action="{{asset('admin/ban-an')}}" method="post">
								@csrf()
    							<input type="text" name="tenban" class="form-control" placeholder="Tên bàn...">
    							<br>
    							<input class="form-control btn btn-primary" type="submit" name="submit" value="Thêm">
    							</form>
							</div>
						</div>
					</div>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách bàn</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Tên bàn</th>
					                  <th style="width:30%">Tùy chọn</th>
					                </tr>
				              	</thead>
				              	<tbody>
				              	@foreach ($ban as $ba)
				              	<tr>
									<td>{{$ba->tenban}}</td>
									<td>
			                    		<a href="{{asset('admin/ban-an/sua/'.$ba->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
			                    		<a href="{{asset('admin/ban-an/xoa/'.$ba->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
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