@extends('default')

@section('title')
Devis MRH
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('assets/lib/select2/css/select2.min.css')}}" />
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-border-color panel-border-color-primary">
            <div class="panel-heading panel-heading-divider">Devis Mulitirisque Habitation<span class="panel-subtitle">Veuillez compléter vos informations pour établire votre devis</span></div>
            <div class="panel-body">
              <form method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="form-group">

                      <div class="col-md-6">
                          <label class="col-sm-3 control-label">{{ __('Name') }}</label>
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
                          <label class="col-sm-3 control-label">Prenom</label>
                          <div class="col-sm-9">
                              <input type="text" name="prenom" id="prenom" class="form-control">
                          </div>
                      </div>

                  </div>

                   <div class="form-group">

                    <div class="col-md-6">
                        <label class="col-sm-3 control-label">Wilaya</label>
                        <div class="col-sm-9">
                            <select id="wilaya" name="wilaya" class="select2">
                                 {{-- @foreach($wilaya as $wilay)
                                <option value="{{$wilay->code_wilaya}}">{{$wilay->nlib_wilaya}}</option>
                                @endforeach --}}
                                <option value="subject">Subject 1</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                      <label class="col-sm-3 control-label">Commune</label>
                      <div class="col-sm-9">
                          <select id="commune" name="commune" class="select2">
                               {{-- @foreach($wilaya as $wilay)
                              <option value="{{$wilay->code_wilaya}}">{{$wilay->nlib_wilaya}}</option>
                              @endforeach --}}
                              <option value="subject">Subject 1</option>
                          </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">

                      <div class="col-md-6">
                        <label class="col-sm-3 control-label">Date de naissance</label>
                        <div class="col-sm-9">
                            <input type="text" data-mask="date"  class="form-control" type="text" name="date_naissance" id="date_naissance">
                        </div>
                      </div>

                      <div class="form-group">

                        <div class="col-md-6">
                        <label class="col-sm-3 control-label">Sexe</label>
                         <div class="col-sm-9">
                      <div class="be-radio-icon inline">
                        <input type="radio" checked name="rad1" id="rad1">
                        <label for="rad1"><span class="mdi mdi-female"></span></label>
                      </div>
                      <div class="be-radio-icon inline">
                        <input type="radio" name="rad1" id="rad2">
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
                               {{-- @foreach($wilaya as $wilay)
                              <option value="{{$wilay->code_wilaya}}">{{$wilay->nlib_wilaya}}</option>
                              @endforeach --}}
                              <option value="subject">Subject 1</option>
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <label class="col-sm-3 control-label">Telephone</label>
                        <div class="col-sm-9">
                            <input type="text" name="telephone" id="telephone" class="form-control">
                        </div>
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="col-md-12">
                        <label class="col-sm-3 control-label">{{ __('E-Mail Address') }}</label>
                        <div class="col-sm-9">
                            <input id="email" type="email" name="email" id="telephone" class="form-control" required autocomplete="email">
                        </div>
                    </div>
                  </div>

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

@endsection

@section('docready')
App.formElements();
App.masks();


@endsection
