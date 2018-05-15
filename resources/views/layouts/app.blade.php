<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>@yield('title') - Sistem Informasi Bina Penataan Bangunan (SIBPB)</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/ace.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.4/css/fixedColumns.bootstrap.min.css" />
        <!-- <script src="{{ asset('assets/js/ace-extra.js') }}"></script> -->
    </head>
    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default">
            @php
                $root = '/'.explode("/",Route::current()->uri())[0];
                $guard = explode("-",$root)[1];
            @endphp
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
                var base_url = '{{ url('') }}';
            </script>
            <div class="navbar-container" id="navbar-container">
                <!-- #section:basics/sidebar.mobile.toggle -->
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img class="nav-user-photo" src="/assets/img/logo.png" alt="PU Logo" style="height:23px;" /> 
                            {{ strtoupper('Sistem Informasi Bina Penataan Bangunan (SIBPB)') }} 
                        </small>
                    </a>
                </div>
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    {{ Auth::guard($guard)->user()->nama }}
                                </span>
                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>
                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li><a href="{{ $root }}/profile"><i class="ace-icon fa fa-user"></i> Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ $root }}/logout"><i class="ace-icon fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar responsive">
                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                </script>
                @if ($guard == 'bpb')
                    @include('widgets.menu_bpb')
                @endif
                @if ($guard == 'hsbgn')
                    @include('widgets.menu_hsbgn')
                @endif
                @if ($guard == 'perdabg')
                    @include('widgets.menu_perdabg')
                @endif
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
                <script type="text/javascript">
                    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                </script>
            </div>

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                        </script>
                        <ul class="breadcrumb">
                            <li><i class="ace-icon fa fa-home home-icon"></i> <a href="/">Beranda</a></li>
                            @yield('breadcrumb')
                        </ul>
                    </div>

                    <div class="page-content">
                        <!-- /section:settings.box -->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                    @yield('content')
                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="new_green bolder">
                                <h5>&copy; 2018 <br>
                                    Kementerian Pekerjaan Umum dan Perumahan Rakyat<br>
                                    Direktorat Jenderal Cipta Karya. 
                                    Direktorat Bina Penataan Bangunan<br>
                                    Subdirektorat Perencanaan Teknis. <br>
                                    Jl. Pattimura No. 20, Kebayoran Baru, Jakarta Selatan, 12110
                                </h5>
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='{{ asset('assets/js/jquery.js') }}'>"+"<"+"/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
        <script type="text/javascript">
         window.jQuery || document.write("<script src='{{ asset('assets/js/jquery1x.js') }}>"+"<"+"/script>");
        </script>
        <![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
        </script>
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/fixedcolumns/3.2.4/js/dataTables.fixedColumns.min.js"></script>
        <script src="{{ asset('assets/js/ace/elements.aside.js') }}"></script>
        <script src="{{ asset('assets/js/ace/ace.js') }}"></script>
        <script src="{{ asset('assets/js/ace/ace.sidebar.js') }}"></script>
        <script src="{{ asset('assets/js/ace/ace.sidebar-scroll-1.js') }}"></script>
        <script>
            $(document).ready(function () {
                var current = location.pathname;
                $("a").each(function() {
                    var $this = $(this);
                    if (this.href == window.location.href) {
                        $(this).closest("li").addClass("active");
                    }
                    if ($this.attr("href") != '{{ $root }}') {
                        if(current.indexOf($this.attr("href")) !== -1){
                            $(this).closest("li").addClass("active");
                            $(this).parents().closest('.submenu').closest("li").addClass("active open");
                        }
                    }
                });
            });
        </script>
        @yield('js')
    </body>
</html>
