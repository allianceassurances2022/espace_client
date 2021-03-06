<!DOCTYPE html>
<html lang="en">
@include('core.home.head')

<body>

    <div class="be-wrapper">

        @if (auth::user())
            @include('core.home.topbar')
        @endif


        <!-- Start right Content here -->

        <div class="content-page">

            <!-- Start content -->
            <div class="be-content">

                <div class="main-content container-fluid">

                    {{-- @include('core.breadcrumb') --}}

                    {{-- @include('core.home.messages') --}}

                    @include('sweetalert::alert')

                    @yield('content')

                </div>

            </div> <!-- content -->



        </div>
        <!-- End Right content here -->

        @include('core.home.footer')

    </div>
    <!-- END wrapper -->


</body>

@include('core.home.js')

</html>
