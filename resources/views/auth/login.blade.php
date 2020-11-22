@extends('layout')

@section('content')
<div class="main-content container-fluid">
          <div class="splash-container">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading"><img src="assets/img/logo_dark.svg" alt="logo" width="300" height="100" class="logo-img"><span class="splash-description">Veuillez saisir vos informations d'utilisateur.</span></div>
              <div class="panel-body">
                <form method="POST" action="{{ route('login') }}" data-parsley-validate="" novalidate="">
                        @csrf




                  <div class="form-group">
                    <input id="username" type="text" placeholder="Utilisateur" autocomplete="off" class="form-control" name="email">
                            <!--    @error('email')
                                    <span class="parsley-errors-list filled" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
-->
                  </div>
                  <div class="form-group">
                    <input id="password" type="password" placeholder="Mot de passe" class="form-control" name="password">
                  <!--        @error('password')
                                    <span class=" help-block parsley-errors-list filled" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                              @enderror
                               -->
                  </div>

                    @if ($errors->has('email'))
                        <span class="parsley-errors-list ">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @elseif ($errors->has('password'))
                        <span class="parsley-errors-list ">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <div class="d-flex justify-content-center recaptcha">
                        <div class="cc-selector">
                            <div class="g-recaptcha"  data-sitekey="6LdA5eMZAAAAABi5jq_MCXyQl-7hHGOEH-lHkSBd"></div>
                        </div>
                    </div>

                  <div class="form-group row login-tools">
                    <div class="col-xs-6 login-forgot-password">
                        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                       @endif</div>
                  </div>
                  <div class="form-group login-submit">
                    <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">{{ __('Login') }}</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="splash-footer"><span>Vous n'avez pas de compte? <a href="{{route('register')}}">S'inscrire</a></span></div>
          </div>
        </div>
@endsection


@section('js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
