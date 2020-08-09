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
                {{-- <form class="contact100-form " > --}}
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
                <input type="radio" name="hab" v-model="habitation" value="individuelle" v-on="change_etat()" required>
                <span>Individuelle</span>
            </label>
            <label>
                <input type="radio" name="hab" v-model="habitation" value="collective" v-on="change_etat()" required>
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


    {{-- <input type="hidden" nom="habl" id="habl" value="{{$habitation ?? '' ?? ''}}">
    <input type="hidden" nom="juridiquee" id="juridiquee" value="{{$juredique ?? '' ?? ''}}">
    <input type="hidden" nom="terassedd" id="terassedd" value="{{$terasse ?? '' ?? ''}}"> --}}

</div>



</form>



</div>
</div>

</div>

@endsection

@section('js')
<script src="{{asset('assets/js/vue.js')}}" type="text/javascript"></script>
{{-- <script  src="{{asset('assets/js/app_montant_separateur.js')}}" type="text/javascript"></script> --}}

<script type="text/javascript">
    var app = new Vue({
        el: "#tarif",
        data: {
            montant: '',
            nbr_piece: '',
            habitation: '',
            juredique: '',
            terasse: '',
            total: 0,
            etat_init: false,
            etat: false,
            temp_montant: null,
            visible_montant: true
        },
        methods: {
            calcul: function() {
                console.log(this.montant + " " + this.nbr_piece + " " + this.habitation + " " + this.juredique + " " + this.terasse);
                var montant    =this.temp_montant;
                var nbr_piece  =this.nbr_piece;
                var habitation =this.habitation;
                var juredique  = this.juredique;
                var terasse    =this.terasse;
                let that = this;
                $.ajax({
                    type: 'POST',
                    datatype: 'JSON',
                    url: $("#envoi_post").attr('action'),
                    data: {
                        '_token': function() {
                            return $('input[name="_token"]').val();
                        },
                        'montant' : montant,
                        'nbr_piece' : nbr_piece,
                        'habitation' : habitation,
                        'juredique' : juredique,
                        'terasse' : terasse,
                    },
                    success: function(data) {
                        //console.log(data.url);
                        //alert('L\'enregistrement a été fait!');
                        //console.log(that.format(data.url));
                        that.total=that.format(data.total);
                        that.change_etat();
                        //window.location = data.url;

                    },
                    error: function(error) {
                        alert('Erreur d\'enregistrement ');
                        console.log(error);
                        // $('#btnChocSave').attr('disable',false);
                    }
                });
            },
            format : function (val) {
              return new Intl.NumberFormat().format(val) + " DA";
            },
            change_etat: function (){
              if(this.montant != '' & this.nbr_piece != '' & this.habitation != '' & this.juredique != '' & this.terasse != '' & this.total != ''){
                this.etat=true;
                }else {
                  this.etat=false;
                }

                if(this.montant != '' & this.nbr_piece != '' & this.habitation != '' & this.juredique != '' & this.terasse != ''){
                  this.etat_init=true;
                  }else {
                    this.etat_init=false;
                    this.total = '';
                  }
            },
            onBlurNumber_montant() {
                  this.visible_montant = false;
                  this.temp_montant = this.montant;
                  this.montant = this.thousandSeprator_montant(this.montant);
              },
              onFocusText_montant() {
                  this.visible_montant = true;
                  this.montant = this.temp_montant;
             },

            /*Replace numbers with comma separated value*/
             thousandSeprator_montant(montant) {
                 if (montant !== '' || montant !== undefined || montant !== 0  || montant !== '0' || montant !== null) {
              return montant.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
                 } else {
                     return montant;
                 }
             }
        }
    });
</script>
@endsection

{{-- @section('js')
<script>
  function djilali (){
     //console.log();
     var m=$('#montant').val();
     //alert(separate(m));
     $('#montant').val(separate(m));
  }

var reg = new RegExp("( )", 'g');

function separate(v){


    v=v.replace(reg, '').toString();
    var r="";
    var i =0
    var l = v.length;
    var u =0;
    for(i=l;i>0;i--){
        u++;
        r=v.substr(l-u, 1)+r;
        if(u%3==0&&u!=l){
           r=' '+r;
        }

    }
    return r;
}



</script>

@endsection --}}
