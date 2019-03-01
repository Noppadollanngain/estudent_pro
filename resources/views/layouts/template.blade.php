<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    @include('layouts.inc-stylesheets')
    @yield('stylesheet')
</head>

<body>
    
    @yield('content')
    <!-- jQuery -->
    @include('layouts.inc-scripts')
    @yield('scripts')
</body>

</html>