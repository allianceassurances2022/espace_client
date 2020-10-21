@extends('default_produit')
@section('tab_title')
    Automobile formule LAKI
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
                            <option value="0" @if($auto['usage'] == '0') selected @endif>Affaire</option>
                            <option value="1" @if($auto['usage'] == '1') selected @endif>Fonctionnaire</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Durée <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="dure" id="dure" onchange="disable_devis()" placeholder="Montant Forfetaire">
                        <option value="1" @if($auto['dure'] == '1') selected @endif>1 Année</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Formule <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="formule" onchange="disable_devis()" placeholder="Montant Forfetaire">
                        <option value="1" @if($auto['formule'] == '1') selected @endif>Tous Risques</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Assistance <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="assistance" onchange="disable_devis()" placeholder="Montant Forfetaire">
                        <option value="Tranquilité_plus" @if($auto ['assistance'] == 'Tranquilité_plus') selected @endif onchange="alert('change')">Tranquillité Plus</option>
                        <option value="Liberté" @if($auto['assistance'] == 'Liberté') selected @endif>Liberté</option>
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

            <div class="slice" id="tax-poll">


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

             </div>
            <!-- fin produit laki + -->
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
                        <a  href="{{route('devis_auto')}}" class="contact100-form-btn devi-btn">
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
<script>


    function disable_taxe() {
        if($('#dure').val() == "2"){
            $('#tax-poll').show();
        }
      }

$(function(){

  $('#tax-poll').hide();

  var dtToday = new Date();

  var year_auto = dtToday.getFullYear() - 10;

  $('#anne_auto').attr('min', year_auto);

});

  function taxe_change(){


        var button = document.getElementById("devi-btn");
        button.style.display = "none";
    }

    function taxe_change(){
        if($('#taxe').val() == "oui"){
            $('#date-taxe').css("display","block");
        }else {
            $('#date-taxe').css("display","none");
        }


        var button = document.getElementById("devi-btn");
        button.style.display = "none";

    }


  function disable_devis(){

      var button = document.getElementById("devi-btn");
      button.style.display = "none";

  }


</script>
@endsection

@section('docready')



    App.formElements();
    App.masks();

    var map;

    initialize();

    $('#Wilaya_map').change(function(){


    if($(this).val() != '')
    {
    var select = $(this).attr("id");

    var value = $(this).val();


    //alter(dependent);

    var _token = $('#signup-token').val();
    //alert( _token );
    $.ajax({

    //alert(value);
    url:"{{ route('construction.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token: $('#signup-token').val()},
    success:function(result)
    {
    $('#Commune_map').html(result);
    //alert(value);

    }

    })
    }
    });
@endsection
