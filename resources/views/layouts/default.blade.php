<html>
    <head>
        <title>@yield('title')</title>
        @include('includes.templates.head-rex')
    </head>
    <body>
    <!-- BEGAIN PRELOADER -->
    <div id="preloader">
        <div class="loader">&nbsp;</div>
    </div>
    <!-- END PRELOADER -->

    @yield('content')
    </body>
</html>
