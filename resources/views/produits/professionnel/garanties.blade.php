@extends('default_produit')
@section('nom_produit')
    Professionnel
@endsection
@section('tab_title')
    Professionnel
@endsection
@section('produit_url')
background-image: url({{asset('produit_assets/images/backgrounds/entreprise.jpg')}});
@endsection
@section('content')
<div class="container-contact100">
    <div class="wrap-contact100">
        <button class="btn-hide-contact100">
            <i class="zmdi zmdi-close"></i>
        </button>

        <div class="contact100-form-title" style="@yield('produit_url')">
            <span><img src="{{asset('produit_assets/images/icons/pro_white.svg')}}" alt=""> Professionnel</span>
        </div>
        <form class="contact100-form validate-form">
            <div class="intro">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id officiis itaque, eveniet veniam labore in voluptatum quidem alias.
            </div>
            
            

            <div class="tite_container">
                <h5 class="active"><i class="fa fa-info-circle"></i> Garanties<span>2</span></h5>
            </div>

            <div class="radio_section_slice">
                <h6>Limite de garantie vol <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>25%</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>50%</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>100%</span>
                </label>
            </div>
            <div class="radio_section_slice">
                <h6>Limite garantie (DDE) <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>25%</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>50%</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>100%</span>
                </label>
            </div>

            
            <div class="radio_section_slice">
                <h6>Intoxication alimentaire <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Non</span>
                </label>
            </div>
            <div class="radio_section_slice">
                <h6>Terrasse <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Non</span>
                </label>
            </div>
            <div class="radio_section_slice">
                <h6>Dommages électriques <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Non</span>
                </label>
            </div>
            <div class="radio_section_slice">
                <h6>Sous-sol <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Non</span>
                </label>
            </div>
            <div class="radio_section_slice">
                <h6>Pertes indirectes <br><span>(Choix Obligatoire)</span></h6>
                <label>
                    <input type="radio" name="radio2"/>
                    <span>Oui</span>
                </label>
                <label>
                    <input type="radio" name="radio2"/>
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
                <a href="{{ url()->previous() }}" class="contact100-form-btn">
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> precedent  
                </a>
                <a href="" class="contact100-form-btn">
                     Calculer  
                </a>
                <a href="{{route('signin')}}" class="contact100-form-btn">
                     Suivant <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
                </a>
            </div>
        </form>
    </div>
</div>
@endsection