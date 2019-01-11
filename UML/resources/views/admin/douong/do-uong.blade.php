@extends('admin.master')
@section('title','Đồ uống')
@section('noidung')

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Đồ uống</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách đồ uống</div>
					@include('errors.note')
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{ asset('admin/do-uong/them') }}" class="btn btn-primary">Thêm đồ uống</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên đồ uống</th>
											<th>Giá </th>
											<th width="20%">Ảnh</th>
											<th>Danh mục</th>
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($douong as $du)
										<tr>
											<td>{{$du->id}}</td>
											<td>{{$du->ten}}</td>
											<td>{{$du->giatien}} VND</td>
											<td>
												<img width="200px" src="upload/img/{{$du->anh}}" class="thumbnail">
											</td>
											<td>{{$du->danhmuc->tendanhmuc}}</td>
											<td>
												<a href="{{ asset('admin/do-uong/sua/'.$du->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{ asset('admin/do-uong/xoa/'.$du->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" ></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop

