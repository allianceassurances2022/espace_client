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
        <form class="contact100-form validate-form">
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Informations situation du risque <span>1</span></h5>
            </div>
           <div class="slice">
                <div class="radio_section_slice">
                   <h6>Habitation <br><span>(Choix Obligatoire)</span></h6>
                   <label>
                       <input type="radio" name="habitation"/>
                       <span>Individuelle</span>
                   </label>
                   <label>
                       <input type="radio" name="habitation"/>
                       <span>Collective</span>
                   </label>
               </div>
           </div>
            <div class="slice">
                <div class="radio_section_slice">
                    <h6>Qualité juredique <br><span>(Choix Obligatoire)</span></h6>
                    <label>
                        <input type="radio" name="qualite"/>
                        <span>Propretaire</span>
                    </label>
                    <label>
                        <input type="radio" name="qualite"/>
                        <span>locataire</span>
                    </label>
                </div>
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
           
            <div class="radio_section">
                <h6>Terrasse <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio3"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio3"/>
                    <span>Non</span>
                </label>
            </div>

            <div class="tarificateur">
                <h5>Montant à payer </h5>
                <div class="wrap-input100 validate-input">
                    <input id="phone" class="input100" type="text" name="phone" placeholder="Calcul du Montant en cours" disabled="">
                    <span class="focus-input100"></span>
                    <label class="label-input100" for="phone">
                        <span class="fa fa-file-text"></span>
                    </label>
                </div>
            </div>
            <div class="container-contact100-form-btn">
                <a href="{{route('pannier')}}" class="contact100-form-btn">
                     Calculer  
                </a>
                <a href="{{route('pannier')}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
        </form>
    </div>
</div>
@endsection