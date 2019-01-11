<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="{{ asset('layouts') }}/">
<title>@yield('title') | UML</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="js/lumino.glyphs.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">QUÁN CÀ PHÊ - Admin</a>
				<ul class="user-menu">
					@if(Auth::check())
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::user()->taikhoan}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ asset('admin/cap-nhat/') }}"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> Chỉnh sửa thông tin </a></li>
							<li><a href="{{ asset('dang-xuat') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
						</ul>
					</li>
					@endif
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		<ul class="nav menu">
			@can('admin')
			<li role="presentation" class="divider"></li>
			<li ><a  href="{{ asset('admin/trang-chu') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ</a></li>
			<li><a href="{{ asset('admin/ban-an') }}"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg>Bàn ăn</a></li>
			<li role="presentation" ></li>
			<li><a href="{{ asset('admin/danh-muc') }}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Danh mục</a></li>
			<li><a href="{{ asset('admin/do-uong') }}"><svg class="glyph stroked paper coffee cup"><use xlink:href="#stroked-paper-coffee-cup"></use></svg>Đồ uống</a></li>
			<li role="presentation" ></li>
			<li><a href="{{ asset('admin/khuyen-mai') }}"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"></use></svg>Khuyến mãi</a></li>
			<li role="presentation" ></li>
			<li><a href="{{ asset('admin/tai-khoan') }}"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg>Tài khoản</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="{{ asset('admin/thong-tin') }}"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"></use></svg>Người dùng</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="{{ asset('admin/pha-che') }}"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"></use></svg>Nhân viên pha chế</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="{{ asset('admin/tiep-tan') }}"><svg class="glyph stroked desktop computer and mobile"><use xlink:href="#stroked-desktop-computer-and-mobile"></use></svg>Nhân viên tiếp tân</a></li>
			<li role="presentation" class="divider"></li>
			
		</ul>
		@endcan
	</div><!--/.sidebar-->
		
	@yield('noidung')
		  

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
		// thêm class active
		// $(document).ready(function(){
		// 	$('.menu li').click(function(){
		// 		 $('.menu li.active').removeClass('active');
		// 		$(this).addClass('active');
		// 	});
		// });

	
	</script>
	@yield('script')
</body>

</html>
