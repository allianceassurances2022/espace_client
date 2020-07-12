@extends('default_produit')
@section('tab_title')
    MRH
@endsection

@section('produit_url')
background-image: url({{asset('produit_assets/images/backgrounds/habitation.jpg')}});

@endsection
@section('head')
.full_w{
    display:block;
    width:100%;
}
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
        <form class="contact100-form " action="{{route('validation_devis_mrh')}}" method="post" >
        @csrf
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Validation Devis <span>1</span></h5>
            </div>
            
      
          
           <div class="slice">
                <h6>Date souscription</h6>

               <div class="wrap-input100 validate-input3">
                   <input id="date_s" class="input100" type="date" name="date_sous" value="{{$date_souscription}}" readonly required>

                   <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-calendar-o"></span>
                    </label>
                 
               </div>
           </div> 
           
             <div class="slice">
                <h6>Date d'effet</h6>

               <div class="wrap-input100 validate-input2">
                   <input class="input100" type="date" name="date_eff"  id="date_effet" onchange="dateplusunans()" required>

                   <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-calendar-o"></span>
                    </label>
                 
               </div>
           </div>

           <div class="slice">
                <h6>Date expiration</h6>

               <div class="wrap-input100 validate-input3">
                   <input class="input100" type="date" name="date_exp" id="date_expiration" readonly required>

                   <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-calendar-o"></span>
                    </label>

               </div>
           </div>
           
           <div class="slice">
                <h6>Adresse</h6>

               <div class="wrap-input100 validate-input2">
                    <input id="adresse" class="input100" type="text" name="adresse"  value="{{$adresse ?? ''}}" required>

                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-address-book-o"></span>
                    </label>

               </div>
           </div>

           <div class="slice">
                <h6>Wilaya</h6>

               <div class="wrap-input100 validate-input3">
                   <select id="Wilaya" class="input100" type="text" name="Wilaya" placeholder="Wilaya" required>
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
                <h6>Montant forfaitaire</h6>

               <div class="wrap-input100 validate-input2">
                   <input id="montant" class="input100" type="text" name="montant"  value="{{$montant}}" readonly required>
                   
                   <span class="focus-input100"></span>
                   <label class="label-input100" for="montant">
                       <span class="fa fa-home"></span>
                   </label>
               </div>
           </div>

           <div class="slice">
                <h6>Nombre de pieces</h6>

               <div class="wrap-input100 validate-input3">
                   <input id="montant" class="input100" type="number" name="nbr_piece"  value="{{$nbr_piece ?? ''}}" readonly required>

                   <span class="focus-input100"></span>
                   <label class="label-input100" for="pieces">
                       <span class="fa fa-bath"></span>
                   </label>

               </div>
           </div>
           
         
           <br>
           <div class="slice">
                <h6>Surface</h6>

               <div class="wrap-input100 validate-input2">
                   <input id="surface" class="input100" type="number" name="surface" required>

                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-bed"></span>
                    </label>
                   
               </div>
           </div>

           <div class="slice">
                <h6>Etage</h6>

               <div class="wrap-input100 validate-input3">
                   <input id="etage" class="input100" type="number" name="etage" required>

                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-building-o"></span>
                    </label>

               </div>
           </div>
          
           <div class="slice slice_third">
                <div class="radio_section_slice">
                 
                   <h6>Habitation</h6>
                     <label>
                       <input type="radio" name="hab"  value="individuelle" @if( (isset($habitation)) && $habitation  ==="individuelle")  checked @else disabled @endif/>
                       <span>Individuelle</span>
                   </label>
                   <label>
                       <input type="radio" name="hab"  value="collective" @if( (isset($habitation)) && $habitation  ==="collective") checked @else disabled @endif/>
                       <span>Collective</span>
                   </label>
               </div>
           </div>
            <div class="slice slice_third">
                <div class="radio_section_slice">
                    <h6>Qualité juredique</h6>
                    <label>
                        <input type="radio" name="juredique" value="proprietaire"  @if( (isset($juredique)) &&  $juredique ==="proprietaire") checked @else disabled @endif/>
                        <span>Propretaire</span>
                    </label>
                    <label>
                        <input type="radio" name="juredique" value="locataire" @if(  (isset($juredique)) &&   $juredique ==="locataire") checked @else disabled @endif/>
                        <span>locataire</span>
                    </label>
                </div>
            </div>
            
           <div class="slice slice_third">
              <div class="radio_section_slice">
                 <h6>Terrasse</h6>
               
               
                     <label>
                     <input type="radio" name="terasse" id="oui" value="oui" @if(  (isset($terasse)) &&   $terasse ==="oui") checked @else disabled @endif />
                     <span>Oui</span>
                     </label>
                     <label>
                     <input type="radio" name="terasse" id="non" value="non"  @if(  (isset($terasse)) &&   $terasse ==="non") checked @else disabled @endif />
                     <span>Non</span>
                     </label>
                 
             </div>
           </div>
            <div class="container-contact100-form-btn"> 
            <input class="contact100-form-btn" type ='submit' id="valider" nom="valider" value="valider">  
            <a href="{{ route('visuelisation') }}" class="contact100-form-btn"><i class="fa fa-arrow-circle-left"></i> Voir le Devis</a>
        	<a href="{{route('paiement')}}" class="contact100-form-btn"> Payer <i class="fa fa-arrow-circle-right"></i></a>
       
            </div>
        </form>
   
    </div>
</div>
@endsection



@section('js')

<script>

function dateplusunans() {

    var x = document.getElementById("date_effet");
    var dat=x.value;
    var a = dat.substring(0,4);
  var m = dat.substring(5,7);
  var d = dat.substring(8,10);
  var t = m+"-"+d+"-"+a;
    var act = new Date(t);
    var apr = new Date (act.setFullYear(act.getFullYear() + 1));
    var apj = apr.setDate(apr.getDate() - 1);
    //var final = apr.toLocaleDateString();
    var day = ('0' + apr.getDate()).slice(-2);
    var month = ('0' + (apr.getMonth() + 1)).slice(-2);
    var year = apr.getFullYear();
    var final = year+"-"+month+"-"+day;
    document.getElementById("date_expiration").value=final;
    }

</script>

@endsection