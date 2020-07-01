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
            @include('core.produit.inside-menu')
            <form class="contact100-form validate-form"  action="{{route('construction_catanat')}}" method="post">
            @csrf
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>

            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Formule Industrielle <span>2</span></h5>
            </div>

            <div class="slice">
                <h6>Type de la construction</h6>
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
            </div>

            <div class="slice">
                <h6>Valeur Contenant</h6>
                <div class="wrap-input100 validate-input3">
                    <input id="phone" class="input100" type="number" name="phone" placeholder="Valeur Contenant" min=0>
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                </div>
            </div>

            <div class="slice">
                <h6>Valeur equipement</h6>
                <div class="wrap-input100 validate-input2">
                    <input id="phone" class="input100" type="number" name="phone" placeholder="Valeur equipement" min=0>
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                </div>
            </div>

            <div class="slice">
                <h6>Valeur marchandise</h6>
                <div class="wrap-input100 validate-input3">
                    <input id="phone" class="input100" type="number" name="phone" placeholder="Nombre de pieces" min=0>
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Valeur contenu</h6>
                <div class="wrap-input100 validate-input2">
                    <input id="phone" class="input100" type="number" name="phone" placeholder="Valeur contenu" min=0>
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                </div>
            </div>
            <div class="radio_secion">
                <div class="slice_third">
                    <div class="radio_section">
                        <h6>Es une activité qui doit être inscrite au registre de commerce ? </h6>
                        <label>
                            <input type="radio" name="activite"/>
                            <span>Oui</span>
                        </label>
                        <label>
                            <input type="radio" name="activite"/>
                            <span>Non</span>
                        </label>
                        <label>
                            <input type="radio" name="activite"/>
                            <span>Ne sais pas</span>
                        </label>
                    </div>
                </div>
                <div class="slice_third">
                    <div class="radio_section">
                        <h6>Si oui, disposez-vous d’un registre de commerce ? </h6>
                        <label>
                            <input type="radio" name="registre"/>
                            <span>Oui</span>
                        </label>
                        <label>
                            <input type="radio" name="registre"/>
                            <span>Non</span>
                        </label>
                    </div>
                </div>
                <div class="slice_third">
                    <div class="radio_section">
                        <h6>Si le local n’appartient pas à l’assuré, ce local est-il assuré ? </h6>
                        <label>
                            <input type="radio" name="local"/>
                            <span>Oui</span>
                        </label>
                        <label>
                            <input type="radio" name="local"/>
                            <span>Non</span>
                        </label>
                        <label>
                            <input type="radio" name="local"/>
                            <span>Ne sais pas</span>
                        </label>
                    </div>
                </div>
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