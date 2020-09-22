<!DOCTYPE html>
<html lang="en">
    @include('core.home.head')

    <body class="be-splash-screen">

      <div class="be-wrapper be-login">

                <!-- Start content -->
                <div class="be-content">

                    <div class="main-content container-fluid">

                            {{-- @include('core.breadcrumb') --}}

                             @include('core.home.messages') 

                             @include('sweetalert::alert')

                            @yield('content')

                    </div>

                </div> <!-- content -->





            @include('core.home.footer')

        </div>
        <!-- END wrapper -->


    </body>

    @include('core.home.js')

</html>
