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
    <style>
        * {
          font-family: 'Athiti', sans-serif;
        }
    </style>
    @yield('stylesheet')
</head>

<body>
    <div class="container-scroller">
        @include('layouts.inc-header')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc-sidebar')
            <div class="main-panel">
                @yield('content')
                @include('layouts.inc-footer')
            </div>
        </div>
    </div>
    <!-- jQuery -->
    @include('layouts.inc-scripts')
    @yield('scripts')
</body>

</html>