@extends('default2')

@section('title')
    Paiement
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/select2/css/select2.min.css') }}" />
    <style>
        .image-clignote {
            background-size: cover;
            width: 120px;
            height: 120px;
            border-inline-start: initial;
            border-style: solid;
            border-color: #007481;

        }

        .text-center {
            text-align: center;
        }

        .g-recaptcha {
            display: inline-block;
        }

        .title-confirm {
            text-align: center;
            font-weight: 400;
            color: teal;
        }

        .popup-content {
            text-align: center;
            font-size: 16px;
        }

    </style>
@endsection

@section('content')
    <div class="splash-container2">

        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading"><img src="{{ asset('assets/img/logo_dark.svg') }}" alt="logo" width="300"
                    height="100" class="logo-img"></div>
            <div class="panel-body">

                <div class="menu-header">
                    @include('core.produit.inside-menu')
                </div>
                <div class="menu-titre">
                    <h2> Votre Paiement <i class="fa fa-shopping-cart" aria-hidden="true"></i></h2>
                </div>

                @if ($auto != '')
                    <div class='line'></div>


                    <table class='order-table'>
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('produit_assets/images/icons/auto_col.svg') }}"
                                        class='full-width-icon'></img>
                                </td>
                                <td>
                                    <br> <span class='thin product_title'>Automobile</span>
                                    <br> Resumé<br> <span class='thin small'> Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Nihil!<br><br></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class='price'>{{ number_format($prime_total, 2, ',', ' ') }} DA</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif

                @if ($mrh != '')
                    <div class='line'></div>


                    <table class='order-table'>
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('produit_assets/images/icons/hab_col.svg') }}"
                                        class='full-width-icon'></img>
                                </td>
                                <td>
                                    <br> <span class='thin product_title'>Multirisque Habitation</span>
                                    <br> Resumé<br> <span class='thin small'> Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Nihil!<br><br></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class='price'>{{ number_format($prime_total, 2, ',', ' ') }} DA</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif

                @if ($catnat != '')
                    <div class='line'></div>


                    <table class='order-table'>
                        <tbody>
                            <tr>
                                <td><img src="{{ asset('produit_assets/images/icons/cat_nat_col.svg') }}"
                                        class='full-width-icon'></img>
                                </td>
                                <td>
                                    <br> <span class='thin product_title'>Catastrophe Naturelle</span>
                                    <br> Resumé<br> <span class='thin small'> Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit. Nihil!<br><br></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class='price'>{{ number_format($prime_total, 2, ',', ' ') }} DA</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endif

                <div class='line'></div>


                <div class="action text-center">

                    <h3><span>1 - </span> Confirmer que vous êtes un être humain </h3>
                    <div class="text-center">
                        <div class="d-flex justify-content-center recaptcha">
                        <div class="cc-selector">
                            <div class="g-recaptcha" id="g-recaptcha" data-sitekey="6LdA5eMZAAAAABi5jq_MCXyQl-7hHGOEH-lHkSBd"></div>
                        </div>
                    </div>
                    </div>

                    <div class='line'></div>


                    <div class="radio_section_slice">
                        <h3><span>2 - </span> Séléctionner un moyen de paiement </h6>

                            <input type="image" name="type_paiment" value="CIB" id="CIB" onclick="test();" width="100"
                                height="100" src="{{ asset('assets/img/logo_satim.svg') }}" />

                           <!--<input type="image" name="type_paiment" value="POST" id="POST" onclick="test2();" width="85"
                                height="85" src="{{ asset('assets/img/logo_poste.svg') }}" />-->


                    </div>

                    <div class='line'></div>

                    <h3> <span>3 - </span> Acception des conditions générales</h3>

					</div>

                   <div class="condition">
                        <p>
             <table class="condition" id="condition" cellpadding="0" cellspacing="0" border="0" summary="">
							<tbody>
								<tr  style="font-size: 17px;">
								<td class="condition">
								<input name ="accepte" id="accepte" onclick="checkFunction()" type="checkbox"> J'accepte les </input>									</td>
						<td> </td>
						<td class="condition">
						<a id="conditions" class="agrement-link af_goLink" href="{{ asset('pdf/conditions_vente_en_ligne.pdf') }}" target="_blank">&nbsp conditions d’utilisation</a> </td>

							 </tr>
						  </tbody>
						</table>
                        </p>

                    </div>
                    <div class="bouton-blanc">
                        @if ($auto != '')
                            <button style="display:none;" id="payer" name="payer" onclick="window.location.href='{{ route('save_auto', $devis->id) }}'" class="bot-button"><img alt="Porto" height="30px" width="30px" src="{{ asset('images/logo-cib.svg') }}">&nbsp;&nbsp; Valider <i
                                    class="fa fa-arrow-circle-right"></i></button>
                        @endif
                        @if ($mrh != '')
                            <button style="display:none;" id="payer" name="payer" onclick="window.location.href='{{ route('save_mrh', $devis->id) }}'" class="bot-button"><img alt="Porto" height="30px" width="30px" src="{{ asset('images/logo-cib.svg') }}">&nbsp;&nbsp; Valider <i
                                    class="fa fa-arrow-circle-right"></i></button>
                        @endif
                        @if ($catnat != '')
                            <button style="display:none;" id="payer" name="payer" onclick="window.location.href='{{ route('save_catnat', $devis->id) }}'" class="bot-button"><img alt="Porto" height="30px" width="30px" src="{{ asset('images/logo-cib.svg') }}">&nbsp;&nbsp; Valider <i
                                    class="fa fa-arrow-circle-right"></i></button>
                        @endif
                    </div>
                    <div class='line'></div>
                    <div>
                        <p>
                            Pour plus d'informations, veuillez contacter les numéros suivants :
                            Service clients Alliance assurance : +213 23 46 31/23/33
                            Service clients SATIM : 3020
                        </p>
                    </div>
                </div>
                @if (session()->has('popup'))
                    <div class="modal" id="myModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Modal body text goes here.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
    </div>


    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-titleb title-confirm">Confirmation du paiement</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body popup-content">
                    <p>Votre commande à été enregistrée avec succée. Veuillez confirmer votre paiement</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-lg">Confirmer</button>
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>
    </div>




@endsection

@section('js')

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

 <script>
        function checkFunction(){

            var googleResponse = $('#g-recaptcha-response').val();
            if (!googleResponse) {
                alert("Merci de Confirmer que vous êtes un être humain")
                $('#accepte').prop('checked', false);
            } else {
                var isChecked = document.getElementById("accepte").checked ;
		        var x = document.getElementById("payer");
			  if (isChecked) {
				x.style.display = "block";
				  x.style.marginLeft = "auto";
				 x.style.marginRight = "auto";
			  } else {
				x.style.display = "none";
			  }
            }


		}

    </script>

    <script>
        $(document).ready(function() {
                    $('#myModal').modal(options);

        });

                function test() {
                    $("#POST").removeClass("image-clignote");
                    $("#CIB").addClass("image-clignote");
                }

                function test2() {
                    $("#CIB").removeClass("image-clignote");
                    $("#POST").addClass("image-clignote");
                }

    </script>
    @if (!empty(Session::get('error_code')) && Session::get('error_code') == 5)
        <script>
            $(function() {
                $('#myModal').modal('show');
            });
        </script>
    @endif

@endsection
