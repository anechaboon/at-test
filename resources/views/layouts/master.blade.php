<!doctype html>

<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | AT Creative</title>

        @include('layouts.head')
    </head>

    @section('body')

    @show

    <body>

    <div id="preloader">

        <div id="status">

            <div class="spinner-chase">

                <div class="chase-dot"></div>

                <div class="chase-dot"></div>

                <div class="chase-dot"></div>

                <div class="chase-dot"></div>

                <div class="chase-dot"></div>

                <div class="chase-dot"></div>

            </div>

        </div>

    </div>

    <!-- Begin page -->

    <div id="layout-wrapper">


            <!-- ============================================================== -->

            <!-- Start right Content here -->

            <!-- ============================================================== -->

            <div class="main-content">

            <div class="page-content" style="padding-top: 1em;">

                <div class="container-fluid">

                    @yield('content')

                </div>

                <!-- container-fluid -->

            </div>

            <!-- End Page-content -->

            @include('layouts.footer')

            </div>

            <!-- end main content-->

    </div>

    <!-- END layout-wrapper -->



    <!-- Right Sidebar -->




    <!-- /Right-bar -->



    <!-- Right bar overlay-->

    <div class="rightbar-overlay"></div>



    <!-- JAVASCRIPT -->

    <script>

        // const sessionLogout = "<?php echo session('dhp-logout'); ?>";
        // console.log('session',sessionLogout);

    </script>

    @include('layouts.footer-script')

    </body>

</html>

