@extends('default_produit')
@section('nom_produit')
    CATNAT
@endsection

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
        <form class="contact100-form validate-form" action="{{route('montant_catnat')}}" method="post" >
          @csrf
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-building-o"></i> La construction<span>3</span></h5>
            </div>

            <div class="slice">
                <h6>Superficie</h6>
                <div class="wrap-input100 validate-input2">
                    <input id="Superficie" class="input100" type="number" name="Superficie" placeholder="Superficie">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Année de construction</h6>
                <div class="wrap-input100 validate-input2">
                    <input id="anne_cont" class="input100" type="number" name="anne_cont" placeholder="Année de construction">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Wilaya</h6>
                <div class="wrap-input100 validate-input2">
                   <select id="Wilaya" class="input100" type="text" name="Wilaya" placeholder="Wilaya">
                    @foreach($wilaya as $wilay)
                        <option value="{{$wilay->code_wilaya}}">{{$wilay->nlib_wilaya}}</option>
                    @endforeach
                   </select>
                    
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="formule">
                        <span class="fa fa-globe"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Commune</h6>
                <div class="wrap-input100 validate-input2">
                    <select id="Commune" class="input100" type="text" name="Commune" placeholder="Commune">
                        <option value="160001">Commune</option>
                    </select>
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="formule">
                        <span class="fa fa-globe"></span>
                    </label>
                </div>
            </div>
            <div class="radio_section">
                <h6>A t-elle été construite ou vérifiée conforme aux règles parasismiques </h6>
                <label>
                    <input type="radio" name="seisme" value="oui" />
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="seisme" value="non" />
                    <span>Non</span>
                </label>
            </div>

            <div class="tarificateur">
                <h5>Montant à payer </h5>
                <div class="wrap-input100 validate-input2">
                    <input id="montant_calcul" class="input100" type="text" name="montant_calcul"  placeholder="Calcul du Montant en cours" value="{{$prime_total}} DA" >
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-file-text"></span>
                    </label>
                </div>
            </div>
            <div class="container-contact100-form-btn">
                <a href="{{ url()->previous() }}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent  
                </a>

                <input class="contact100-form-btn" type ="submit" id="calculer" name="calculer" value="calculer">  

                <a href="{{route('signin')}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
            <input type="hidden" name="type_formule" id="type_formule" value="{{$type_formule ?? ''}}">
            <input type="hidden" name="Contenant" id="Contenant" value="{{$Contenant ?? ''}}">
            <input type="hidden" name="equipement" id="equipement" value="{{$equipement ?? ''}}">
            <input type="hidden" name="marchandise" id="marchandise" value="{{$marchandise ?? ''}}">
            <input type="hidden" name="contenu" id="contenu" value="{{$contenu ?? ''}}">
            <input type="hidden" name="activite" id="activite" value="{{$activite ?? ''}}">
            <input type="hidden" name="registre" id="registre" value="{{$registre ?? ''}}">
            <input type="hidden" name="local" id="local" value="{{$local ?? ''}}">
            <input type="hidden" name="val_assur" id="val_assur" value="{{$val_assur ?? ''}}">
            <input type="hidden" name="permis" id="permis" value="{{$permis ?? ''}}">
            <input type="hidden" name="type_const" id="type_const" value="{{$permis ?? ''}}">
            <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
        </form>
    </div>
</div>
@endsection
@section('js')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
$(document).ready(function(){

 $('#Wilaya').change(function(){
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
     $('#Commune').html(result);
    //alert(value);
   
    }

   })
  }
 });


});
</script>
@endsection