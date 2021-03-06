@extends('default_produit')
@section('nom_produit')
    Mon compte
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

        <form class="contact100-form validate-form" action="{{route('type_formule_catnat')}}" method="post">
            @csrf
            {{-- <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Choix de la formule <span>1</span></h5>
            </div> --}}

            <h6>Formule <span>(Choisissez votre formule)</span></h6>
            <div class="wrap-input100 validate-input2">
                <select id="formule" class="input100" type="text" name="formule" placeholder="Formule">
                    <option @if($formul =="Habitation") selected @endif  value="Habitation">Habitation</option>
                      <option @if($formul =="Commerce") selected @endif value="Commerce">Commerce</option>
                    <option @if($formul =="Industrielle") selected @endif value="Industrielle">Industrielle</option>
                </select>
            </div>

            <input type="hidden" name="code_formule" id="code_formule" value="{{$code_formule?? ''}}">

            <div class="container-contact100-form-btn">
            <input  class="contact100-form-btn" type='submit' id="suivant" nom="suivant" value="suivant" >

            </div>
        </form>
    </div>
</div>
@endsection
