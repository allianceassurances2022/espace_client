<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ env('APP_NAME', 'Expertise') }}- @yield('head_title')</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('assets/img/expertise/favicon.ico') }}">


    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/expertise/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/expertise/style.css') }}" rel="stylesheet" type="text/css">
    <!--link href="#" rel="stylesheet" type="text/css"-->
    <!--link href="#" rel="stylesheet" type="text/css"-->

    @yield('head')
</head>
