<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <head>
        @include('layouts/__head')
        @yield('css')
        <link rel="stylesheet" type="text/css" href="assets/css/pages/authentication.css">   
    </head>

    <body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
        <!-- BEGIN: Content-->
        @yield('content')   
        <!-- END: Content-->
    </body>
</html>

