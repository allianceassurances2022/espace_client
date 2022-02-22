<!DOCTYPE html>
<html lang="en">
@include('zoom.layouts.core.head')

<body class="fixed-left">

    <!-- Loader 
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
-->
    <!-- Begin page -->
    <div id="wrapper">



        <!-- Start right Content here -->

        <div class="content-page">

            <!-- Start content -->
            <div class="content">



                <div class="page-content-wrapper ">

                    <div class="container-fluid">



                        @yield('content')



                    </div><!-- container fluid -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            @include('zoom.layouts.core.footer')

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->

</body>

@include('zoom.layouts.core.js')

</html>
