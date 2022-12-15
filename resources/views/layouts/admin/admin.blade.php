<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href={{ asset("admindashboard/vendors/mdi/css/materialdesignicons.min.css")}}>
    <link rel="stylesheet" href={{ asset("admindashboard/vendors/base/vendor.bundle.base.css")}}>
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href={{ asset("admindashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.css")}}>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href={{ asset("admindashboard/css/style.css")}}>
    <!-- endinject -->
    <link rel="shortcut icon" href={{ asset("admindashboard/images/favicon.png")}} />
    @yield('style')
    @livewireStyles
</head>
<body>

    <div class="container-scroller">
        @include('layouts.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.admin.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src={{ asset("admindashboard/vendors/base/vendor.bundle.base.js")}}></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src={{ asset("admindashboard/vendors/datatables.net/jquery.dataTables.js")}}></script>
    <script src={{ asset("admindashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js")}}></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src={{ asset("admindashboard/js/off-canvas.js")}}></script>
    <script src={{ asset("admindashboard/js/hoverable-collapse.js")}}></script>
    <script src={{ asset("admindashboard/js/template.js")}}></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src={{ asset("admindashboard/js/dashboard.js")}}></script>
    <script src={{ asset("admindashboard/js/data-table.js")}}></script>
    <script src={{ asset("admindashboard/js/jquery.dataTables.js")}}></script>
    <script src={{ asset("admindashboard/js/dataTables.bootstrap4.js")}}></script>
    <!-- End custom js for this page-->
    @yield('codejs')
</body>
</html>
