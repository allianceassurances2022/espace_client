@extends('default_produit')
@section('nom_produit')
    Professionnel
@endsection
@section('tab_title')
    Professionnel
@endsection
@section('produit_url')
background-image: url({{asset('produit_assets/images/backgrounds/entreprise.jpg')}});
@endsection
@section('content')
<div class="container-contact100">
    <div class="wrap-contact100">
        <button class="btn-hide-contact100">
            <i class="zmdi zmdi-close"></i>
        </button>

        <div class="contact100-form-title" style="@yield('produit_url')">
            <span><img src="{{asset('produit_assets/images/icons/pro_white.svg')}}" alt=""> Professionnel</span>
        </div>
        <form class="contact100-form validate-form">
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Informations de l'assuré <span>1</span></h5>
            </div>
            <div class="slice">
                <h6>Activité <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                        <option value="">Production</option>
                        <option value="">Administratifs</option>
                        <option value="">Stockage</option>
                    </select>
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>

            <div class="slice">
                <h6>Statut de l'assuré <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                        <option value="">Production</option>
                        <option value="">Administratifs</option>
                        <option value="">Stockage</option>
                    </select>
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>

            <div class="slice">
                <h6>La superficie <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>

            <div class="slice">
                <h6>Nombre d'employés <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>
            <div class="container-contact100-form-btn">
                <a href="{{route('type_produit',['mrp','garanties'])}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
        </form>
    </div>
</div>
@endsection