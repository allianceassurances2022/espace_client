@extends('default')

@section('title')
    Devis Automobile
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/select2/css/select2.min.css')}}"/>
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Devis Automobile</div>
                <div class="panel-body">
                    <div class="col-md-12 fuelux">

                        <form action="{{route('validation_devis_auto')}}" method="post"
                              class="form-horizontal group-border-dashed">
                            @csrf

                            <div class="panel-heading panel-heading-divider">
                                <div class="icon-container">
                                    <div class="icon"><span class="mdi mdi-collection-item-1"></span></div>
                                    <span class="icon-class">Information Assuré</span>
                                </div>
                            </div>

                            <div class="form-group">


                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="name" name="name" class="form-control"
                                               value="{{auth()->user()->name}}" readonly autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Prénom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="prenom" id="prenom" class="form-control"
                                               value="{{auth()->user()->prenom}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Date de naissance</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" type="text" name="date_naissance"
                                               id="date_naissance" value="{{auth()->user()->date_naissance}}" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Wilaya</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="wilaya_assure"
                                               value="{{ $user_wilaya->nlib_wilaya }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Commune</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="commune_assure"
                                               value="{{$user_commune->lib_commune}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Adresse</label>
                                    <div class="col-sm-9">
                                        <input id="adresse" type="text" name="adresse" class="form-control"
                                               value="{{auth()->user()->adresse}}" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">


                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Sexe</label>
                                    <div class="col-sm-9">
                                        <div class="be-radio-icon inline">
                                            <input type="radio" @if(auth()->user()->sexe == 'Femme') checked
                                                   @endif name="sexe" value="Femme" id="rad1" disabled>
                                            <label for="rad1"><span class="mdi mdi-female"></span></label>
                                        </div>
                                        <div class="be-radio-icon inline">
                                            <input type="radio" @if(auth()->user()->sexe == 'Homme') checked
                                                   @endif name="sexe" value="Homme" id="rad2" disabled>
                                            <label for="rad2"><span class="mdi mdi-male-alt"></span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Profession</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="commune_assure"
                                               value="{{auth()->user()->profession}}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Telephone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="telephone" value="{{auth()->user()->telephone}}"
                                               id="telephone" class="form-control" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="panel-heading panel-heading-divider">
                                <div class="icon-container">
                                    <div class="icon"><span class="mdi mdi-collection-item-2"></span></div>
                                    <span class="icon-class">Veuillez compléter les informations du risque ci-dessous</span>
                                </div>
                            </div>


                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Date souscription</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date_sous" value="{{$date_souscription}}"
                                               class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Date de naissance assuré/conducteur</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date_conducteur" value="{{$date_conducteur}}"
                                               class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Date d'obtention du permis</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="date_permis" value="{{$date_permis}}"
                                               class="form-control" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Immatriculé à</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="wilaya" value="{{$wilaya_selected}}"
                                               class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Année de mise en circulation</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="annee_auto" value="{{$annee_auto}}"
                                               class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Puissance</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="puissance" value="{{$puissance->libelle}}" class="form-control"
                                               readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Usage</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="usage" value="{{$usage}}" class="form-control"
                                               readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Durée</label>
                                    <div class="col-sm-9">
                                        <!--input type="text" name="dure" value="{{$dure.'année'}}" class="form-control" readonly-->
                                        <input type="text" name="dure"

                                               @if($dure == '1')
                                               value="{{' 1 année'}}"
                                               @endif

                                               @if($dure == '2')
                                               value="{{'6 mois'}}"
                                               @endif

                                               class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Formule</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="formule" value="{{$formule}}" class="form-control"
                                               readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Assistance</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="assistance" value="{{$assistance_nom}}"
                                               class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Taxe pollution</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="taxe" value="{{$taxe}}" class="form-control" readonly>
                                    </div>
                                </div>

                                @if($taxe == "oui")
                                    <div class="col-md-4">
                                        <label class="col-sm-3 control-label">Date effet de la taxe</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="date_taxe" value="{{$date_taxe}}"
                                                   class="form-control" readonly>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Type d'assurance</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="offre" value="{{$offre}}" class="form-control"
                                               readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Valeur estimée du vehicule</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="valeur" name="valeur_estime" value="{{number_format($valeur, 2,',', ' ')}} DA"" class="form-control valeur"
                                               readonly>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Date d'effet</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="date_effet" name="date_eff" value="{{Session::get('date_eff') ?? ''}}"
                                               class="form-control" min="" onchange="dateplusunans()" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Date expiration</label>
                                    <div class="col-sm-9">
                                        <input type="date" id="date_expiration" name="date_exp"
                                               value="{{Session::get('date_exp') ?? ''}}" class="form-control" readonly>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Matricule</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="matricule" name="matricule" value="{{Session::get('matricule') ?? ''}}"
                                               class="form-control"  required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">N° Chassis</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="num_chassis" name="num_chassis" value="{{Session::get('num_chassis') ?? ''}}"
                                               class="form-control" maxlength="17" required>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="type" value="{{Session::get('type') ?? ''}}" class="form-control"
                                               required>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Marque</label>
                                    <div class="col-sm-9">
                                        <select name="marque" id="marque" class="form-control select2" required >
                                            <option value="{{ session('marque') }}">{{ session('marque') }}</option>
                                            @foreach( $marques as $marque)
                                                <option  value="{{ $marque->lib_marque }}" @if($marque->lib_marque == $marque_selected) selected @endif>{{ $marque->lib_marque }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="model" value="{{Session::get('model') ?? ''}}" class="form-control"
                                               required>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Couleur</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="couleur" value="{{Session::get('couleur') ?? ''}}"
                                               class="form-control" required>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Permis N°</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="permis_num" value="{{Session::get('permis_num') ?? ''}}"
                                               class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Catégorie</label>
                                    <div class="col-sm-9">
                                        <!--input type="text" name="categorie" value="{{$categorie ?? ''}}"
                                               class="form-control" required-->
                                            <select  name="categorie" id="categorie" class="form-control select2" required >
                                                <option value="{{ session('categorie') }}">{{ session('categorie') }}</option>
                                                @foreach($categorie as $cat)
                                                    <option  value="{{ $cat->libelle }}" @if($cat->libelle == $categorie) selected @endif>{{ $cat->libelle  }}</option>
                                                @endforeach
                                            </select>


                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Délivré à</label>
                                    <div class="col-sm-9">

                                        <select  name="wilaya_obtention" id="wilaya_obtention" class="form-control select2" required >
                                            <option value="{{ session('wilaya_obtention') }}">{{ session('wilaya_obtention') }}</option>
                                            @foreach($wilaya as $wilay)
                                                <option  value="{{$wilay->nlib_wilaya}}" >{{$wilay->nlib_wilaya}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="panel-heading panel-heading-divider">
                                <div class="icon-container">
                                    <div class="icon"><span class="mdi mdi-collection-item-3"></span></div>
                                    <span class="icon-class">Veuillez choisir une agence la plus proche</span>
                                </div>
                            </div>

                            <p class="text-center" id="agence_selected" style="font-size: 20px;">@if($agence_map)
                                    Agence : {{$agence_map->Name}}  {{$agence_map->Adresse}} @endif</p>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Wilaya</label>
                                    <div class="col-sm-9">
                                        <select onchange="vers_wilaya()" id="Wilaya_map" name="Wilaya_map"
                                                class="select2">
                                            @foreach($wilaya as $wilay)
                                                <option value="{{$wilay->code_wilaya}}">{{$wilay->nlib_wilaya}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="col-sm-3 control-label">Commune</label>
                                    <div class="col-sm-9">
                                        <select onchange="vers_commune()" id="Commune_map" name="Commune_map"
                                                class="select2">
                                            <option value="">-</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-md-12" style="padding-top: 15px;">
                                    <div id="map-container-google-1" class="z-depth-1-half map-container"
                                         style="height: 500px">
                                        <iframe src="https://maps.google.com/maps?q=cheraga&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                                frameborder="0"
                                                style="border: 0;width: -webkit-fill-available;height: inherit;"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <p class="text-center">
                                        <a href="{{route('home')}}" class="btn btn-default btn-space btn-lg">Annuler</a>
                                        <button type="submit" id="btn_validate"
                                                class="btn btn-primary btn-space btn-lg">Valider
                                        </button>
                                    </p>
                                </div>
                            </div>

                            {{-- <input type="hidden" name="montant" value="{{$montant}}"> --}}
                            <input type="hidden" name="prime_total" value="{{$prime_total}}">
                            <input type="hidden" name="id" value="{{$id ?? ''}}">
                            <input type="hidden" name="valeur" value="{{$valeur ?? ''}}">
                            <input type="hidden" id="code_agence" name="code_agence" value="{{$code_agence ?? ''}}"
                                   required>
                            <input type="hidden" id="signup-token" name="_token" value="{{csrf_token()}}">

                        </form>


                        <div class="form-group">
                            <h3 class="col-sm-9 text-right">Total a payer :</h3>
                            <div class="col-sm-3">
                                <input type="text" name="prime_total_"
                                       value="{{number_format($prime_total, 2,',', ' ')}} DA" class="form-control"
                                       readonly style="border-radius: 20px;border-color: #007481;text-align: right;">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')


    <script src="{{asset('assets/lib/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/jquery.nestable/jquery.nestable.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/moment.js/min/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/lib/select2/js/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/bootstrap-slider/js/bootstrap-slider.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/app-form-elements.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/lib/jquery.maskedinput/jquery.maskedinput.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/app-form-masks.js')}}" type="text/javascript"></script>

    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVBmJKrz6WzPT7HVLaGhC2hJA5V-rkwaA&sensor=false"></script>



    <script>

    $(document).ready(function () {


        //Limite de la date de naissance du conducteur

            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#date_effet').attr('min', maxDate);

            //Format du champ matricule

           $('#matricule').mask("99999 - 999 - 99", {placeholder:"xxxxx - xxx - xx"});

            // Format valeur vehicul
            $('#valeur').value().mask('000,000,000,000,000.00', {reverse: true});

            // Format num châchi.
            $('#num_chassis').mask("xxx xxxxxx xxxxxxx", {placeholder:"xxx xxxxxx xxxxxxx"});

        });



        function dateplusunans() {

            var x = document.getElementById("date_effet");
            var dat = x.value;
            //alert(dat);
            var a = dat.substring(0, 4);
            var m = dat.substring(5, 7);
            var d = dat.substring(8, 10);
            var t = m + "-" + d + "-" + a;
            var act = new Date(t);
            var apr = new Date(act.setFullYear(act.getFullYear() + 1));
            var apj = apr.setDate(apr.getDate() - 1);
            //var final = apr.toLocaleDateString();
            var day = ('0' + apr.getDate()).slice(-2);
            var month = ('0' + (apr.getMonth() + 1)).slice(-2);
            var year = apr.getFullYear();
            var final = year + "-" + month + "-" + day;
            document.getElementById("date_expiration").value = final;


        }
    </script>

    <script>
        function vers_wilaya() {

            var nom = $('#Wilaya_map').children("option:selected").text();


            var geocoder = new google.maps.Geocoder();


            geocoder.geocode({
                'address': nom + ', algerie'
            }, function (results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

            map.setZoom(10);


        }

        function vers_commune() {

            var nom = $('#Wilaya_map').children("option:selected").text();
            var nom_com = $('#Commune_map').children("option:selected").text();

            var geocoder = new google.maps.Geocoder();


            geocoder.geocode({
                'address': nom_com + ', ' + nom + ', algerie'
            }, function (results, status) {
                if (status === 'OK') {
                    map.setCenter(results[0].geometry.location);
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

            map.setZoom(14);


        }


        function initialize() {


            var mapOptions = {
                center: new google.maps.LatLng(35.522973, 3.520701),
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
            }
            map = new google.maps.Map(document.getElementById("map-container-google-1"), mapOptions);
            var image = '{{asset('images/point.png')}}';
            var image_selected = '{{asset('images/point_selected.png')}}';

                    @foreach($agences as $agence)

            var myLatlng = new google.maps.LatLng({{$agence->Latitude}},{{$agence->Longetude}});
            var contentString = '<div id="etiquette" style="width:auto; height:auto;">' +
                '<h2 style="color:#048c9b;">{{$agence->Name}}</h2>' +
                '<div>' +
                '<p>' +
                '<strong>Chef d\'agence :</strong> {{$agence->Chef_Agence}}<br/>' +
                '<strong>Adresse :</strong> {{$agence->Adresse}}<br/>' +
                '<strong>Tel :</strong> {{$agence->Tel}}<br/>' +
                '<strong>Fax :</strong> {{$agence->Fax}}<br/>' +
                '<strong>Mail :</strong> {{$agence->Mail}} <br/>' +
                '</p>' +
                '</div>' +
                '</div>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString,
            });

            var marker = new google.maps.Marker({
                position: myLatlng,
                icon: image,
                title: "{{$agence->Chef_Agence}}",
                code_agence: "{{$agence->id}}",
                adresse: "{{$agence->Adresse}}",
                html: contentString
            });

            //     google.maps.event.addListener(map,'click', function () {
            //     infowindow.close(map);
            //
            //     //Change the marker icon
            //     this.setIcon('https://www.google.com/mapfiles/marker_black.png');
            //     });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(this.html);
                infowindow.open(map, this);
                this.setIcon(image_selected);
                $(code_agence).val(this.code_agence);
                $(agence_selected).text("Agence: " + this.code_agence + "  " + this.adresse);
                active_button();
            });

            // To add the marker to the map, call setMap();
            marker.setMap(map);

            @endforeach

        }
    </script>

@endsection

@section('docready')



    App.formElements();
    App.masks();

    var map;

    initialize();

    $('#Wilaya_map').change(function(){


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
    $('#Commune_map').html(result);
    //alert(value);

    }

    })
    }
    });

    (function() {
    $('.valeur').mask('# ##0,00', {reverse: true});
    });
@endsection
