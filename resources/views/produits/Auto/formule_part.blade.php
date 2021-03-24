@extends('default_produit')
@section('tab_title')
    Automobile formule Particulier
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
        <form class="contact100-form validate-form" action="{{route('montant_auto')}}" method="post">
            @csrf
            <!-- produit laki + -->
            {{-- <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Laki + <span>2</span></h5>
            </div> --}}
            <div class="slice">
                <h6>Usage <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                   <select class="input100" type="text" name="usage" id="usage" onchange="disable_devis()" placeholder="Usage">
                            <option value="00" @if($auto['usage'] == '00') selected @endif>Affaire</option>
                            <option value="01" @if($auto['usage'] == '01') selected @endif>Fonctionnaire</option>
                            <option value="02" @if($auto['usage'] == '02') selected @endif>Commerce</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Durée <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="dure" id="dure" onchange="disable_taxe()" placeholder="Montant Forfetaire">

                        <option value="1" @if($auto['dure'] == '1') selected @endif >1 Année</option>
                        <option value="2" @if($auto['dure'] == '2') selected @endif>6 Mois</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Formule <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" id="formule" type="text" name="formule" onchange="disable_devis()" placeholder="Montant Forfetaire">
                        <option value="1" @if($auto['formule'] == '1') selected @endif>Tous Risques</option>
                        <option value="2" @if($auto['formule'] == '2') selected @endif>D.C Valeur Vénale</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Assistance <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="assistance" onchange="disable_devis()" placeholder="Montant Forfetaire">
                        <option value="1" @if($auto ['assistance'] == 'Sir_mhanni') selected @endif>Sir Mhanni</option>
                        <option value="2" @if($auto ['assistance'] == 'Tranquilité') selected @endif>Tranquillité</option>
                        <option value="3" @if($auto ['assistance'] == 'Tranquilité_plus') selected @endif>Tranquillité Plus</option>
                        <option value="4" @if($auto['assistance'] == 'Liberté') selected @endif>Liberté</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>

            <div class="slice">
                <h6>Année de mise en circulation <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="number" name="annee_auto" value="{{$auto['annee_auto'] ?? ''}}" placeholder="Année de mise en circulation" id="anne_auto" max="9999">
                    <span class="focus-input100"></span>
                </div>
            </div>




          {{-- <div id="tax-poll">

            <div class="slice" id="tax-poll">
                <h6 style="width: 340px;">Avez-Vous déja payez une taxe pollution ?<span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                  <select class="input100" type="text" name="taxe"  id="taxe" onchange="taxe_change()" placeholder="Taxe Pollution">
                      <option value="0" @if($auto['taxe'] == '0') selected @endif>Non</option>
                      <option value="1" @if($auto['taxe'] == '1') selected @endif>Oui</option>
                  </select>
                    <span class="focus-input100"></span>
                </div>
            </div>

            <div class="slice" id="date-taxe" @if($auto['taxe'] == 'non') style="display:none; @endif">
                <h6>Date effet de la taxe<span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100">
                  <input value="{{$auto['date_taxe'] ?? ''}}" class="input100" id="date_taxe" type="date" name="date_taxe" >
                    <span class="focus-input100"></span>
                </div>
            </div>


          </div> --}}

          <div class="d-flex justify-content-center recaptcha">
              <div class="cc-selector">
                  <div class="g-recaptcha"  data-sitekey="6LdA5eMZAAAAABi5jq_MCXyQl-7hHGOEH-lHkSBd"></div>
              </div>
          </div>
            <!-- fin produit particulier -->
            @if($devis != 0)
            <div class="tarificateur">
                <h5>Montant à payer </h5>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" name="montant_paye" placeholder="Calcul du Montant en cours" value="{{number_format($devis, 2,',', ' ')}}" readonly >
                    <span class="focus-input100"></span>
                </div>
            </div>
            @endif

            <input type="hidden" name="date_conducteur" value="{{$auto['date_conducteur']}}">
            <input type="hidden" name="date_permis" value="{{$auto['date_permis']}}">
            <input type="hidden" name="puissance" value="{{$auto['puissance']}}">
            <input type="hidden" name="valeur_auto" value="{{$auto['valeur_auto']}}">
            <input type="hidden" name="type_assurance" value="{{$auto['type_assurance']}}">
            <input type="hidden" name="Wilaya_selected" value="{{$auto['Wilaya_selected']}}">


            <div class="container-contact100-form-btn">
                <a href="{{route('precedent_auto')}}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent
                </a>


                <input  class="contact100-form-btn" type='submit' name="calculer" value="calculer">
                @if($devis != 0)
                  <div id="devi-btn">
                      <a href="{{route('devis_auto')}}" class="contact100-form-btn">
                          Devis <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                      </a>
                  </div>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>


$(function(){
//$('#tax-poll').hide();

    // recuperer la date d'aujourdhui
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear() ;

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate = year + '-' + month + '-' + day;

    $('#date_taxe').attr('max',minDate);

if($('#taxe').val() == "oui"){
  $('#date-taxe').css("display","block");
}else {
  $('#date-taxe').css("display","none");
}

if($('#dure').val() == "2"){
    $('#tax-poll').show();
}else{
    $('#tax-poll').hide();
}

annee_max_auto();


});

function annee_max_auto(){
  var dtToday = new Date();

  var year_auto_now = dtToday.getFullYear();
  var year_auto = dtToday.getFullYear() - 10;

  $('#anne_auto').attr('max', year_auto_now);
  $('#anne_auto').attr('min', year_auto);
}

function verif_annee(){
    if($('#formule').val()== 2) {
    $('#anne_auto').removeAttr("min");
  }else if($('#formule').val()== 1) {
    annee_max_auto();
  }
}


  function taxe_change(){
    if($('#taxe').val() == "oui"){
      $('#date-taxe').css("display","block");
    }else {
      $('#date-taxe').css("display","none");
    }
    disable_devis();

  }

  function disable_taxe() {
      if($('#dure').val() == "2"){
          $('#tax-poll').show();
      }else{
          $('#tax-poll').hide();
      }
      disable_devis();


  }

  function disable_devis(){

      verif_annee();
      var button = document.getElementById("devi-btn");
      button.style.display = "none";

  }

</script>
@endsection
