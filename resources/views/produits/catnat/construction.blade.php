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
        @include('core.produit.messages')
        @include('core.produit.inside-menu')

        <form class="contact100-form validate-form" action="{{route('montant_catnat')}}" method="post" >
          @csrf
            {{-- <div class="tite_container">
                <h5 class="active"><i class="fa fa-building-o"></i> La construction<span>3</span></h5>
            </div> --}}


            <div class="slice">
                <h6><a href="javascript:surface();"><img src="{{asset('images/info.svg')}}" alt="Informations" title="Informations" style="margin-right: 5px; height: 23px;"></a>
                Surface</h6>
                <div class="wrap-input100 validate-input2">
                    <input id="Superficie" class="input100" type="number" name="Superficie" placeholder="Superficie" value="{{$surface ?? ''}}" min=0 oninput="disable_devis()" required>
                </div>
            </div>
            <div class="slice">
                <h6>Année de construction</h6>
                <div class="wrap-input100 validate-input2">
                    <input id="anne_cont" class="input100" type="number" name="anne_cont" placeholder="Année de construction" value="{{$anne_cont ?? ''}}" min=0 max="9999" oninput="disable_devis()" required>


                </div>
            </div>
            <div class="slice">
                <h6>Wilaya</h6>
                <div class="wrap-input100 validate-input2">
                   <select id="Wilaya" class="input100" type="text" name="Wilaya" onchange="disable_devis()" placeholder="Wilaya">
                    @foreach($wilaya as $wilay)
                        <option value="{{$wilay->code_wilaya}}" @if ($wilay->code_wilaya == $wilaya_selected) selected @endif>{{$wilay->nlib_wilaya}}</option>
                    @endforeach
                   </select>
                </div>
            </div>
            <div class="slice">
                <h6>Commune</h6>
                <div class="wrap-input100 validate-input3">
                    <select id="Commune" class="input100" type="text" name="Commune" onchange="disable_devis()" placeholder="Commune">
                       @if($Commune_selected)
                         @foreach($commune as $commun)
                           <option value="{{$commun->code_commune}}" @if ($commun->code_commune == $Commune_selected) selected @endif>{{$commun->lib_commune}}</option>
                         @endforeach
                       @else
                        <option value="10001">Adrar</option>
                       @endif
                    </select>
                </div>
            </div>
            <div class="radio_section">
                <h6>A t-elle été construite ou vérifiée conforme aux règles parasismiques </h6>
                <label>
                    <input type="radio" name="seisme" value="oui" @if($reg_para == "oui") checked @endif onclick="disable_devis()"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="seisme" value="non" @if($reg_para  == "non") checked @endif onclick="disable_devis()"/>
                    <span>Non</span>
                </label>
                <label>
                    <input type="radio" name="seisme" value="ne sais pas"  @if ($reg_para == "ne sais pas") checked @endif onclick="disable_devis()"/>
                    <span>Ne sais pas</span>
                </label>
            </div>

            <div class="d-flex justify-content-center recaptcha">
                <div class="cc-selector">
                    <div class="g-recaptcha" data-sitekey="6LdA5eMZAAAAABi5jq_MCXyQl-7hHGOEH-lHkSBd"></div>
                </div>
            </div>


        @if($prime_total != 0)
            <div class="tarificateur">
                <h5>Montant à payer </h5>
                <div class="wrap-input100 validate-input2">
                    <input id="montant_calcul" class="input100" type="text" name="montant_calcul"  placeholder="Calcul du Montant en cours" value="{{$prime_total}} DA" >
                </div>
            </div>
           @endif
            <div class="container-contact100-form-btn">
                <a href="{{ route('type_formule') }}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent
                </a>

                <input class="contact100-form-btn" type ="submit" id="calculer" name="calculer" value="calculer">
            @if($prime_total != 0)
              <div id="devi-btn">
                  <a href="{{route('devis_catnat')}}" class="contact100-form-btn">
                      Devis <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                  </a>
              </div>
            @endif
            </div>
            <input type="hidden" name="Contenant" id="Contenant" value="{{$Contenant ?? ''}}">
            <input type="hidden" name="equipement" id="equipement" value="{{$equipement ?? ''}}">
            <input type="hidden" name="marchandise" id="marchandise" value="{{$marchandise ?? ''}}">
            <input type="hidden" name="contenu" id="contenu" value="{{$contenu ?? ''}}">
            <input type="hidden" name="activite" id="activite" value="{{$activite ?? ''}}">
            <input type="hidden" name="registre" id="registre" value="{{$registre ?? ''}}">
            <input type="hidden" name="local" id="local" value="{{$local ?? ''}}">
            <input type="hidden" name="type_formule" id="type_formule" value="{{$type_formule ?? ''}}">
            <input type="hidden" name="val_assur" id="val_assur" value="{{$val_assur ?? ''}}">
            <input type="hidden" name="permis" id="permis" value="{{$permis ?? ''}}">
            <input type="hidden" name="type_const" id="type_const" value="{{$type_const ?? ''}}">
            <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
        </form>
    </div>
</div>
@endsection
@section('js')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>

function surface(){

//alert("oui");
//Swal.fire('Any fool can use a computer');
Swal.fire({
title: 'Information',
html: '<p style="line-height:18px;"><br/><br/>'+
      '<strong style="font-weight:bold; font-size:14px;">Superficie totale bâtie : </strong><br/><br/>'+
      'Si le bien à assurer comprend plusieurs étage additionner les superficies de tous les étages.'+
      '</p>',
icon: 'info',
confirmButtonText: 'OK'
})

}

</script>

<script>
$(document).ready(function(){

 $('#Wilaya').change(function(){
  if($(this).val() != ''){
   var select = $(this).attr("id");
   var value = $(this).val();
   var _token = $('#signup-token').val();
   $.ajax({
    url:"{{ route('construction.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token: $('#signup-token').val()},
    success:function(result){
     $('#Commune').html(result);
    }
   })
  }
 });

});

function disable_devis(){
    var button = document.getElementById("devi-btn");
    button.style.display = "none";

    //window.alert('ca marche!!')
}
</script>

@endsection
