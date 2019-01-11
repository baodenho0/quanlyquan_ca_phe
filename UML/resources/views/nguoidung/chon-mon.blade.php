@extends('nguoidung.master')
@section('noidung')
		
		<div class="container phan_2">
			<div class="col-md-3 giohang wrapper-nav">
				@foreach ($danhmuc as $dm)
					<div class="noibat_1 "><a  class="dichuyen_id">{{$dm->tendanhmuc}}</a></div>
				@endforeach
			</div>

			<div class="col-md-5 monan">
				
				<div class="form-group">
					<input id="country_name" type="text" class="form-control" placeholder="Tìm kiếm một sản phẩm">
				</div>
				<div>
					@foreach ($danhmuc as $dm)
						
					
					<div class="ten"><b>{{$dm->tendanhmuc}}</b></div>
					<div class="giohang">
						@foreach ($dm->douong as $du)
						<div class="giohang_monan">
							<a href="#">
								<div class="row">
									
										
									
									<div class="col-md-3 col-xs-3"><img class="hinhanh"  src="upload/img/{{$du->anh}}" ></div>
									<div class="col-md-9 col-xs-9">
										<div hidden="" class="id">{{$du->id}}</div>
										<h4  >{{$du->ten}}</h4>
										<small>{!!$du->mota!!}</small>
										<p ><span class="tien">{{$du->giatien}}</span> VND</p>
									</div>
									
								</div>
							</a>
						</div>
						@endforeach

						

					</div>
					@endforeach
				</div>
				<!-- mon 1 -->

				
				

			</div>

			<div class="col-md-4 giohang">
				
				<!-- gio hang -->
				<div style="font-size: 20px;padding-top: 20px;">
				{{$ban->tenban}} - Giỏ hàng</div>
				@include('errors.note')
				<div id="themthucsu" class="giohang_1">
					@foreach ($content as $ct)
					<hr>
					<div class=" ">
						{{-- <a > --}}
							
							<h4>{{$ct->name}}</h4>
							 <form action="{{ asset('cap-nhat-gio-hang/'.$ct->id) }}" method="post"> 
							 	@csrf()
							<span>Số lượng <input type="number" name="soluong" 
							style="
							
							" 
						    value="{{$ct->quantity}}"></span>

							{{-- <img hidden class="hinhanh" src="upload/2.jpeg" alt="mon-an"> --}}
							<span class="tien">{{number_format($ct->price * $ct->quantity,0,".",".")}}</span> VND
							<br><br>
							<input type="submit" class="btn btn-success" value="O">

							<a href="{{ asset('xoa-gio-hang/'.$ct->id) }}" class="btn btn-danger">X</a>
							 </form> 
						{{-- </a> --}}
					</div>
					@endforeach
					<hr>
				</div>
				<!-- end gio hang -->
				<form action="{{ asset('xac-nhan-chon-mon/'.$ban->id) }}" method="post"> {{-- //lưu vào csdl --}}
					@csrf()
					<div class="tc_button_1"><input type="submit" class="btn btn-warning button_1 " value="XÁC NHẬN CHỌN MÓN" /></div>
					<div class="congmon">


						<input type="text" class="form-control_1" name="ghichu" placeholder="Thêm ghi chú....">
						<br>

						<div class="col-md-9 col-xs-9 col-sm-9">
							<div class="row">
								<input class="form-control_1" name="khuyenmai" type="text" placeholder="Mã giảm giá (nếu có)">
							</div>
						</div>
				</form> {{-- //form luu csdl  --}}
					<br><br><hr>
					<h3>Tổng cộng <b>{{number_format($total,0,".",".")}}</b> VND</h3>
					
				</div>
			</div>

			


		</div>
		<!-- show dialog -->
<div class="overlay" style="display: none;">
	<div class="login-wrapper">
		<div class="login-content">
			<a class="close"><span class="glyphicon glyphicon-remove"></span></a>
			<h3 class="ten_show">Matcha macchiato</h3>
			
				<div ><img class="hinhanh_2 hinhanh_show" src="" alt="mon-an"></div>
				
				
				<label class="chu_glyphicon">
					<div class="col-md-6">
				<span class="tru_show	glyphicon glyphicon-minus"></span>
				<span class="soluong_show">1</span>
				<span class="cong_show glyphicon glyphicon-plus"></span>
				</div>

				<div class="col-md-4 "><span class="tien_show">1</span>VND</div>
				</label>
				<form method="post">
					@csrf()
				<input type="hidden" class="id_hidden" name="id" value="">
				<input type="hidden" class="soluong_hidden" name="soluong" value="1">
				<input type="submit" id="themvaogiohang" class="btn btn-warning button_2" value="Thêm vào giỏ hàng"/>
				</form>
		</div>
	</div>
</div>
<!-- -------------- -->
		
	    </div>

	
@endsection
