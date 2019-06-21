<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Applikasi Lamaran Perusahaan</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

    @yield('header')
</head>
<body>
    <div id="app">

        @include('layouts.navbar')

        <div
            @if(Auth::check())
                @if(Auth::User()->role !="APPLICANT")
                    id="wrapper"
                @endif
            @endif class="toggled">

            @if(Auth::check())
                @if(Auth::User()->role !="APPLICANT")
                    @include('layouts.sidebar')
                @endif
            @endif

            <!-- Page Content -->
            <main id="page-content-wrapper" role="main">
                @yield('content')
            </main>
        </div> <!-- /#wrapper -->
    </div>

    @yield('footer')

</body>
</html>
