@extends('default_produit')
@section('nom_produit')
    MRH
@endsection
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
            <span> <img src="{{asset('produit_assets/images/icons/hab_white.svg')}}" alt=""> Multirisques Habitation</span>
        </div>
        <form class="contact100-form " action="{{route('montant_mrh')}}" method="post" >
        @csrf
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Informations situation du risque <span>1</span></h5>
            </div>
            
           <div class="slice">
                <h6>Montant forfetaire <span>(Champs Obligatoire)</span></h6>
               <div class="wrap-input100 validate-input">
                   <input id="montant" class="input100" type="text" name="montant" placeholder="Montant Forfetaire">
                   <span class="focus-input100"></span>
                   <label class="label-input100" for="montant">
                       <span class="fa fa-home"></span>
                   </label>
               </div>
           </div>

           <div class="slice">
                <h6>Nombre de pieces <span>(Champs Obligatoire)</span></h6>
               <div class="wrap-input100 validate-input">
                   <input id="pieces" class="input100" type="text" name="pieces" placeholder="Nombre de pieces">
                   <span class="focus-input100"></span>
                   <label class="label-input100" for="pieces">
                       <span class="fa fa-bed"></span>
                   </label>
               </div>
           </div>
           
           <div class="slice">
                <div class="radio_section_slice">
                   <h6>Habitation <br><span>(Choix Obligatoire)</span></h6>
                   <label>
                       <input type="radio" name="hab"  value="individuelle"/>
                       <span>Individuelle</span>
                   </label>
                   <label>
                       <input type="radio" name="hab"  value="collective"/>
                       <span>Collective</span>
                   </label>
               </div>
           </div>
            <div class="slice">
                <div class="radio_section_slice">
                    <h6>Qualité juredique <br><span>(Choix Obligatoire)</span></h6>
                    <label>
                        <input type="radio" name="juredique" value="proprietaire"/>
                        <span>Propretaire</span>
                    </label>
                    <label>
                        <input type="radio" name="juredique" value="locataire"/>
                        <span>locataire</span>
                    </label>
                </div>
            </div>
        
           
            <div class="radio_section">
                <h6>Terrasse <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="terasse" id="oui" value="oui"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="terasse" id="non" value="non"/>
                    <span>Non</span>
                </label>
            </div>

            <div class="tarificateur">
                <h5>Montant à payer </h5>
                <div class="wrap-input100 validate-input">
                    <input id="montant_calcul" class="input100" type="text" name="montant_calcul"  placeholder="Calcul du Montant en cours" >
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-file-text"></span>
                    </label>
                </div>
            </div>
            <div class="container-contact100-form-btn">
            <input class="contact100-form-btn" type ='submit' id="calculer" nom="calculer" value="calculer" >  
            <!--    <a href="{{route('montant_mrh')}}" class="contact100-form-btn">
                
                </a>-->
                <a href="{{route('signin')}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
<!--@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){

 $("#calculer").change(function(){
  if($(this).val() != '')
  {
    
 var habitation = document.getElementById("habitation").value;
 var terrasse = $(this).val();
   var montant=  document.getElementById("montant").value;
 var juredique= document.getElementById("juredique").value;
   var nbr_piece= document.getElementById("nbr_piece").value;

 
   alert('La première zone a été mise à jour');
   $.ajax({
   
   
    url:"{{ route('montant_mrh') }}",
    method:"post",
    data:{habitation:habitation, terrasse:terrasse, montant:montant, juredique:juredique, nbr_piece:nbr_piece,_token:'{{csrf_token()}}'},
    success:function(result)
    {
     $('#montant_calcul').html(result);
   
   
    },
error:function(){
    alert("désolé aucun résuktat trouvé");
}

    

   })
  }
 });

 
 

});
</script>
@endsection-->