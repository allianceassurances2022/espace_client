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
            {{-- <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Formule Commerce <span>2</span></h5>
            </div> --}}


            <div class="slice">
                <h6>Type de la construction </h6>
                <div class="wrap-input100 validate-input2">
                    <select id="type_const" class="input100" type="text" name="type_const" placeholder="type_const">
                        <option value="Bloc indépendant" @if ($type_const == "Bloc indépendant") selected @endif>Bloc indépendant</option>
                        <option value="Autres" @if ($type_const == "Autres") selected @endif>Autres</option>
                    </select>

                </div>
            </div>

            <div class="slice">
                <h6>Valeur Contenant</h6>
                <div class="wrap-input100 validate-input3">
                    {{-- <input id="Contenant" class="input100" type="number" name="Contenant" value="{{$Contenant ?? ''}}" placeholder="Valeur Contenant" min=0 required> --}}
                    <input class="input100 money" onchange="montant_contenant();" value="{{$Contenant ?? ''}}" type="text" id="Contenant" required>

                </div>
            </div>
            <div class="slice">
                <h6>Valeur equipement</h6>
                <div class="wrap-input100 validate-input2">
                    {{-- <input id="equipement" onchange="calcul_contenu();" class="input100" type="number" name="equipement" value="{{$equipement ?? 0}}" placeholder="Valeur equipement" min=0 required> --}}
                    <input class="input100 money" onchange="calcul_contenu();" value="{{$equipement ?? '0'}}" type="text" id="equipement" required>

                </div>
            </div>


            <div class="slice">
                <h6>Valeur marchandise</h6>
                <div class="wrap-input100 validate-input3">
                    {{-- <input id="marchandise" onchange="calcul_contenu();" class="input100" type="number" name="marchandise" value="{{$marchandise ?? 0}}" placeholder="Valeur marchandise" min=0 required> --}}
                    <input class="input100 money" onchange="calcul_contenu();" value="{{$marchandise ?? '0'}}" type="text" id="marchandise" required>

                </div>
            </div>
            <div class="slice">
                <h6>Valeur contenu</h6>
                <div class="wrap-input100 validate-input2">
                    {{-- <input id="contenu" class="input100 money" type="text" name="contenu" value="{{$contenu ?? 0}}" placeholder="Valeur contenu" min=0 required readonly> --}}
                    <input class="input100 money" value="{{$contenu ?? '0'}}" type="text" id="contenu" required readonly>

                </div>
            </div>
            <div class="radio_secion">
                <div class="slice_third">
                    <div class="radio_section_slice">
                        <h6>Es une activité qui doit être inscrite au registre de commerce ?</h6>
                        <label>
                            <input type="radio" name="activite" id="oui" value="oui" checked @if ($activite == "oui") checked @endif/>
                            <span>Oui</span>
                        </label>
                        <label>
                            <input type="radio" name="activite" id="non" value="non" @if ($activite == "non") checked @endif />
                            <span>Non</span>
                        </label>
                        <label>
                            <input type="radio" name="activite" id="ne_sais_pas" value="ne_sais_pas"  @if ($activite == "ne_sais_pas") checked @endif/>
                            <span>Ne sais pas</span>
                        </label>
                    </div>
                </div>
                <div class="slice_third">
                    <div class="radio_section_slice">
                        <h6>Si oui, disposez-vous d’un registre de commerce ?</h6>
                        <label>
                            <input type="radio" name="registre" value="oui" checked  @if ($registre == "oui") checked @endif/>
                            <span>Oui</span>
                        </label>
                        <label>
                            <input type="radio" name="registre" value="non"   @if ($registre == "non") checked @endif/>
                            <span>Non</span>
                        </label>
                    </div>
                </div>
                <div class="slice_third">
                    <div class="radio_section_slice">
                        <h6>Si le local n’appartient pas à l’assuré, ce local est-il assuré ?</h6>
                        <label>
                            <input type="radio" name="local" id="local" onchange="desactiveC();" value="oui" @if ($local == "oui") checked @endif/>
                            <span>Oui</span>
                        </label>
                        <label>
                            <input type="radio" name="local" onchange="desactiveC();" value="non" checked @if ($local == "non") checked @endif/>
                            <span>Non</span>
                        </label>
                        <label>
                            <input type="radio" name="local" onchange="desactiveC();" value="ne_sais_pas"  @if ($local == "ne_sais_pas") checked @endif/>
                            <span>Ne sais pas</span>
                        </label>
                    </div>
                </div>
            </div>

            <input type="hidden" name="type_formule" id="type_formule" value="{{$formul ?? ''}}">
            <input type="hidden" id="Contenant_" name="Contenant" value="{{$Contenant ?? ''}}">
            <input type="hidden" id="equipement_" name="equipement" value="{{$equipement ?? 0}}">
            <input type="hidden" id="marchandise_" name="marchandise" value="{{$marchandise ?? 0}}">
            <input type="hidden" id="contenu_" name="contenu" value="{{$contenu ?? 0}}">

            <div class="container-contact100-form-btn">

                <a href="{{route('index_catnat')}}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent
                </a>

                <input class="contact100-form-btn" type='submit' id="suivant" nom="suivant" value="suivant">


            </div>

        </form>
    </div>
</div>
@endsection

@section('js')

  <script type="text/javascript" src="{{asset('assets/js/jquery.mask.min.js')}}"></script>

  <script>

  function montant_contenant(){

  var mtn = $('#Contenant').val();
  var mtn_apres = mtn.split(' ').join('');
  var mtn_apres = mtn_apres.split(',').join('.');
   $('#Contenant_').val(mtn_apres);

  }

function calcul_contenu(){

  var mtn = $('#equipement').val();
  var mtn_apres = mtn.split(' ').join('');
  var mtn_apres = mtn_apres.split(',').join('.');
   $('#equipement_').val(mtn_apres);

   var mtn = $('#marchandise').val();
   var mtn_apres = mtn.split(' ').join('');
   var mtn_apres = mtn_apres.split(',').join('.');
    $('#marchandise_').val(mtn_apres);

  var equipement = $('#equipement_').val();
  var marchandise = $('#marchandise_').val();
  var somme = parseFloat(equipement) + parseFloat(marchandise);
  $('#contenu').val(number_format(somme, 2,',', ' '));
  $('#contenu_').val(number_format(somme, 2,'.', ''));

}

function desactiveC(){

 if($('#local').is(':checked')){
  $('#Contenant').val(0);
  $('#Contenant').attr('readonly', true);
}else{
  $('#Contenant').attr('readonly', false);
}

}

function number_format(number, decimals, dec_point, thousands_point) {

    if (number == null || !isFinite(number)) {
        throw new TypeError("number is not valid");
    }

    if (!decimals) {
        var len = number.toString().split('.').length;
        decimals = len > 1 ? len : 0;
    }

    if (!dec_point) {
        dec_point = '.';
    }

    if (!thousands_point) {
        thousands_point = '';
    }

    number = parseFloat(number).toFixed(decimals);

    number = number.replace(".", dec_point);

    var splitNum = number.split(dec_point);
    splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
    number = splitNum.join(dec_point);

    return number;
}

</script>

@endsection

@section('ready')
$(function() {
  $('.money').mask('# ##0,00', {reverse: true});
});
@endsection
