@extends('default')

@section('title')
    page de profil
@endsection


@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/lib/select2/css/select2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/profil_style.css')}}" />

@endsection


@section('content')

    <div class="container emp-profile">
        <h2 style="text-align:center; margin-bottom: 70px; margin-top: -20px;">
            Modifier le profil
        </h2>
        <form method="post" action="{{ route('update_profil') }}" class="form-horizontal col-lg-12" enctype="multipart/form-data" >
            @csrf
                <div class="form-group">
                    <div class="col-md-6">
                        <label class="col-sm-3 control-label">Nom</label>
                        <div class="col-sm-9">
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>
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
                            <input type="text" name="prenom" id="prenom" class="form-control"  value="{{  old('prenom') ?? $user->prenom }}" required>
                        </div>
                    </div>

                </div>

                <div class="form-group">

                    <div class="col-md-6">
                        <label class="col-sm-3 control-label">Wilaya</label>
                        <div class="col-sm-9">
                            <select  name="wilaya" class="custom-select select2" id="wilaya" required>
                                @foreach($wilayas as $wilaya)
                                    <option value="{{ $wilaya->code_wilaya }}" @if($wilaya->code_wilaya == Auth()->user()->wilaya) selected  @endif>{{ $wilaya->nlib_wilaya }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="col-sm-3 control-label">Commune</label>
                        <div class="col-sm-9">
                            <select  name="commune" class="custom-select select2" id="commune" required>
                            @foreach($communes as $commune)
                                <option value="{{ $commune->code_commune }}" @if($commune->code_commune == Auth()->user()->commune) selected  @endif >{{ $commune->lib_commune }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label class="col-sm-3 control-label" style="width: 11.95%;">Adresse</label>
                        <div class="col-sm-9" style="width: 88%;">
                            <input id="adresse" type="text" name="adresse" class="form-control" value="{{ old('adress') ?? $user->adresse}}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-md-6">
                        <label class="col-sm-3 control-label">Date de naissance</label>
                        <div class="col-sm-9">
                         <!--   <input type="text" data-mask="date"  class="form-control" type="text" name="date_naissance" id="date_naissance"-->
                            <input type="date" class="form-control" name="date_naissance" id="date_naissance"
                                   value="{{ old('date_naissance') ?? $user->date_naissance}}" required>
                        </div>
                    </div>

                <div class="col-md-6">
                        <label class="col-sm-3 control-label">Civilité</label>
                        <div class="col-sm-9">
                            <div class="be-radio-icon inline">
                                <input type="radio"  name="gender" value="2"
                                       {{ $gender =='2' ? 'checked' : ''  }} id="rad1">
                                <label for="rad1"><span class="mdi mdi-female"></span></label>
                        </div>
                            <div class="be-radio-icon inline">
                                <input type="radio" name="gender" value="1"
                                        {{ $gender =='1' ? 'checked' : ''  }} id="rad2">
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
                                @foreach($professions as $profession)
                                <option value="{{$profession->code}}"
                                       @if ( Auth()->user()->profession == $profession->code )
                                       selected
                                       @endif
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
                                            @if ( Auth()->user()->activite == $activity->code )
                                            selected
                                            @endif
                                    >{{$activity->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

            <div class="form-group">
                <div class="col-md-6">
                    <label class="col-sm-3 control-label">Telephone</label>
                    <div class="col-sm-9">
                        <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') ?? $user->telephone}}" required>
                    </div>
                </div>
            </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label class="col-sm-3 control-label" style="width: 11.95%;">{{ __('E-Mail Address') }}</label>
                        <div class="col-sm-9" style="width: 88%;">
                            <input id="email" type="email" name="email" class="form-control" required autocomplete="email" value="{{ old('email') ?? $user->email}}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                       <label class="col-sm-3 control-label" style="width: 11.95%;">Modifier l'image</label>
                        <div  class="col-sm-9" style="width: 88%;"">
                            <input type="file" name="avatar" id="avatar" class="form-control"/>
                            @error('avatar')
                            <span class="parsley-errors-list filled" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xs-6" style="float: right;margin-top: 5%">
                        <a href="{{route('profil')}}" type="button" class="btn  btn-default btn-xl col-md-4" style="margin: 2%"> Annuler</a>
                        <button type="submit" class="btn btn-primary btn-xl col-md-4" style="margin: 2%"> Valider</button>
                    </div>
                </div>


                <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
            </form>


    </div>
@endsection

@section('js')

    <script>
        $(function() {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear() ;

            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = (year - 18) + '-' + month + '-' + day;
            $('#date_naissance').attr('max', maxDate);
        });
    </script>

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
