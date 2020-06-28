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
                <h6>Superficie <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="Superficie" class="input100" type="text" name="Superficie" placeholder="Superficie">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Année de construction <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                    <input id="anne_cont" class="input100" type="text" name="anne_cont" placeholder="Année de construction">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Wilaya <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
                   <select id="Wilaya" class="input100" type="text" name="Wilaya" placeholder="Wilaya">
                    @foreach($wilaya as $wilaya)
                        <option value="{{$wilaya->code_wilaya}}">{{$wilaya->nlib_wilaya}}</option>
                        @endforeach
                    </select>
                    
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="formule">
                        <span class="fa fa-globe"></span>
                    </label>
                </div>
            </div>
            <div class="slice">
                <h6>Commune <span>(Champs Obligatoire)</span></h6>
                <div class="wrap-input100 validate-input">
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
                <h6>A t-elle été construite ou vérifiée conforme aux règles parasismiques <br><span>(Choix Obligatoire)</span></h6>
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
               
            </div>

            <div class="container-contact100-form-btn">
                <a href="{{ url()->previous() }}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent  
                </a>
                <input class="contact100-form-btn" type ='submit' id="calculer" nom="calculer" value="calculer" >  

                <a href="{{route('signin')}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
            <input type="hidden" nom="type_formule" id="type_formule" value="{{$type_formule ?? ''}}">
            <input type="hidden" nom="Contenant" id="Contenant" value="{{$Contenant ?? ''}}">
            <input type="hidden" nom="equipement" id="equipement" value="{{$equipement ?? ''}}">
            <input type="hidden" nom="marchandise" id="marchandise" value="{{$marchandise ?? ''}}">
            <input type="hidden" nom="contenu" id="contenu" value="{{$contenu ?? ''}}">
            <input type="hidden" nom="activite" id="activite" value="{{$activite ?? ''}}">
            <input type="hidden" nom="registre" id="registre" value="{{$registre ?? ''}}">
            <input type="hidden" nom="local" id="local" value="{{$local ?? ''}}">
            <input type="hidden" nom="val_assur" id="val_assur" value="{{$val_assur ?? ''}}">
            <input type="hidden" nom="permis" id="permis" value="{{$permis ?? ''}}">
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
 
   var _token = $('input[name="_token"]').val();
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