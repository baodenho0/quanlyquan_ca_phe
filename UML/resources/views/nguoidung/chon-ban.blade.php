@extends('nguoidung.master')
@section('noidung')		
		<div class="">
			<div id="bg">
				<form method="post">
					@csrf()
				<div class="form-group " id="chonban" >
					
					<select  name="ban" id="" class="form-control">
						<option value="return" >- Chọn bàn -</option>
						@foreach ($ban as $b)
							<option value="{{$b->id}}">{{$b->tenban}}</option>
						@endforeach
						
						
					</select>
						<br>
					<input class="btn btn-warning" type="submit" value="Chọn bàn">
				</form>
				</div>
			</div>  
		</div>
@endsection

