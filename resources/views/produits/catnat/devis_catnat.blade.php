@extends('default')

@section('title')
Devis MRH
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('assets/lib/select2/css/select2.min.css')}}"/>
@endsection


@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default panel-border-color panel-border-color-primary">
      <div class="panel-heading panel-heading-divider">Devis Catastrophe Naturelle<span class="panel-subtitle">Veuillez compléter vos informations pour établire votre devis</span></div>
      <div class="panel-body">
        <form action="{{route('validation_devis_catnat')}}" method="post" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
          @csrf

          <div class="form-group">

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Date souscription</label>
              <div class="col-sm-6">
                <input type="text" data-mask="date" placeholder="DD/MM/YYYY" name="date_sous" value="{{$date_souscription}}" class="form-control input-lg" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Date d'effet</label>
              <div class="col-sm-6">
                <input type="text" data-mask="date" placeholder="DD/MM/YYYY" id="date_effet" name="date_eff" value="{{$date_eff ?? ''}}" class="form-control input-lg" onchange="dateplusunans()">
              </div>
            </div>

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Date expiration</label>
              <div class="col-sm-6">
                <input type="text" data-mask="date" placeholder="DD/MM/YYYY" id="date_expiration" name="date_exp" value="{{$date_exp ?? ''}}" class="form-control input-lg" readonly>
              </div>
            </div>

          </div>

          <div class="form-group">


            <div class="col-md-4">
              <label class="col-sm-3 control-label">Formule</label>
              <div class="col-sm-6">
                <input type="text" name="montant_" value="{{$type_formule}} " class="form-control input-lg" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Type de la construction</label>
              <div class="col-sm-6">
                <input type="text" name="type_const" value="{{$type_const}}" class="form-control input-lg" readonly>
              </div>
            </div>

          </div>

          <div class="form-group">

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Valeur assurée</label>
              <div class="col-sm-6">
                <input type="number" name="val_assur" value="{{$val_assur}}" class="form-control input-lg" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Surface</label>
              <div class="col-sm-6">
                <input type="number" name="surface" value="{{$surface}}" class="form-control input-lg" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <label class="col-sm-3 control-label">Année de construction</label>
              <div class="col-sm-6">
                <input type="number" name="anne_cont" value="{{$anne_cont}}" class="form-control input-lg" readonly>
              </div>
            </div>

            


          </div>

          <div class="form-group">

            <div class="col-md-4">
              <label class="col-sm-3 control-label">construite ou vérifiée conforme aux règles parasismiques</label>
              <div class="col-sm-6">
                <input type="number" name="reg_para" value="{{$reg_para}}" class="form-control input-lg" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Vous appartient-t-elle ? </label>
              <div class="col-sm-6">
                <select id="Wilaya" name="Wilaya" class="select2">
                  <option value="oui" >OUI</option>                   
                  <option value="non" >NON</option>                   
                </select>
              </div>
            </div>


            <div class="col-md-4">
              <label class="col-sm-3 control-label">permis de construire </label>
              <div class="col-sm-6">
                <input type="text" name="permis" value="{{$permis}}" class="form-control input-lg" readonly>
              </div>
            </div>

            

          </div>

          <div class="form-group">

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Wilaya</label>
              <div class="col-sm-6">
                <input type="text" name="permis" value="{{$wilaya_selected}}" class="form-control input-lg" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <label class="col-sm-3 control-label">Commune</label>
              <div class="col-sm-6">
                <input type="text" name="permis" value="{{$Commune_selected}}" class="form-control input-lg" readonly>
              </div>
            </div>

          </div>

          <div class="form-group">
            <label class="col-sm-9 control-label">Total a payer</label>
            <div class="col-sm-3">
              <input type="text" name="prime_total_" value="{{number_format($prime_total, 2,',', ' ')}} DA" class="form-control input-lg" readonly style="border-radius: 20px;border-color: #007481;text-align: right;">
            </div>
          </div>

          <div class="panel-heading panel-heading-divider"><span class="panel-subtitle">Veuillez choisir une agence la plus proche</span></div>

          <div class="form-group">
            <div class="col-md-6">
              <label class="col-sm-3 control-label">Wilaya</label>
              <div class="col-sm-6">
                <select onchange="vers_wilaya()" id="Wilaya_map" name="Wilaya_map" class="select2">
                  @foreach($wilaya as $wilay)
                  <option value="{{$wilay->code_wilaya}}" @if($wilaya_selected == $wilay->code_wilaya) selected @endif>{{$wilay->nlib_wilaya}}</option>
                  @endforeach                       
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <label class="col-sm-3 control-label">Commune</label>
              <div class="col-sm-6">
                <select onchange="vers_commune()" id="Commune" name="Commune" class="select2">
                  <option value="">-</option>                      
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            
            <div class="col-md-12">
              <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                <iframe src="https://maps.google.com/maps?q=cheraga&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border: 0;width: -webkit-fill-available;height: inherit;" allowfullscreen></iframe>
              </div>
            </div>

          </div>
          

          <div class="col-xs-12">
            <p class="text-right">
              <button type="submit" class="btn btn-space btn-primary btn-lg">Valider</button>
              <button class="btn btn-space btn-default btn-lg">Annuler</button>
            </p>
          </div>
          
          <input type="hidden" name="prime_total" value="{{$prime_total}}">   
          <input type="hidden" name="id" value="{{$id ?? ''}}">   
          <input type="hidden" id="code_agence" name="code_agence" value="{{$code_agence ?? ''}}">   
          <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">

        </form>
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

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVBmJKrz6WzPT7HVLaGhC2hJA5V-rkwaA&sensor=false"></script>


