@extends('admin.master')
@section('title','Sửa đồ uống')
@section('noidung')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">{{$douong->ten}}</h1>
		</div>
	</div><!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">
				<div class="panel-heading">Sửa đồ uống</div>
				@include('errors.note')
				<div class="panel-body">
					<form  method="post" enctype="multipart/form-data">
						<div class="row" style="margin-bottom:40px">
							<div class="col-xs-8">
								@csrf()
									<div class="form-group" >
										<label>Tên </label>
										<input required type="text" name="ten" class="form-control" value="{{$douong->ten}}">
									</div>
									 <div class="form-group" >
										<label>Giá tiền</label>
										<input required type="number" name="giatien" class="form-control" value="{{$douong->giatien}}">
									</div>
									<div class="form-group" >
										<label>Ảnh </label>
										<input  id="img" type="file" name="anh" class="form-control hidden" onchange="changeImg(this)">
										<img id="avatar" class="thumbnail" width="300px" src="upload/img/{{$douong->anh}}"">
									</div>
									
									
									 <div class="form-group" >
										<label>Mô tả</label>
										<textarea class="ckeditor" required name="mota">{{$douong->mota}}</textarea>
									</div>
									<div class="form-group" >
										<label>Danh mục</label>
										<select  name="danhmuc" class="form-control">

											@foreach ($danhmuc as $dm)
											<option value="{{$dm->id}}">{{$dm->tendanhmuc}}</option>
											@endforeach
										</select>
									</div> 
									
									<input type="submit" class="btn btn-primary" value="Cập nhật">

									<a href="{{ asset('admin/do-uong') }}" class="btn btn-danger">Hủy bỏ</a>
								</div>
								
							</div>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@endsection
@section('script')
	
	<script>
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		    	var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
			$('#avatar').click(function(){
				$('#img').click();
			});
		});
	</script>	
@endsection
