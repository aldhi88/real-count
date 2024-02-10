<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>{{config('app.name')}} | {{$data['title']}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Aldhi Albadri" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.png')}}">

        @yield('style')
        @stack('push-style')
        <!-- Bootstrap Css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/mine/style.css') }}" rel="stylesheet" type="text/css" />
        @livewireStyles
        
    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                {{-- <div class="page-content"> --}}
                    {{-- <div class="container-fluid"> --}}

                        <!-- start page title -->
                        <div class="p-2">
                            @yield('content')
                        </div>
                        <!-- end page title -->
                        
                    {{-- </div> <!-- container-fluid --> --}}
                {{-- </div> --}}
                <!-- End Page-content -->

                
                @include('components.layouts.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        {{-- <div class="rightbar-overlay"></div> --}}

        <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{ asset('assets/libs/toastr/build/toastr.min.js') }}"></script>
        @yield('script')
        @stack('push-script')
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script src="{{ asset('assets/mine/script.js') }}"></script>
        @livewireScripts
    </body>
</html>
