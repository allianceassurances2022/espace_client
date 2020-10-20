@extends('default')

@section('title')
Devis CATNAT
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('assets/lib/select2/css/select2.min.css')}}" />
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">Devis Catastrophe Naturelle</div>
            <div class="panel-body">



                                    <form action="{{route('validation_devis_catnat')}}" method="post" class="form-horizontal group-border-dashed">
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
                                                        <input type="text" id="name" name="name" class="form-control" value="{{auth()->user()->name}}" readonly autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Prénom</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="prenom" id="prenom" class="form-control" value="{{auth()->user()->prenom}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Date de naissance</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" type="text" name="date_naissance" id="date_naissance" value="{{auth()->user()->date_naissance}}" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Wilaya</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="wilaya_assure" value="{{auth()->user()->wilaya}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Commune</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="commune_assure" value="{{auth()->user()->commune}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Adresse</label>
                                                    <div class="col-sm-9">
                                                        <input id="adresse" type="text" name="adresse" class="form-control" value="{{auth()->user()->adresse}}" readonly>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-group">


                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Sexe</label>
                                                    <div class="col-sm-9">
                                                        <div class="be-radio-icon inline">
                                                            <input type="radio" @if(auth()->user()->sexe == 'Femme') checked @endif name="sexe" value="Femme" id="rad1" disabled>
                                                            <label for="rad1"><span class="mdi mdi-female"></span></label>
                                                        </div>
                                                        <div class="be-radio-icon inline">
                                                            <input type="radio" @if(auth()->user()->sexe == 'Homme') checked @endif name="sexe" value="Homme" id="rad2" disabled>
                                                            <label for="rad2"><span class="mdi mdi-male-alt"></span></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Profession</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="commune_assure" value="{{auth()->user()->profession}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Telephone</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="telephone" value="{{auth()->user()->telephone}}" id="telephone" class="form-control" readonly>
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
                                                    <label class="col-sm-3 control-label">Formule</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="formule" value="{{$type_formule}} " class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Wilaya</label>
                                                    <div class="col-sm-9">
                                                      <select name="wilaya" class="form-control" readonly>
                                                          <option value="{{$wilaya_selected->code_wilaya}}">{{$wilaya_selected->nlib_wilaya}}</option>
                                                      </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Commune</label>
                                                    <div class="col-sm-9">
                                                      <select name="commune" class="form-control" readonly>
                                                          <option value="{{$commune_selected->code_commune}}">{{$commune_selected->lib_commune}}</option>
                                                      </select>
                                                    </div>
                                                </div>



                                            </div>

                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Surface</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="surface" value="{{$surface}}" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Année de construction</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="anne_cont" value="{{$anne_cont}}" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Construite ou vérifiée conforme aux règles parasismiques</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="reg_para" value="{{$reg_para}}" class="form-control" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            @if($type_formule == "Habitation")

                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Type de la construction</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="type_const" value="{{$type_const}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Valeur assurée</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="val_assur" value="{{$val_assur}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Permis de construire</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="permis" value="{{$permis}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                            </div>

                                            @endif

                                            @if($type_formule == "Commerce" || $type_formule == "Industrielle")
                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Type de la construction</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="type_const" value="{{$type_const}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Valeur Contenant</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="contenant" value="{{$Contenant}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Valeur equipement</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="equipement" value="{{$equipement}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>



                                            </div>


                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Valeur marchandise</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="marchandise" value="{{$marchandise}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Valeur contenu</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="contenu" value="{{$contenu}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Inscrite au registre de commerce</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="act_reg" value="{{$act_reg}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Disposez-vous d’un registre de commerce</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="reg_com" value="{{$reg_com}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Local est-il assuré</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="loca" value="{{$loca}}" class="form-control" readonly="readonly">
                                                    </div>
                                                </div>

                                            </div>

                                            @endif

                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Date souscription</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="date_sous" value="{{$date_souscription}}" class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Date d'effet</label>
                                                    <div class="col-sm-9">
                                                          <input type="date" id="date_effet" name="date_eff" value="{{$date_eff ?? ''}}" class="form-control" min="" onchange="dateplusunans()" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Date expiration</label>
                                                    <div class="col-sm-9">
                                                          <input type="date" id="date_expiration" name="date_exp" value="{{$date_exp ?? ''}}" class="form-control" readonly>
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Vous appartient-t-elle ? </label>
                                                    <div class="col-sm-9">
                                                      <div class="switch-button switch-button-yesno">
                                                        <input type="checkbox" @if($appartient == "oui") checked @endif name="appartient" id="swt8"><span>
                                                          <label for="swt8"></label></span>
                                                      </div>
                                                        {{-- <select id="appartient" name="appartient" class="select2">
                                                            <option value="oui" @if($appartient == "oui") selected @endif>OUI</option>
                                                                <option value="non" @if($appartient == "non") selected @endif>NON</option>
                                                        </select> --}}
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="panel-heading panel-heading-divider">
                                              <div class="icon-container">
                                                 <div class="icon"><span class="mdi mdi-collection-item-3"></span></div>
                                                 <span class="icon-class">Veuillez choisir une agence la plus proche</span>
                                               </div>
                                             </div>

                                                <p class="text-center" id="agence_selected" style="font-size: 20px;">@if($agence_map)  Agence : {{$agence_map->Name}}  {{$agence_map->Adresse}} @endif</p>

                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Wilaya</label>
                                                    <div class="col-sm-9">
                                                        <select onchange="vers_wilaya()" id="Wilaya_map" name="Wilaya_map" class="select2">
                                                            @foreach($wilaya as $wilay)
                                                            <option value="{{$wilay->code_wilaya}}">{{$wilay->nlib_wilaya}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="col-sm-3 control-label">Commune</label>
                                                    <div class="col-sm-9">
                                                        <select onchange="vers_commune()" id="Commune_map" name="Commune_map" class="select2">
                                                            <option value="">-</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="col-md-12" style="padding-top: 15px;">
                                                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                                                        <iframe src="https://maps.google.com/maps?q=cheraga&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border: 0;width: -webkit-fill-available;height: inherit;"
                                                          allowfullscreen></iframe>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p class="text-center">
                                                        <a href="{{route('home')}}" class="btn btn-default btn-space btn-lg">Annuler</a>
                                                        <button type="submit" id="btn_validate" class="btn btn-primary btn-space btn-lg">Valider</button>
                                                    </p>
                                                </div>
                                            </div>

                                        <input type="hidden" name="prime_total" value="{{$prime_total}}">
                                        <input type="hidden" name="id" value="{{$id ?? ''}}">
                                        <input type="hidden" id="code_agence" name="code_agence" value="{{$code_agence ?? ''}}">
                                        <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">

                                    </form>

                            <div class="form-group">
                                <h3 class="col-sm-9 text-right">Total a payer :</h3>
                                <div class="col-sm-3">
                                    <input type="text" name="prime_total_" value="{{number_format($prime_total, 2,',', ' ')}} DA" class="form-control" readonly style="border-radius: 20px;border-color: #007481;text-align: right;">
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
<script src="{{asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/lib/select2/js/select2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/lib/bootstrap-slider/js/bootstrap-slider.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/app-form-elements.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/lib/jquery.maskedinput/jquery.maskedinput.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/app-form-masks.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/lib/fuelux/js/wizard.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/app-form-wizard.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVBmJKrz6WzPT7HVLaGhC2hJA5V-rkwaA&sensor=false"></script>


<script>

$(function(){
  var dtToday = new Date();

  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();

  if(month < 10)
      month = '0' + month.toString();
  if(day < 10)
      day = '0' + day.toString();

  var maxDate = year + '-' + month + '-' + day;
  $('#date_effet').attr('min', maxDate);

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
        }, function(results, status) {
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
        }, function(results, status) {
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
        // });

        google.maps.event.addListener(marker, 'click', function() {
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
App.wizard();

var map;

initialize();

//$('#wilaya').select2("readonly", true);

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
@endsection
