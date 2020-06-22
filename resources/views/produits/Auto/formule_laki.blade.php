@extends('default_produit')
@section('nom_produit')
    Automobile
@endsection

@section('tab_title')
    Automobile formule LAKI
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
            <!-- produit laki + -->
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Laki + <span>2</span></h5>
            </div>
            <div class="slice">
                <h6>Periode <span>(Choix Obligatoire)</span></h6>
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
            <div class="slice">
                <h6>Usage <span>(Choix Obligatoire)</span></h6>
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
            <div class="slice">
                <h6>Couverture <span>(Choix Obligatoire)</span></h6>
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
            <div class="slice">
                <h6>Assistance <span>(Choix Obligatoire)</span></h6>
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
            <!-- fin produit laki + -->
            <div class="slice">
                <h6>Genre <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Véhicules particuliers sans remorques">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-home"></span>
                    </label>
                </div>
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Extensions suplementaire <span>3</span></h5>
            </div>
            <div class="radio_section">
                <h6>Voulez vous ....etc? <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Non</span>
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
                <a href="" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent  
                </a>
                <a href="" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
        </form>
    </div>
</div>
@endsection