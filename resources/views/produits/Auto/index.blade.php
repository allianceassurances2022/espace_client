@extends('default_produit')
@section('nom_produit')
    Automobile
@endsection

@section('tab_title')
    Automobile
@endsection

@section('produit_url')
background-image: url({{asset('produit_assets/images/backgrounds/automobile.jpg')}});
@endsection

@section('content')
<div class="container-contact100">
    <div class="wrap-contact100">
        <button class="btn-hide-contact100">
            <i class="zmdi zmdi-close"></i>
        </button>

        <div class="contact100-form-title" style="@yield('produit_url')">
            <span><img src="{{asset('produit_assets/images/icons/auto_white.svg')}}" alt=""> Automobile</span>
        </div>
        <form class="contact100-form validate-form">
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Informations vehicule <span>1</span></h5>
            </div>
            <div class="slice">
                <h6>Date de naissance assuré/conducteur <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Numéro d'immatriculation <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Année de mise en circulation <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Personnes transportées <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Valeur Assuré <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Type d'assurance <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                        <option value="">Dur</option>
                        <option value="">Semi-léger</option>
                        <option value="">Léger</option>
                        <option value="">Autre</option>
                    </select>
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>
            
            <div class="container-contact100-form-btn">
                <a href="{{route('type_produit',['auto','laki'])}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
        </form>
    </div>
</div>

@endsection