@extends('default_produit')
@section('nom_produit')
    CATNAT
@endsection

@section('tab_title')
    CATNAT
@endsection

@section('produit_url')
background-image: url({{asset('produit_assets/images/backgrounds/catastrophe-naturelle.jpg')}});
@endsection

@section('content')
<div class="container-contact100">
    <div class="wrap-contact100">
        <button class="btn-hide-contact100">
            <i class="zmdi zmdi-close"></i>
        </button>

        <div class="contact100-form-title" style="@yield('produit_url')">
            <span><img src="{{asset('produit_assets/images/icons/catnat_white.svg')}}" alt=""> CATNAT</span>
        </div>
        <form class="contact100-form validate-form">
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-building-o"></i> La construction<span>3</span></h5>
            </div>

            <h6>Superficie <span>(Champs Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Nombre de pieces">
                <span class="focus-input100"></span>
                <label class="label-input100" for="phone">
                    <span class="fa fa-bed"></span>
                </label>
            </div>
            <h6>Année de construction <span>(Champs Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Nombre de pieces">
                <span class="focus-input100"></span>
                <label class="label-input100" for="phone">
                    <span class="fa fa-bed"></span>
                </label>
            </div>
            
            <div class="tarificateur">
                <h5>Montant à payer </h5>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Calcul du Montant en cours" disabled="">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-file-text"></span>
                    </label>
                </div>
            </div>

            <div class="container-contact100-form-btn">
                <a href="{{ url()->previous() }}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent  
                <a href="{{route('pannier')}}" class="contact100-form-btn">
                     Calculer  
                </a>
                </a>
                <a href="{{route('pannier')}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>

        </form>
    </div>
</div>
@endsection