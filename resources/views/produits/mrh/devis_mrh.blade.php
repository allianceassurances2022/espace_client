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
                <div class="panel-heading panel-heading-divider">Devis Mulitirisque Habitation<span class="panel-subtitle">Veuillez compléter vos informations pour établire votre devis</span></div>
                <div class="panel-body">
                  <form action="{{route('validation_devis_mrh')}}" method="post" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                    @csrf

                    <div class="form-group">

                    <div class="col-md-4">
                      <label class="col-sm-3 control-label">Date souscription</label>
                      <div class="col-sm-6">
                        <input type="text" data-mask="date" placeholder="DD/MM/YYYY" name="date_sous" value="{{$date_souscription}}" class="form-control input-lg" readonly>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-sm-3 control-label">Montant forfaitaire</label>
                      <div class="col-sm-6">
                        <input type="text" name="montant_" value="{{number_format($montant, 2,',', ' ')}} DA" class="form-control input-lg" readonly>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-sm-3 control-label">Nombre de pieces</label>
                      <div class="col-sm-6">
                        <input type="text" name="nbr_piece" value="{{$nbr_piece ?? ''}}" class="form-control input-lg" readonly>
                      </div>
                    </div>

                    </div>

                    <div class="form-group">

                      <div class="col-md-4">
                      <label class="col-sm-3 control-label">Habitation</label>
                      <div class="col-sm-6">
                        <input type="text" name="hab" value="{{$habitation}}" class="form-control input-lg" readonly>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-sm-3 control-label">Qualité juredique</label>
                      <div class="col-sm-6">
                        <input type="text" name="juredique" value="{{$juredique}}" class="form-control input-lg" readonly>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-sm-3 control-label">Terrasse</label>
                      <div class="col-sm-6">
                        <input type="text" name="terasse" value="{{$terasse}}" class="form-control input-lg" readonly>
                      </div>
                    </div>

                    </div>

                    <div class="form-group">

                    <div class="col-md-4">
                      <label class="col-sm-3 control-label">Nombre d'Etage</label>
                      <div class="col-sm-6">
                        <input type="number" name="etage" value="{{$etage ?? ''}}" class="form-control input-lg">
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
                      <label class="col-sm-3 control-label">Surface</label>
                      <div class="col-sm-6">
                        <input type="number" name="surface" value="{{$surface ?? ''}}" class="form-control input-lg">
                      </div>
                    </div>

                  </div>

                  <div class="form-group">

                    <div class="col-md-8">
                      <label class="col-sm-3 control-label">Adress</label>
                      <div class="col-sm-6">
                        <input type="text" name="adresse" value="{{$adresse ?? ''}}" class="form-control input-lg">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <label class="col-sm-3 control-label">Wilaya</label>
                      <div class="col-sm-6">
                        <select id="Wilaya" name="Wilaya" class="select2">
                            @foreach($wilaya as $wilay)
                              <option value="{{$wilay->code_wilaya}}" @if($wilaya_selected == $wilay->code_wilaya) selected @endif>{{$wilay->nlib_wilaya}}</option>
                            @endforeach                       
                        </select>
                      </div>
                    </div>

                  </div>

                    

                    <div class="form-group">
                      <label class="col-sm-9 control-label">Total a payer</label>
                      <div class="col-sm-3">
                        <input type="text" name="prime_total_" value="{{number_format($prime_total, 2,',', ' ')}} DA" class="form-control input-lg" readonly>
                      </div>
                    </div>

                    <div class="col-xs-12">
                        <p class="text-right">
                          <button type="submit" class="btn btn-space btn-primary btn-lg">Valider</button>
                          <button class="btn btn-space btn-default btn-lg">Annuler</button>
                        </p>
                      </div>

                    <input type="hidden" name="montant" value="{{$montant}}">   
                    <input type="hidden" name="prime_total" value="{{$prime_total}}">   
                    <input type="hidden" name="id" value="{{$id ?? ''}}">   
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

@endsection

@section('docready')
App.formElements();
App.masks();
@endsection