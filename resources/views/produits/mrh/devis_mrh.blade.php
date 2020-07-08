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
        <form class="contact100-form " action="#" method="post" >
        @csrf
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Validation Devis <span>1</span></h5>
            </div>
            
      
          
           <div class="slice">
                <h6>Date souscription</h6>

               <div class="wrap-input100 validate-input3">
                   <input id="date_s" class="input100" type="date" name="date" value="{{ session() }}">
                 
               </div>
           </div> 
           
             <div class="slice">
                <h6>Date d'effet</h6>

               <div class="wrap-input100 validate-input2">
                   <input id="date_e" class="input100" type="date" name="date_e"  >
                 
               </div>
           </div>

           <div class="slice">
                <h6>Date expiration</h6>

               <div class="wrap-input100 validate-input3">
                   <input id="date_v" class="input100" type="date" name="date_v" >

               </div>
           </div>
           
           <div class="slice">
            <h6>Adress</h6>

            <div class="wrap-input100 validate-input2">
             <input id="adresse" class="input100" type="text" name="adresse"  value="{{$adresse ?? ''}}">

           </div>
         </div>

           <div class="slice">
                <h6>Wilaya</h6>

               <div class="wrap-input100 validate-input3">
                   <input id="wilaya" class="input100" type="text" name="wilaya"  value="{{$wilaya ?? ''}}">

               </div>
           </div>
           <div class="slice">
                <h6>Montant forfetaire</h6>

               <div class="wrap-input100 validate-input2">
                   <input id="montant" class="input100" type="number" name="montant"  value="{{$montant ?? ''}}">
                 
               </div>
           </div>

           <div class="slice">
                <h6>Nombre de pieces</h6>

               <div class="wrap-input100 validate-input3">
                   <input id="montant" class="input100" type="number" name="nbr_piece"  value="{{$nbr_piece ?? ''}}">

               </div>
           </div>
           
         
           <br>
           <div class="slice">
                <h6>Surface</h6>

               <div class="wrap-input100 validate-input2">
                   <input id="surface" class="input100" type="number" name="surface"  value="{{$surface ?? ''}}">
                   
               </div>
           </div>

           <div class="slice">
                <h6>Etage</h6>

               <div class="wrap-input100 validate-input3">
                   <input id="etage" class="input100" type="number" name="etage"  value="{{$etage ?? ''}}">

               </div>
           </div>

           <div class="slice slice_third">
                <div class="radio_section_slice">
                 
                   <h6>Habitation</h6>
                     <label>
                       <input type="radio" name="hab"  value="individuelle" @if( (isset($habitation)) && $habitation  ==="individuelle")  checked @endif/>
                       <span>Individuelle</span>
                   </label>
                   <label>
                       <input type="radio" name="hab"  value="collective" @if( (isset($habitation)) && $habitation  ==="collective") checked @endif/>
                       <span>Collective</span>
                   </label>
               </div>
           </div>
            <div class="slice slice_third">
                <div class="radio_section_slice">
                    <h6>Qualité juredique</h6>
                    <label>
                        <input type="radio" name="juredique" value="proprietaire"  @if( (isset($juredique)) &&  $juredique ==="proprietaire") checked @endif/>
                        <span>Propretaire</span>
                    </label>
                    <label>
                        <input type="radio" name="juredique" value="locataire" @if(  (isset($juredique)) &&   $juredique ==="locataire") checked @endif/>
                        <span>locataire</span>
                    </label>
                </div>
            </div>
            
           <div class="slice slice_third">
              <div class="radio_section_slice">
                 <h6>Terrasse</h6>
               
               
                     <label>
                     <input type="radio" name="terasse" id="oui" value="oui" @if(  (isset($terasse)) &&   $terasse ==="oui") checked @endif />
                     <span>Oui</span>
                     </label>
                     <label>
                     <input type="radio" name="terasse" id="non" value="non"  @if(  (isset($terasse)) &&   $terasse ==="non") checked @endif />
                     <span>Non</span>
                     </label>
                 
             </div>
           </div>
            <div class="container-contact100-form-btn">
            <input class="contact100-form-btn" type ='submit' id="valider" nom="valider" value="valider">  

            </div>
        </form>
    </div>
</div>
@endsection

