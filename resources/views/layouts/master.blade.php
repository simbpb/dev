<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>
  <!-- Global stylesheets -->
  <link rel="shortcut icon" type="image/icon" href="{{ asset('images/favicon.ico') }}"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/core.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/colors.css') }}" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->
  <!-- Core JS files -->
  <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/nicescroll.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/drilldown.js') }}"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

  <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/pages/login.js') }}"></script>
  <!-- /theme JS files -->
</head>

<body class="login-container">
  <!-- Page container -->
   <div class="page-container">
      <!-- Page content -->
      <div class="page-content">
      <!-- Main content -->
      <div class="content-wrapper">
         <!-- Advanced login -->
         @yield('content')
         <!-- /advanced login -->
         </div>
         <!-- /main content -->
      </div>
      <!-- /page content -->
   </div>
<!-- /page container -->
</body>
</html>
