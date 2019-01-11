@extends('admin.master')
@section('title','Chi tiết')
@section('noidung')

		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Chi tiết pha chế</h1>
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
								{{-- <a href="{{ asset('admin/do-uong/them') }}" class="btn btn-primary">Thêm đồ uống</a> --}}
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Tên đồ uống</th>
											<th >Số bàn</th>
											<th width="30%">Ghi chú </th>
											
											<th>Tùy chọn</th>
										</tr>
									</thead>
									<tbody>
										@foreach($hoadon as $hd)
										<tr>
											<td>{{$hd->id}}</td>
											<td>
												@foreach ($hd->cthd as $ten)
													{{$ten->douong->ten}} ({{$ten->soluong}}) ,
												@endforeach
											</td>
											<td>{{$hd->ban->tenban}}</td>
											<td>{{$hd->ghichu}}</td>
											
											
											<td>
												<a href="{{ asset('admin/pha-che/capnhat/'.$hd->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> {{$hd->tiendo}}</a>
												{{-- <a href="{{ asset('admin/do-uong/xoa/'.$ct->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" ></i> Xóa</a> --}}
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

