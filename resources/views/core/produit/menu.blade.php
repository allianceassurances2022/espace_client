<div class="bg-container-contact100" style="@yield('produit_url')">
    <div class="contact100-header flex-sb-m">
        <a href="#" class="contact100-header-logo">
            <img src="{{asset('produit_assets/images/icons/alliance-assurance.png')}}" alt="LOGO">
        </a>

        <div  id="my-menu">
            <button class="btn-show-contact100 contact100-form-btn-white">Produits</button>
            <button class="btn-show-contact100">Mon Pannier</button>
            <button class="btn-show-contact100">@yield('nom_produit')</button>
        <a href="#" class="my-menu-humb"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </div>

        <div  id="mobile-menu" class="display-switch-off">
            <button class="btn-show-contact100 contact100-form-btn-white">Autres Produits</button>
            <button class="btn-show-contact100">Mon Pannier</button>
            <button class="btn-show-contact100">@yield('nom_produit')</button>
        </div>
    </div>
</div>