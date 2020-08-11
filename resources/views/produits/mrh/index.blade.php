@extends('default_produit')
@section('tab_title')
MRH
@endsection

@section('produit_url')
background-image: url({{asset('produit_assets/images/backgrounds/habitation.jpg')}});

@endsection

@section('content')

<div id="tarif">

    <div class="container-contact100">
        <div class="wrap-contact100">
            <button class="btn-hide-contact100">
                <i class="zmdi zmdi-close"></i>
            </button>

            <div class="contact100-form-title" style="@yield('produit_url')">
                <span> <img src="{{asset('produit_assets/images/icons/hab_white.svg')}}" alt="">
                    Multirisques Habitation
                </span>
            </div>
            @include('core.produit.inside-menu')
            <form id="envoi_post" class="contact100-form " action="{{route('montant_mrh')}}" method="post">
                @csrf
                <div class="tite_container">
                    <h5 class="active"><i class="fa fa-info-circle"></i> Informations situation du risque <span>1</span></h5>
                </div>

                <div class="slice">
                    <h6>Montant forfaitaire</h6>
                    <div class="wrap-input100 validate-input2">


                   <div v-if="visible_montant === true">
                   <input class="input100" type="number" name="montant" v-model="montant" min="0" placeholder="" value="" v-on="change_etat()" @blur="onBlurNumber_montant()" required>
                    </div>
                    <div v-if="visible_montant === false">
                        <input class="input100" type="text" v-model="montant" @focus="onFocusText_montant()" placeholder="">
                    </div>
                    <span class="focus-input100"></span>



        </div>

    </div>

    <div class="slice">
        <h6>Nombre de pieces</h6>

        <div class="wrap-input100 validate-input3">
            <input class="input100" type="number" name="nbr_piece" v-model="nbr_piece" min="0" max="100" placeholder="" value="" v-on="change_etat()" required>
            <span class="focus-input100"></span>
        </div>
    </div>

    <div class="slice slice_third">
        <div class="radio_section_slice">
            <h6>Habitation</h6>
            <label>
                <input type="radio" name="habitation" v-model="habitation" value="individuelle" v-on="change_etat()" required>
                <span>Individuelle</span>
            </label>
            <label>
                <input type="radio" name="habitation" v-model="habitation" value="collective" v-on="change_etat()" required>
                <span>Collective</span>
            </label>
        </div>
    </div>
    <div class="slice slice_third">
        <div class="radio_section_slice">
            <h6>Qualité juredique</h6>
            <label>
                <input type="radio" name="juredique" v-model="juredique" value="proprietaire" v-on="change_etat()" required>
                <span>Propretaire</span>
            </label>
            <label>
                <input type="radio" name="juredique" v-model="juredique" value="locataire" v-on="change_etat()" required>
                <span>locataire</span>
            </label>
        </div>
    </div>

    <div class="slice slice_third">
        <div class="radio_section_slice">
            <h6>Terrasse</h6>
            <label>
                <input type="radio" name="terasse" v-model="terasse" value="oui" v-on="change_etat()" required>
                <span>Oui</span>
            </label>
            <label>
                <input type="radio" name="terasse" v-model="terasse" value="non" v-on="change_etat()" required>
                <span>Non</span>
            </label>
        </div>
    </div>






   @verbatim


    <div class="tarificateur">
      <h5>Montant à payer </h5>
      <div class="wrap-input100 validate-input">
          <input id="montant_calcul" class="input100" type="text" name="montant_calcul" placeholder="Calcul du Montant en cours" v-model="total" disabled="">
          <span class="focus-input100"></span>
      </div>
    </div>

    @endverbatim

<div class="container-contact100-form-btn">

  <div v-if="etat_init === true">
    <button type="button" class="contact100-form-btn" v-on:click="calcul()">Calculer</button>
  </div>

    <div v-if="etat === true">
    <a href="{{route('devis_mrh')}}" class="contact100-form-btn"> Devis <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
    </a>
    </div>

</div>



</form>



</div>
</div>

</div>

@endsection

@section('js')
<script src="{{asset('assets/js/vue.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/app-tarif-mrh.js')}}" type="text/javascript"></script>

@endsection
