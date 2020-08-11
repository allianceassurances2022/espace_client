@extends('default2')

@section('title')
Inscription
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('assets/lib/select2/css/select2.min.css')}}" />
@endsection

@section('content')



  <div class="splash-container2">

    <div class="panel panel-default panel-border-color panel-border-color-primary">
      <div class="panel-heading"><img src="assets/img/logo_dark.svg" alt="logo" width="300" height="100" class="logo-img"><span class="splash-description">Veuillez saisir vos informations d'utilisateur.</span></div>
      <div class="panel-body">
        <form method="POST" action="{{ route('register') }}" class="form-horizontal">
           @csrf
                              <div class="form-group">
                                  <div class="col-md-6">
                                      <label class="col-sm-3 control-label">Nom</label>
                                      <div class="col-sm-9">
                                          <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                          @error('name')
                                           <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                           </span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="col-md-6">
                                      <label class="col-sm-3 control-label">Prénom</label>
                                      <div class="col-sm-9">
                                          <input type="text" name="prenom" id="prenom" class="form-control" required>
                                      </div>
                                  </div>

                              </div>

                               <div class="form-group">

                                <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Wilaya</label>
                                    <div class="col-sm-9">
                                        <select id="wilaya" name="wilaya" class="select2" required>
                                            @foreach($wilaya as $wilay)
                                             <option value="{{$wilay->code_wilaya}}">{{$wilay->nlib_wilaya}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                  <label class="col-sm-3 control-label">Commune</label>
                                  <div class="col-sm-9">
                                      <select id="commune" name="commune" class="select2">
                                           @foreach($commune as $commun)
                                             <option value="{{$commun->code_commune}}">{{$commun->lib_commune}}</option>
                                           @endforeach
                                      </select>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-md-12">
                                    <label class="col-sm-3 control-label" style="width: 11.95%;">Adresse</label>
                                    <div class="col-sm-9" style="width: 88%;">
                                        <input id="adresse" type="text" name="adresse" class="form-control" required>
                                    </div>
                                </div>
                              </div>

                              <div class="form-group">

                                  <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Date de naissance</label>
                                    <div class="col-sm-9">
                                        <input type="text" data-mask="date"  class="form-control" type="text" name="date_naissance" id="date_naissance" required>
                                    </div>
                                  </div>

                                    <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Sexe</label>
                                     <div class="col-sm-9">
                                  <div class="be-radio-icon inline">
                                    <input type="radio" checked name="sexe" value="Femme" id="rad1">
                                    <label for="rad1"><span class="mdi mdi-female"></span></label>
                                  </div>
                                  <div class="be-radio-icon inline">
                                    <input type="radio" name="sexe" value="Homme" id="rad2">
                                    <label for="rad2"><span class="mdi mdi-male-alt"></span></label>
                                  </div>
                                </div>
                              </div>

                              </div>

                              <div class="form-group">

                                <div class="col-md-6">
                                  <label class="col-sm-3 control-label">Profession</label>
                                  <div class="col-sm-9">
                                      <select id="profession" name="profession" class="select2">
                                          <option value="Salarié">Salarié</option>
                                          <option value="Fonctionnaire">Fonctionnaire</option>
                                      </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Telephone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="telephone" id="telephone" class="form-control" required>
                                    </div>
                                </div>

                              </div>

                              <div class="form-group">
                                <div class="col-md-12">
                                    <label class="col-sm-3 control-label" style="width: 11.95%;">{{ __('E-Mail Address') }}</label>
                                    <div class="col-sm-9" style="width: 88%;">
                                        <input id="email" type="email" name="email" class="form-control" required autocomplete="email">
                                    </div>
                                </div>
                              </div>

                              <div class="form-group">

                               <div class="col-md-6">
                                   <label class="col-sm-3 control-label">{{ __('Password') }}</label>
                                   <div class="col-sm-9">
                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                     @error('password')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                   </div>
                               </div>

                               <div class="col-md-6">
                                 <label class="col-sm-3 control-label">{{ __('Confirm Password') }}</label>
                                 <div class="col-sm-9">
                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                 </div>
                               </div>

                             </div>

                              <div class="form-group row social-signup">
                                <div class="col-xs-6">
                                  <a href="{{route('login')}}" type="button" class="btn btn-block btn-default btn-xl"> Annuler</a>
                                </div>
                                <div class="col-xs-6">
                                  <button type="submit" class="btn btn-block btn-primary btn-xl"> Valider</button>
                                </div>
                              </div>

                              <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">



        </form>

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


@endsection

@section('docready')
App.formElements();
App.masks();

$('#wilaya').change(function(){


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
$('#commune').html(result);
//alert(value);

}

})
}
});

@endsection
