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
        <form class="contact100-form validate-form"  action="{{route('construction_catanat')}}" method="post">
            @csrf

            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i>Formule Habitation <span>2</span></h5>
            </div>
            <div class="slice">
                <h6>Valeur assurée </h6>
                <div class="wrap-input100 validate-input2">
                    <input id="val_assur" class="input100" type="number" name="val_assur" placeholder="Valeur assurée" value="{{$val_assur ?? ''}}" min=0 required>

                </div>
            </div>

           <div class="slice">
                <h6>Type de la construction</h6>
               <div class="wrap-input100 validate-input3">
                   <select id="type_const" class="input100" type="text" name="type_const" placeholder="type_const">
                       <option value="Habitation individuelle" @if ($type_const == "Habitation individuelle") selected @endif>Habitation individuelle</option>
                       <option value="Habitation collective" @if ($type_const == "Habitation collective") selected @endif>Habitation collective</option>
                       <option value="Immeuble" @if ($type_const == "Immeuble") selected @endif>Immeuble</option>
                   </select>

               </div>
           </div>
          <div class="slice">
                <div class="radio_section">
                  <h6>La construction dispose-t-elle d'un permis de construire ? </h6>
                  <label>

                      <input type="radio" name="permis" id="oui" value="oui"  checked  @if ($permis == "oui") checked @endif />

                      <span>Oui</span>

                  </label>
                  <label>
                      <input type="radio" name="permis" id="non" value="non" @if ($permis == "non") checked @endif />
                      <span>Non</span>
                  </label>
              </div>
          </div>

            <input type="hidden" name="type_formule" id="type_formule" value="{{$formul ?? ''}}">

            <div class="container-contact100-form-btn">
                <a href="{{route('index_catnat')}}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent
                </a>
                <input  class="contact100-form-btn" type='submit' id="suivant" nom="suivant" value="suivant">
            </div>

        </form>
    </div>
</div>
@endsection
