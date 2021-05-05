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
      <div class="panel-heading"><img src="assets/img/logo_dark.svg" alt="logo" width="300" height="100" class="logo-img"><span class="splash-description">Veuillez saisir vos informations d'utilisateur</span></div>
      <div class="panel-body">
        <form method="POST" action="{{ route('register') }}" class="form-horizontal">

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
                                          <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom') }}" required>
                                      </div>
                                  </div>

                              </div>

                              <div class="form-group">

                                <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Wilaya</label>
                                    <div class="col-sm-9">
                                        <select  name="wilaya" class="custom-select select2" id="wilaya" required>
                                            @foreach($wilayas as $wilaya)
                                                <option value="{{ $wilaya->code_wilaya }}" @if($wilaya->code_wilaya == old('wilaya') ) selected  @endif>{{ $wilaya->nlib_wilaya }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Commune</label>
                                    <div class="col-sm-9">
                                        <select  name="commune" class="custom-select select2" id="commune" required>
                                        @foreach($communes as $commune)
                                            <option value="{{ $commune->code_commune }}" @if($commune->code_commune == old('commune')) selected  @endif >{{ $commune->lib_commune }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                              <div class="form-group">
                                <div class="col-md-12">
                                    <label class="col-sm-3 control-label" style="width: 11.95%;">Adresse</label>
                                    <div class="col-sm-9" style="width: 88%;">
                                        <input id="adresse" type="text" name="adresse" class="form-control" value="{{ old('adresse') }}" required>
                                    </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Profession</label>
                                    <div class="col-sm-9">
                                        <select id="profession" name="profession" class="select2">
                                            @foreach($professions as $profession)
                                            <option value="{{$profession->code}}"
                                                    {{$profession->code == old('profession')  ? 'selected' : ''  }}
                                            >{{$profession->libelle}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Activité</label>
                                    <div class="col-sm-9">
                                        <select id="activity" name="activity" class="select2">
                                            @foreach($activities as $activity)
                                                <option value="{{$activity->code}}"
                                                        {{$activity->code == old('activity')  ? 'selected' : ''  }}
                                                >{{$activity->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                              <div class="form-group">

                                  <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Date de naissance</label>
                                    <div class="col-sm-9">
                                        <input type="text" data-mask="date"  class="form-control" type="text" name="date_naissance" id="date_naissance" value="{{ old('date_naissance') }}" required>
                                    </div>
                                  </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-3 control-label">Lieu de naissance</label>
                                        <div class="col-sm-9">
                                            <input id="lieu_naissance" type="text" name="lieu_naissance" class="form-control" value="{{ old('lieu_naissance') }}" required>
                                        </div>
                                    </div>

                              </div>

                              <div class="form-group">

                                <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Civilité</label>
                                <div class="col-sm-9">
                                    <select id="civilite" name="civilite" class="select2">
                                        @foreach($civilites as $civilite)
                                            <option value="{{$civilite->code}}"
                                                    {{$civilite->code == old('civilite')  ? 'selected' : ''  }}
                                            >{{$civilite->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>

                              </div>

                              <div class="form-group">

                                <div class="col-md-6">
                                  {{-- <label class="col-sm-3 control-label">{{ __('E-Mail Address') }}</label> --}}
                                  <label class="col-sm-3 control-label">Adresse e-mail</label>
                                  <div class="col-sm-9">
                                      <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autocomplete="email">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-sm-3 control-label">Téléphone</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}" required>
                                    </div>
                                </div>

                              </div>


                              <div class="form-group">

                               <div class="col-md-6">
                                   {{-- <label class="col-sm-3 control-label">{{ __('Password') }}</label> --}}
                                   <label class="col-sm-3 control-label">Mot de passe</label>
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
                                 {{-- <label class="col-sm-3 control-label">{{ __('Confirm Password') }}</label> --}}
                                 <label class="col-sm-3 control-label">Confirmation du mot de passe</label>
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
