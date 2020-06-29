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
        <form class="contact100-form validate-form" action="{{route('type_formule_catnat')}}" method="get">
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Choix de la formule <span>1</span></h5>
            </div>
            
            <h6>Formule <span>(Choix Obligatoire)</span></h6>
            <div class="wrap-input100 validate-input2">
                <select id="formule" class="input100" type="text" name="formule" placeholder="Formule">
                    <option value="Habitation">Habitation</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Industrielle">Industrielle</option>
                </select>
                <span class="focus-input100"></span>
                <label class="label-input100" for="formule">
                    <span class="fa fa-umbrella"></span>
                </label>
            </div>
            
            <div class="container-contact100-form-btn">
            <input  class="contact100-form-btn" type='submit' id="suivant" nom="suivant" value="suivant" >   
                
            </div>
        </form>
    </div>
</div>
@endsection