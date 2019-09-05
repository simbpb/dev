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
  <!-- /theme JS files -->
  @yield('js')
</head>

<body>

  <!-- Main navbar -->
  <!-- /main navbar -->

  @yield('content')

  <!-- /footer -->

</body>
</html>
