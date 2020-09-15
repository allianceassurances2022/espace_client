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
                   <select class="input100" type="text" name="usage" placeholder="Usage">
                            <option value="0" @if($auto['usage'] == '0') selected @endif>Affaire</option>
                            <option value="1" @if($auto['usage'] == '1') selected @endif>Fonctionnaire</option>
                            <option value="2" @if($auto['usage'] == '2') selected @endif>Commerce</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Durée <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="dure" placeholder="Montant Forfetaire">
                        <option value="1" @if($auto['dure'] == '1') selected @endif>1 Année</option>
                        <option value="2" @if($auto['dure'] == '2') selected @endif>6 Mois</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Formule <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="formule" placeholder="Montant Forfetaire">
                        <option value="1" @if($auto['formule'] == '1') selected @endif>Tous Risques</option>
                        <option value="2" @if($auto['formule'] == '2') selected @endif>D.C Valeur Vénale</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Assistance <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="assistance" placeholder="Montant Forfetaire">
                        <option value="Sir_mhanni" @if($auto ['assistance'] == 'Sir_mhanni') selected @endif>Sir Mhanni</option>
                        <option value="Tranquilité" @if($auto ['assistance'] == 'Tranquilité') selected @endif>Tranquillité</option>
                        <option value="Tranquilité_plus" @if($auto ['assistance'] == 'Tranquilité_plus') selected @endif>Tranquillité Plus</option>
                        <option value="Liberté" @if($auto['assistance'] == 'Liberté') selected @endif>Liberté</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>

            <div class="slice">
                <h6>Avez-Vous déja payez une taxe pollution ?<span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                  <select class="input100" type="text" name="taxe" placeholder="Taxe Pollution" onchange="taxe_change()" id="taxe">
                      <option value="non" @if($auto['taxe'] == 'non') selected @endif>Non</option>
                      <option value="oui" @if($auto['taxe'] == 'oui') selected @endif>Oui</option>
                  </select>
                    <span class="focus-input100"></span>
                </div>
            </div>

            <div class="slice" id="date-taxe" @if($auto['taxe'] == 'non') style="display:none; @endif">
                <h6>Date effet de la taxe<span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100">
                  <input class="input100" type="date" name="date_taxe" value="{{$auto['date_taxe'] ?? ''}}">
                    <span class="focus-input100"></span>
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
            <input type="hidden" name="annee_auto" value="{{$auto['annee_auto']}}">
            <input type="hidden" name="puissance" value="{{$auto['puissance']}}">
            <input type="hidden" name="valeur_auto" value="{{$auto['valeur_auto']}}">
            <input type="hidden" name="type_assurance" value="{{$auto['type_assurance']}}">
            <input type="hidden" name="Wilaya_selected" value="{{$auto['Wilaya_selected']}}">


            <div class="container-contact100-form-btn">
                <a href="{{route('type_produit',['auto','index'])}}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent
                </a>

                <input  class="contact100-form-btn" type='submit' name="calculer" value="calculer">
                @if($devis != 0)
                <a href="{{route('devis_auto')}}" class="contact100-form-btn">
                     Devis <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>

  function taxe_change(){
    if($('#taxe').val() == "oui"){
      $('#date-taxe').css("display","block");
    }else {
      $('#date-taxe').css("display","none");
  }

  }

</script>
@endsection
