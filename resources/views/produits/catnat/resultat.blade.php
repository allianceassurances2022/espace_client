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
        <form class="contact100-form validate-form" action="{{route('montant_catnat')}}" method="get" >
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-building-o"></i> La construction<span>3</span></h5>
            </div>

            <div class="slice">
                <h6>Superficie</h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" valeur="{{$surface ?? ''}}" placeholder="Nombre de pieces">
                    
                </div>
            </div>
            <div class="slice">
                <h6>Année de construction</h6>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" valeur="{{$anne_cont ?? ''}}"  placeholder="Nombre de pieces">
                    
                </div>
            </div>
            <div class="slice">
                <h6>Wilaya</h6>
                <div class="wrap-input100 validate-input">
                    <select id="formule" class="input100" type="text" name="formule" placeholder="Formule">
                        <option value="16">Alger</option>
     
                    </select>
                    
                </div>
            </div>
            <div class="slice">
                <h6>Commune</h6>
                <div class="wrap-input100 validate-input">
                    <select id="formule" class="input100" type="text" name="formule" placeholder="Formule">
                        <option value="160001">alger</option>
                        
                    </select>
                    
                </div>
            </div>
            <div class="tarificateur">
                <h5>Montant à payer </h5>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" valeur="{{$prime_total}}" placeholder="Calcul du Montant en cours" disabled="">
                    
                </div>
            </div>

            <div class="container-contact100-form-btn">
                <a href="{{ url()->previous() }}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent  
                </a>
                <input class="contact100-form-btn" type ='submit' id="calculer" nom="calculer" value="calculer" >  

                <a href="{{route('signin')}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
            <input type="hidden" nom="type_formule" id="type_formule" value="{{$type_formule ?? ''}}">
            <input type="hidden" nom="Contenant" id="Contenant" value="{{$Contenant ?? ''}}">
            <input type="hidden" nom="equipement" id="equipement" value="{{$equipement ?? ''}}">
            <input type="hidden" nom="marchandise" id="marchandise" value="{{$marchandise ?? ''}}">
            <input type="hidden" nom="contenu" id="contenu" value="{{$contenu ?? ''}}">
            <input type="hidden" nom="activite" id="activite" value="{{$activite ?? ''}}">
            <input type="hidden" nom="registre" id="registre" value="{{$registre ?? ''}}">
            <input type="hidden" nom="local" id="local" value="{{$local ?? ''}}">
        </form>
    </div>
</div>
@endsection