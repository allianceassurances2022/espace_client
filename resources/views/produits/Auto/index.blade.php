@extends('default_produit')
@section('tab_title')
    Automobile
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

        @include('core.produit.inside-menu')

        {{-- <noscript>

      			Votre navigateur ne supporte pas Javascript. L'application peut ne pas fonctionner correctement. Contacter votre administrateur.

      			<br />

      			Cliquez <a href='../menu/connexion.php' style='color : #fff;font-size:20px;'>ici</a> pour revenir à la page de connexion.

      		</noscript> --}}

          <noscript>
          <meta http-equiv="refresh" content="0; url=http://127.0.0.1:8000">
          </noscript>

        <form class="contact100-form validate-form" action="{{route('choix_auto')}}" method="post">
            @csrf
            {{-- <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Informations<span>1</span></h5>
            </div> --}}
            <div class="slice">
                <h6>Date de naissance assuré/conducteur <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input class="input100" type="date" id="date_conducteur" name="date_conducteur" value="{{$auto['date_conducteur'] ?? ''}}" placeholder="Date de naissance assuré/conducteur">
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Date d'obtention du permis <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input class="input100" id="date_permis" type="date" name="date_permis" value="{{$auto['date_permis'] ?? ''}}" placeholder="Date d'obtention du permis">
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">

                <h6>Immatriculé à<span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="Wilaya_selected" placeholder="Wilaya">
                    @foreach($wilaya as $wilay)
                        <option value="{{$wilay->code_wilaya}}" @if($auto['Wilaya_selected'] == $wilay->code_wilaya) selected @endif>{{$wilay->nlib_wilaya}}</option>
                    @endforeach
                   </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Puissance <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                   <select class="input100" type="text" name="puissance" placeholder="Puissance">
                            <!--option value="0" @if($auto['puissance'] == '0') selected @endif>2 CV</option>
                            <option value="1" @if($auto['puissance'] == '1') selected @endif>3 à 4 CV</option>
                            <option value="2" @if($auto['puissance'] == '2') selected @endif>5 à 6 CV</option>
                            <option value="3" @if($auto['puissance'] == '3') selected @endif>7 à 10 CV</option>
                            <option value="4" @if($auto['puissance'] == '4') selected @endif>11 à 14 CV</option>
                            <option value="5" @if($auto['puissance'] == '5') selected @endif>15 à 23 CV</option>
                            <option value="6" @if($auto['puissance'] == '6') selected @endif>Plus de 24 CV</option-->
                        @foreach($puissances as $puissance)
                             <option value="{{$puissance->code}}" @if($auto['puissance'] == $puissance->code) selected @endif>{{$puissance->libelle}}</option>
                         @endforeach
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Valeur estimée du vehicule <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    {{-- <input class="input100" type="number" name="valeur_auto" placeholder="Valeur estimée du vehicule"> --}}
                    <input class="input100 money" onchange="valeur_vehicule();" value="{{$auto['valeur_auto'] ?? ''}}" type="text" id="money" required>
                    <span class="focus-input100"></span>
                </div>
            </div>
            <div class="slice">
                <h6>Type d'assurance <span>(Choix Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <select class="input100" type="text" name="type_assurance" placeholder="Type d'assurance">
                        <option value="AUTO_P" @if($auto['type_assurance'] == 'AUTO_P') selected @endif>AUTO Particulier</option>
                        <option value="OTO_L" @if($auto['type_assurance'] == 'OTO_L') selected @endif>OTO + LAKI</option>
                    </select>
                    <span class="focus-input100"></span>
                </div>
            </div>

            <input type="hidden" name="valeur_auto" id="valeur_auto" type="number" value="{{$auto['valeur_auto'] ?? ''}}" >

            <div class="container-contact100-form-btn">
            <input  class="contact100-form-btn" type='submit' name="suivant" value="suivant">
            </div>
        </form>
    </div>
</div>

@endsection


@section('js')

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery.mask.min.js')}}"></script>


<script>
  $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear() ;
    var year_ = dtToday.getFullYear() - 18;
    var year_auto = dtToday.getFullYear() - 10;

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate_permis = year + '-' + month + '-' + day;
    var maxDate = year_ + '-' + month + '-' + day;
    $('#date_permis').attr('max', maxDate_permis);
    $('#date_conducteur').attr('max', maxDate);

      var  minyear = year - 85;

      var minDate = minyear + '-01-01' ;
      var minDatePermis =  (minyear+ 18) + '-01-01' ;

      $('#date_permis').attr('min', minDatePermis);
      $('#date_conducteur').attr('min', minDate);


      $('#anne_auto').attr('min', year_auto);

  });
</script>

<script>
function valeur_vehicule(){

  var mtn = $('#money').val();
  var mtn_apres = mtn.split(' ').join('');
  var mtn_apres = mtn_apres.split(',').join('.');

  if(mtn_apres < 800000){

  Swal.fire({
  title: 'Information',
  html: '<p style="line-height:18px;"><br/><br/><strong style="font-weight:bold;">Valeur Véhicule :</strong> la valeur du véhicule ne doit pas etre inferieure a 800 000 DA <br/><br/></p>',
  icon: 'info',
  confirmButtonText: 'OK'
})

  $('#money').val('');

} else{

  $('#valeur_auto').val(mtn_apres);

}


}

</script>

@endsection

@section('ready')
$(function() {
  $('.money').mask('# ##0,00', {reverse: true});
});
@endsection
