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
            <span><img src="{{asset('produit_assets/images/icons/catnat_white.svg')}}" alt=""> Catastrophe Naturelle</span>
        </div>
        <form class="contact100-form validate-form">
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>

            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Formule Commerce <span>2</span></h5>
            </div>
            <h6>Valeur Contenant <span>(Champs Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Nombre de pieces">
                <span class="focus-input100"></span>
                <label class="label-input100" for="phone">
                    <span class="fa fa-bed"></span>
                </label>
            </div>
            <h6>Valeur equipement <span>(Champs Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Nombre de pieces">
                <span class="focus-input100"></span>
                <label class="label-input100" for="phone">
                    <span class="fa fa-bed"></span>
                </label>
            </div>
            <h6>Valeur marchandise <span>(Champs Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Nombre de pieces">
                <span class="focus-input100"></span>
                <label class="label-input100" for="phone">
                    <span class="fa fa-bed"></span>
                </label>
            </div>
            <h6>Valeur contenu <span>(Champs Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input">
                <input id="phone" class="input100" type="text" name="phone" placeholder="Nombre de pieces">
                <span class="focus-input100"></span>
                <label class="label-input100" for="phone">
                    <span class="fa fa-bed"></span>
                </label>
            </div>
            <h6>Type de construction <span>(Choix Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input">
                <select id="phone" class="input100" type="text" name="phone" placeholder="Montant Forfetaire">
                    <option value="">10%</option>
                    <option value="">25%</option>
                    <option value="">50%</option>
                    <option value="">100%</option>
                </select>
                <span class="focus-input100"></span>
                <label class="label-input100" for="phone">
                    <span class="fa fa-home"></span>
                </label>
            </div>
            <div class="radio_section">
                <h6>Es une activité qui doit être inscrite au registre de commerce ? <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Non</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Ne sais pas</span>
                </label>
            </div>
            <div class="radio_section">
                <h6>Si oui, disposez-vous d’un registre de commerce ? <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Non</span>
                </label>
            </div>
            <div class="radio_section">
                <h6>Si le local n’appartient pas à l’assuré, ce local est-il assuré ? <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Non</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Ne sais pas</span>
                </label>
            </div>
            
            <div class="container-contact100-form-btn">
                <a href="{{route('produit_auto_laki')}}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent  
                </a>
                <a href="{{route('produit_auto_laki')}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
        </form>
    </div>
</div>
@endsection