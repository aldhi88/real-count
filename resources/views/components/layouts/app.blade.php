<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>{{config('app.name')}} | {{$data['title']}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.png')}}">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/build/toastr.min.css') }}">
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
        <script>
            function reload(){
                window.setTimeout( function() {
                    window.location.reload();
                }, 3000);
            }

            function initSearchCol(table,headerId,inputClass){
                // $(headerId+' th').each(function() {
                //     var title = $(this).text();
                //     var off = $(this).attr("off");
                //     if (typeof off == typeof undefined) {
                //         $(this).html('<input placeholder="'+title+'" type="text" class="'+inputClass+' text-center border border-light-dark py-1 w-100"/>');
                //     }
                // });

                $(headerId).on('keyup', '.'+inputClass,function () {
                    table.column( $(this).parent().index() ).search( this.value ).draw();
                });

                $(headerId).on('change', '.'+inputClass,function () {
                    table.column( $(this).parent().index() ).search( this.value ).draw();
                });

                
            }
            // reload();
        </script>
    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('components.layouts.header')
            @include('components.layouts.top_nav')
    
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        @yield('content')
                        <!-- end page title -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
                @include('components.layouts.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

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
