@extends('default_produit')
@section('tab_title')
    MRH
@endsection

@section('produit_url')
background-image: url({{asset('produit_assets/images/backgrounds/habitation.jpg')}});

@endsection




@section('content')




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


            {{-- <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Informations situation du risque <span>1</span></h5>
            </div> --}}

            @include('core.home.messages')


            <form class="contact100-form " action="{{route('montant_mrh')}}" method="post" >
            @csrf

           <div class="slice">
                <h6>
               <a href="javascript:mtnf();"><img src="{{asset('images/info.svg')}}" alt="Informations" title="Informations" style="margin-right: 5px; height: 23px;"></a>
               Montant forfaitaire</h6>
               <div class="wrap-input100 validate-input2">

                 {{-- <input class="input100" type="number" name="montant" placeholder="" value="{{$montant ?? ''}}" min="0" required> --}}
                 {{-- <input type="text" id="money" name="montant" placeholder="" value="{{$montant ?? ''}}"  required> --}}
                 <input class="input100 money" onchange="montant_forfaitaire();" oninput="disable_devis()" value="{{$montant ?? ''}}" type="text" id="money" required>

               </div>

           </div>

           <div class="slice">
                <h6>Nombre de pieces</h6>

               <div class="wrap-input100 validate-input3">
                   <input  class="input100" type="number" name="nbr_piece" placeholder="" value="{{$nbr_piece ?? ''}}" min="0" oninput="disable_devis()" required>
                   <span class="focus-input100"></span>
               </div>
           </div>

           <div class="slice slice_third">

                <div class="radio_section_slice">
                   <h6>
                   <a href="javascript:habi();"><img src="{{asset('images/info.svg')}}" alt="Informations" title="Informations" style="margin-right: 5px; height: 23px;"></a>
                   Habitation</h6>
                     <label>
                       <input type="radio" name="habitation"  value="individuelle" checked @if( (isset($habitation)) && $habitation  ==="individuelle")  checked @endif onclick="disable_devis()" required>
                       <span>Individuelle</span>
                   </label>
                   <label>
                       <input type="radio" name="habitation"  value="collective" @if( (isset($habitation)) && $habitation  ==="collective") checked @endif onclick="disable_devis()" required>
                       <span>Collective</span>
                   </label>
               </div>
           </div>
            <div class="slice slice_third">
                <div class="radio_section_slice">
                    <h6>Qualité juredique</h6>
                    <label>
                        <input type="radio" name="juredique" value="proprietaire" checked @if( (isset($juredique)) &&  $juredique ==="proprietaire") checked @endif onclick="disable_devis()" required>
                        <span>Propretaire</span>
                    </label>
                    <label>
                        <input type="radio" name="juredique" value="locataire" @if(  (isset($juredique)) &&   $juredique ==="locataire") checked @endif onclick="disable_devis()" required>
                        <span>locataire</span>
                    </label>
                </div>
            </div>

           <div class="slice slice_third">
              <div class="radio_section_slice">
                 <h6><a href="javascript:terass();"><img src="{{asset('images/info.svg')}}" alt="Informations" title="Informations" style="margin-right: 5px; height: 23px;"></a>
                   Terrasse</h6>
                     <label>
                     <input type="radio" name="terasse" id="oui" value="oui" checked @if(  (isset($terasse)) &&   $terasse ==="oui") checked @endif onclick="disable_devis()" required>
                     <span>Oui</span>
                     </label>
                     <label>
                     <input type="radio" name="terasse" id="non" value="non"  @if(  (isset($terasse)) &&   $terasse ==="non") checked @endif onclick="disable_devis()" required>
                     <span>Non</span>
                     </label>
             </div>
           </div>

                <div class="d-flex justify-content-center recaptcha">
                    <div class="cc-selector">
                        <div class="g-recaptcha"  data-sitekey="6LdA5eMZAAAAABi5jq_MCXyQl-7hHGOEH-lHkSBd"></div>
                    </div>
                </div>

            @if(isset($totale))
            <div class="tarificateur">
                <h5>Montant à payer </h5>
                <div class="wrap-input100 validate-input">
                    <input id="montant_calcul" class="input100" type="text" name="montant_calcul"  placeholder="Calcul du Montant en cours" @if(isset($totale)) value="{{number_format($totale, 2,',', ' ')}}"@endif  disabled="">
                    <span class="focus-input100"></span>
                </div>
            </div>
            @endif
            <div class="container-contact100-form-btn">
            <input class="contact100-form-btn" type ='submit' id="calculer" nom="calculer" value="calculer">

            @if(isset($totale))
               <div id="devi-btn">
                   <a href="{{route('devis_mrh')}}" class="contact100-form-btn">
                       Devis <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                   </a>
               </div>
            @endif

            <input type="hidden" name="habl" id="habl" value="{{$habitation ?? ''}}">
            <input type="hidden" name="juridiquee" id="juridiquee" value="{{$juredique ?? ''}}">
            <input type="hidden" name="terassedd" id="terassedd" value="{{$terasse ?? ''}}">
            <input type="hidden" name="montant" id="montant" placeholder="" value="{{$montant ?? ''}}">

            </div>
        </form>

    </div>
</div>
@endsection

@section('js')
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery.mask.min.js')}}"></script>

  <script>

function montant_forfaitaire(){

  var mtn = $('#money').val();
  var mtn_apres = mtn.split(' ').join('');
  var mtn_apres = mtn_apres.split(',').join('.');
  if(mtn_apres >= 200000 && mtn_apres <= 5000000 && mtn_apres%50000 == 0 ) {
    $('#montant').val(mtn_apres);
  } else {
    Swal.fire({
    title: 'Attention!',
    text: 'Le capital mobilier doit être entre 200 000 DA et 5 000 000 DA avec des paliers de 50 000 DA',
    icon: 'warning',
    confirmButtonText: 'OK'
     })
      $('#money').val('');
  }

}

function mtnf(){

  Swal.fire({
  title: 'Information',
  html: '<p style="line-height:18px;"><br/><br/><strong style="font-weight:bold;">Montant forfaitaire :</strong> capital mobilier assuré <br/><br/></p>',
  icon: 'info',
  confirmButtonText: 'OK'
})

}

function habi(){

  Swal.fire({

  title: 'Information',
  html: '<p style="line-height:18px;"><br/><br/>'+
        '<strong style="font-weight:bold; font-size:14px;">Habitation :</strong><br/><br/>'+
				'<strong style="font-weight:bold;">Habitation individuelle  :</strong> (Ex : Villa) <br/>'+
        '<strong style="font-weight:bold;">Habitation collective :</strong> appartement dans un immeuble <br/><br/>'+
        '</p>',
  icon: 'info',
  confirmButtonText: 'OK'
 })

}

function terass(){

  Swal.fire({
  title: 'Information',
  html: '<p style="line-height:18px;"><br/><br/><strong style="font-weight:bold;">Terasse :</strong> existence d\'une terrasse <br/><br/></p>',
  icon: 'info',
  confirmButtonText: 'OK'
})

}

function disable_devis(){
    var button = document.getElementById("devi-btn");
    button.style.display = "none";

    //window.alert('ca marche!!')
}



</script>


@endsection


@section('ready')
$(function() {
  $('.money').mask('# ##0,00', {reverse: true});
});
@endsection
