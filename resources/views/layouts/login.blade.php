<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Sistem Informasi Bina Penataan Bangunan (SI-BPB)</title>
                

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/ace.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

        <script src="{{ asset('assets/js/ace-extra.js') }}"></script>
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="{{ asset('assets/css/ace-ie.min.css') }}" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
		<script src="{{ asset('assets/js/respond.min.js') }}"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						@yield('content')
					</div>
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="{{ asset('assets/js/jquery.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('assets/js/jquery.mobile.custom.min.js') }}'>"+"<"+"/script>");
		</script>

	</body>
</html>