<script>

  function dateplusunans() {

    var x = document.getElementById("date_effet");
    var dat=x.value;
    //alert(dat);
    var a = dat.substring(6,10);
    var m = dat.substring(3,5);
    var d = dat.substring(0,2);
    var t = m+"-"+d+"-"+a;
    var act = new Date(t);
    var apr = new Date (act.setFullYear(act.getFullYear() + 1));
    var apj = apr.setDate(apr.getDate() - 1);
    //var final = apr.toLocaleDateString();
    var day = ('0' + apr.getDate()).slice(-2);
    var month = ('0' + (apr.getMonth() + 1)).slice(-2);
    var year = apr.getFullYear();
    var final = day+"/"+month+"/"+year;
    document.getElementById("date_expiration").value=final;
  }

</script>

<script>

  function vers_wilaya(){

   var nom = $('#Wilaya_map').children("option:selected").text();


   var geocoder = new google.maps.Geocoder();


   geocoder.geocode({'address': nom+', algerie'}, function(results, status) {
    if (status === 'OK') {
      map.setCenter(results[0].geometry.location);
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });

   map.setZoom(10);


 }

 function vers_commune(){

   var nom = $('#Wilaya_map').children("option:selected").text();
   var nom_com = $('#Commune').children("option:selected").text();

   var geocoder = new google.maps.Geocoder();


   geocoder.geocode({'address': nom_com+', '+nom+', algerie'}, function(results, status) {
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

  @foreach($agences as $agence)

  var myLatlng = new google.maps.LatLng({{$agence->Latitude}},{{$agence->Longetude}});    
  var contentString = '<div id="etiquette" style="width:auto; height:auto;">'+
  '<h2 style="color:#048c9b;">{{$agence->Name}}</h2>'+
  '<div>'+
  '<p>' +
  '<strong>Chef d\'agence :</strong> {{$agence->Chef_Agence}}<br/>'+
  '<strong>Adresse :</strong> {{$agence->Adresse}}<br/>'+
  '<strong>Tel :</strong> {{$agence->Tel}}<br/>'+
  '<strong>Fax :</strong> {{$agence->Fax}}<br/>'+
  '<strong>Mail :</strong> {{$agence->Mail}} <br/>'+
  '</p>'+
  '</div>'+
  '</div>';
  var infowindow = new google.maps.InfoWindow({
    content: contentString,
  }); 
  
  var marker = new google.maps.Marker({
    position: myLatlng,
    icon: image,
    title:"{{$agence->Chef_Agence}}" ,  
    code_agence:"{{$agence->id}}" ,  
    html :  contentString
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(this.html);
    infowindow.open(map,this);
    $(code_agence).val(this.code_agence);
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
   $('#Commune').html(result);
   //alert(value);
   
 }

})
}
});
@endsection