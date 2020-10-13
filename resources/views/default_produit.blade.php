<!DOCTYPE html>
<html lang="en">
@include('core.produit.head')
<body>
    @include('core.produit.menu')

    @include('sweetalert::alert')
    @yield('content')
    @include('core.produit.js')
</body>
</html>
