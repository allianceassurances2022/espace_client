<div class="bg-container-contact100" style="@yield('produit_url')">
    <div class="contact100-header flex-sb-m">
        <a href="#" class="contact100-header-logo">
            <img src="{{asset('produit_assets/images/icons/alliance-assurance.png')}}" alt="LOGO">
        </a>

        <div  id="my-menu">
            <a href="{{route('index_produit')}}"><button class="btn-contact100 btn-btn contact100-form-btn-white">Produits</button></a>
            <a href="{{route('pannier')}}"><button class="btn-contact100 btn-btn">Mon Pannier</button></a>
            <a href="{{route('signin')}}"><button class="btn-contact100 btn-btn">Mon Compte</button></a>
        <a href="#" class="my-menu-humb"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </div>

        <div  id="mobile-menu" class="display-switch-off">
            <a href="{{route('index_produit')}}"><button class="btn-contact100 btn-btn contact100-form-btn-white">Produits</button></a>
            <a href="{{route('pannier')}}"><button class="btn-contact100 btn-btn">Mon Pannier</button></a>
            <a href="{{route('signin')}}"><button class="btn-contact100 btn-btn">Mon Compte</button></a>
        </div>
    </div>
</div>