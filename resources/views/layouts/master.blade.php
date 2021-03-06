<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <!-- BEGIN: Head-->
    @include('layouts/__head')
    <!-- END: Header-->
    @include('sweetalert::alert')
    <!-- BEGIN: Page CSS-->
    @yield('css')
    <!-- END: Page CSS-->
</head>

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern semi-dark-layout chat-application 2-columns  navbar-sticky footer-static  "
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    @include('layouts/__header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts/__sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    @include('layouts/__footer')
    <!-- END: Footer-->

    <!-- BEGIN: Page JS-->
    @yield('script')
    <!-- END: Page JS-->

</body>

</html>