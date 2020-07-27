@extends('default_produit')
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
        <form class="contact100-form validate-form" action="{{route('choix_auto')}}" method="post">
            @csrf
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Informations<span>1</span></h5>
            </div>
            <div class="slice">
                <h6>Date de naissance assuré/conducteur <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="date" id="date_conducteur" name="date_conducteur" placeholder="Date de naissance assuré/conducteur">
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Date d'obtention du permis <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="date" name="date_permis" placeholder="Date d'obtention du permis">
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Immatriculé à<span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="Wilaya" placeholder="Wilaya">
                    @foreach($wilaya as $wilay)
                        <option value="{{$wilay->code_wilaya}}">{{$wilay->nlib_wilaya}}</option>
                    @endforeach
                   </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Année de mise en circulation <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="number" name="annee_auto" placeholder="Année de mise en circulation" min=0 max="9999">
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Puissance <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                   <select class="input100" type="text" name="puissance" placeholder="Puissance">
                            <option value="0">2 CV</option>
                            <option value="1">3 à 4 CV</option>
                            <option value="2">5 à 6 CV</option>
                            <option value="3">7 à 10 CV</option>
                            <option value="4">11 à 14 CV</option>
                            <option value="5">15 à 23 CV</option>
                            <option value="6">Plus de 24 CV</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Valeur estimée du vehicule <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="number" name="valeur_auto" placeholder="Valeur estimée du vehicule">
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Type d'assurance <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="type_assurance" placeholder="Type d'assurance">
                        <option value="AUTO_P">AUTO Particulier</option>
                        <option value="OTO_L">OTO + LAKI</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            
            <div class="container-contact100-form-btn">
            <input  class="contact100-form-btn" type='submit' name="suivant">   
            </div>
        </form>
    </div>
</div>

@endsection