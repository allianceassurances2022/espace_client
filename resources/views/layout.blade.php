<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">
    <title>{{env('APP_NAME','E-paiement')}}- @yield('head_title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/material-design-icons/css/material-design-iconic-font.min.css')}}"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('head')
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css"/>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">


        @yield('content')


      </div>
    </div>
    <script src="{{asset('assets/lib/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>

      @yield('js')


      <script type="text/javascript">
        $(document).ready(function(){
        	//initialize the javascript
        	App.init();
          @yield('docready')
        });

      </script>
  </body>
</html>
