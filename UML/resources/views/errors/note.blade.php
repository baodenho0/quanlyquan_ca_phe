@if(Session::has('error'))
	<p class="alert alert-danger">{{Session('error')}}</p>
@endif
{{-- lỗi validate --}}
@foreach($errors->all() as $err)
	<p class="alert alert-danger">{{$err}}</p>
@endforeach
{{-- - --}}
@if(Session::has('thongbao'))
	<p class="alert alert-success">{{Session('thongbao')}}</p>
@endif