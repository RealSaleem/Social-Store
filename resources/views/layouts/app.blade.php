<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Social Store</title>
    <link rel="icon" type="image/svg+xml" href="{{asset('assets/global_assets/images/logo-main.svg')}}">
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/global_assets/css/icons/fontawesome/styles.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css">
    {{--<link href="{{asset('assets/css/sweetalert.css')}}" rel="stylesheet" type="text/css">--}}
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('assets/global_assets/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('assets/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('assets/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/demo_pages/datatables_sorting.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>


    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/global_assets/js/demo_pages/dashboard.js')}}"></script>
    {{--<script src="{{asset('assets/global_assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>--}}
    <script src="{{asset('assets/global_assets/js/demo_pages/sweetalert11.min.js')}}"></script>
    <!-- /theme JS files -->
    @yield('style')
</head>

<body>
    <!-- Main navbar -->
    @if(Auth::check())
    @include('layouts.top-menu')
    @endif
    <!-- /main navbar -->
    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        @if(Auth::check())
        @include('layouts.sidebar')
        @endif
        <!-- /main sidebar -->
        <!-- Main content -->
        <div class="content-wrapper">
            @yield('content')
            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; {{date('Y')}} All rights reserved.
                    </span>
                </div>
            </div>
            <!-- /footer -->
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
    @yield('script')
</body>

</html>