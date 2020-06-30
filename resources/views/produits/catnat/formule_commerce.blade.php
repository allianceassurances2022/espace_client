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
        <form class="contact100-form validate-form"  action="{{route('construction_catanat')}}" method="post" >
            @csrf
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>

            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Formule Commerce <span>2</span></h5>
            </div>

            <h6>Type de la construction <span>(Choix Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input2">
                <select id="type_const" class="input100" type="text" name="type_const" placeholder="type_const">
                    <option value="Bloc indépendant">Bloc indépendant</option>
                    <option value="Autres">Autres</option>
                </select>
                <span class="focus-input100"></span>
                <label class="label-input100" for="type_const">
                    <span class="fa fa-umbrella"></span>
                </label>
            </div>

            <div class="slice">
                <h6>Valeur Contenant <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input2">
                    <input id="Contenant" class="input100" type="number" name="Contenant" placeholder="Valeur Contenant">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-calculator"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Valeur equipement <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input2">
                    <input id="equipement" class="input100" type="number" name="equipement" placeholder="Valeur equipement">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-calculator"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Valeur marchandise <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input2">
                    <input id="marchandise" class="input100" type="number" name="marchandise" placeholder="Nombre de pieces">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-calculator"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Valeur contenu <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input2">
                    <input id="contenu" class="input100" type="number" name="contenu" placeholder="Valeur contenu">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-calculator"></span>
                    </label>
                </div>
            </div>
            <div class="radio_section_slice">
                <h6>Es une activité qui doit être inscrite au registre de commerce ? <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="activite" id="oui" value="oui" />
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="activite" id="non" value="non" />
                    <span>Non</span>
                </label>
                <label>
                    <input type="radio" name="activite" id="ne_sais_pas" value="ne_sais_pas" />
                    <span>Ne sais pas</span>
                </label>
            </div>
            <div class="radio_section_slice">
                <h6>Si oui, disposez-vous d’un registre de commerce ? <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="registre"  value="oui"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="registre" value="non"/>
                    <span>Non</span>
                </label>
            </div>
            <div class="radio_section_slice">
                <h6>Si le local n’appartient pas à l’assuré, ce local est-il assuré ? <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="local"  value="oui"  />
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="local"  value="non" />
                    <span>Non</span>
                </label>
                <label>
                    <input type="radio" name="local"  value="ne_sais_pas" />
                    <span>Ne sais pas</span>
                </label>
            </div>

            <input type="hidden" name="type_formule" id="type_formule" value="{{$formul}}">
            
            <div class="container-contact100-form-btn">
                <a href="{{ route('type_produit',['catnat','index']) }}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent  
                </a>
                <input  class="contact100-form-btn" type='submit' id="suivant" nom="suivant" value="suivant" >   
                
                
            </div>
            
        </form>
    </div>
</div>
@endsection