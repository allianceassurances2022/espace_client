@extends('default_produit')
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
        <form class="contact100-form validate-form" action="{{route('construction_catanat')}}" method="post">
            @csrf
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Formule Commerce <span>2</span></h5>
            </div>


            <div class="slice">
                <h6>Type de la construction </h6>
                <div class="wrap-input100 validate-input2">
                    <select id="type_const" class="input100" type="text" name="type_const" placeholder="type_const">
                        <option value="Bloc indépendant">Bloc indépendant</option>
                        <option value="Autres">Autres</option>
                    </select>

                </div>
            </div>

            <div class="slice">
                <h6>Valeur Contenant</h6>
                <div class="wrap-input100 validate-input3">
                    <input id="Contenant" class="input100" type="number" name="Contenant" value="{{$Contenant ?? ''}}" placeholder="Valeur Contenant" min=0>

                </div>
            </div>
            <div class="slice">
                <h6>Valeur equipement</h6>
                <div class="wrap-input100 validate-input2">
                    <input id="equipement" class="input100" type="number" name="equipement" value="{{$equipement ?? ''}}" placeholder="Valeur equipement" min=0>

                </div>
            </div>


            <div class="slice">
                <h6>Valeur marchandise</h6>
                <div class="wrap-input100 validate-input3">
                    <input id="marchandise" class="input100" type="number" name="marchandise" value="{{$marchandise ?? ''}}" placeholder="Valeur marchandise" min=0>

                </div>
            </div>
            <div class="slice">
                <h6>Valeur contenu</h6>
                <div class="wrap-input100 validate-input2">
                    <input id="contenu" class="input100" type="number" name="contenu" value="{{$contenu ?? ''}}" placeholder="Valeur contenu" min=0>

                </div>
            </div>
            <div class="radio_secion">
                <div class="slice_third">
                    <div class="radio_section_slice">
                        <h6>Es une activité qui doit être inscrite au registre de commerce ?</h6>
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
                </div>
                <div class="slice_third">
                    <div class="radio_section_slice">
                        <h6>Si oui, disposez-vous d’un registre de commerce ?</h6>
                        <label>
                            <input type="radio" name="registre" value="oui" />
                            <span>Oui</span>
                        </label>
                        <label>
                            <input type="radio" name="registre" value="non" />
                            <span>Non</span>
                        </label>
                    </div>
                </div>
                <div class="slice_third">
                    <div class="radio_section_slice">
                        <h6>Si le local n’appartient pas à l’assuré, ce local est-il assuré ?</h6>
                        <label>
                            <input type="radio" name="local" value="oui" />
                            <span>Oui</span>
                        </label>
                        <label>
                            <input type="radio" name="local" value="non" />
                            <span>Non</span>
                        </label>
                        <label>
                            <input type="radio" name="local" value="ne_sais_pas" />
                            <span>Ne sais pas</span>
                        </label>
                    </div>
                </div>
            </div>

            <input type="hidden" name="type_formule" id="type_formule" value="{{$formul ?? ''}}">

            <div class="container-contact100-form-btn">

                <a href="{{route('index')}}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent
                </a>

                <input class="contact100-form-btn" type='submit' id="suivant" nom="suivant" value="suivant">


            </div>

        </form>
    </div>
</div>
@endsection
