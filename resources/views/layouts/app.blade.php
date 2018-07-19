<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - {{ config('app.name') }}</title>

  <!-- Global stylesheets -->
  <link rel="shortcut icon" type="image/icon" href="{{ asset('images/favicon.ico') }}"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->
  @yield('css')
  <!-- Core JS files -->
  <script type="text/javascript">
    var base_url = '{{ url(config('app.auth_page')) }}';
    var csrf_token = '{{ csrf_token() }}';
  </script>
  <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/nicescroll.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/drilldown.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
  <script type="text/javascript">
    $(function(){
      $('select').select2({
        minimumResultsForSearch: Infinity
      });
    })
  </script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/pages/layout_navbar_secondary_fixed.js') }}"></script>
  <!-- /theme JS files -->
  @yield('js')
</head>

<body>

  <!-- Main navbar -->
  <div class="navbar navbar-inverse">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ Navigation::adminUrl() }}" style="padding-right: 0px;">
        <img src="{{ asset('images/logo.png') }}" alt="">
      </a>
      <span class="navbar-text">
        {{ strtoupper(config('app.name')) }}
      </span>
      <ul class="nav navbar-nav pull-right visible-xs-block">
        <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
      </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-user">
          <a class="dropdown-toggle" data-toggle="dropdown">
            <!-- <img src="assets/images/image.png" alt=""> -->
            <i class="icon-user-tie"></i>
            <span>{{ strtoupper(Auth::user()->fullname) }}</span>
            <i class="caret"></i>
          </a>

          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ Navigation::adminUrl('/profile') }}"><i class="icon-user-check"></i> Profil Anda</a></li>
            <li><a href="{{ Navigation::adminUrl('/change-password') }}"><i class="icon-lock2"></i> Ubah Password </a></li>
            <li class="divider"></li>
            <li>
              <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="icon-switch2"></i> 
                  Sign out
              </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /main navbar -->


  <!-- Second navbar -->
  <div class="navbar navbar-default" id="navbar-second">
    <ul class="nav navbar-nav no-border visible-xs-block">
      <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second-toggle">
      <ul class="nav navbar-nav">
        <li><a href="{!! Navigation::adminUrl() !!}"><i class="icon-display4 position-left"></i> Dashboard</a></li>
        {!! Navigation::treeView() !!}
      </ul>
    </div>
  </div>
  @yield('content')

  <div class="footer text-muted">
    &copy; 2018 <br/>
    Kementrian Pekerjaan Umum dan Perumahan rakyat <br/>
    Direktorat Jenderal Cipta Karya. Direktorat Bina Penataan Bangunan <br/>
    Subdirektorat Perencanaan Teknis.<br/>
    Jl. Pattimura No. 20, Kebayoran Baru, Jakarta Selatan, 12110 
  </div>
  <!-- /footer -->

</body>
</html>
