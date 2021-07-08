@extends('default')
@section('head_title')
    Déclaration sinistres
@endsection
@section('head')
    <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/declaration.css" />
@endsection

<div>
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid" style="margin-bottom: 15px;">
            <div class="navbar-header"><a href="{{ route('index_produit') }}" class="navbar-brand"></a></div>
            <div class="be-right-navbar">

                <ul class="nav navbar-nav navbar-right be-icons-nav">
                    <li class="dropdown">
                        <a href="{{ route('index_produit') }}" role="button" aria-expanded="false"><span
                                class="icon mdi mdi-home" style="margin-top: 20px;"></span></a>
                    </li>
                    <li class="dropdown" style="margin-top: 20px;"><a href="#" data-toggle="dropdown" role="button"
                            aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                        <ul class="dropdown-menu be-connections">
                            <li>
                                <div class="list">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-4"><a
                                                    href="{{ route('type_produit', ['auto', 'index']) }}"
                                                    class="connection-item"><img
                                                        src="{{ asset('produit_assets/images/icons/auto_col.svg') }}"
                                                        alt="Automobile"><span>Auto</span></a></div>
                                            <div class="col-xs-4"><a
                                                    href="{{ route('type_produit', ['mrh', 'index']) }}"
                                                    class="connection-item"><img
                                                        src="{{ asset('produit_assets/images/icons/hab_col.svg') }}"
                                                        alt="Multirisques Habitation"><span>MRH+</span></a></div>
                                            {{-- <div class="col-xs-4"><a href="{{route('type_produit',['mrp','index'])}}" class="connection-item"><img src="{{asset('produit_assets/images/icons/pro_col.svg')}}" alt="Multirisques Professionnelle"><span>MRP+</span></a></div> --}}
                                            <div class="col-xs-4"><a
                                                    href="{{ route('type_produit', ['catnat', 'index']) }}"
                                                    class="connection-item"><img
                                                        src="{{ asset('produit_assets/images/icons/cat_nat_col.svg') }}"
                                                        alt="Catastrophe Naturelle"><span>CATNAT</span></a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12"><a target="_blank" href="https://www.amana.dz/"
                                                    class="connection-item"><img
                                                        src="{{ asset('assets/img/logo_amana.png') }}"
                                                        alt="Mail Chimp"
                                                        style="max-width: 120px;"><span>Ammana</span></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"> <a href="{{ route('index_produit') }}">Tous les Produits</a>
                                </div>
                            </li>


                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>

@section('content')

    @if (auth::user())
        Hello
    @elseif (!auth::user())
        <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="main-content container-fluid">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="jumbotron">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="panel panel-default panel-border-color panel-border-color-primary">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="panel-heading">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <img src="assets/img/logo_dark.svg" alt="logo" width="300" height="100" class="logo-img">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span class="splash-description">Déclarer votre sinistre en un seul clique</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="panel-body">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <form method="POST" action="#" class="form-horizontal" data-parsley-validate="" novalidate="">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    @csrf
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <h5 class="col-sm-12">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Information sur l'assurance
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </h5>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="form-group">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-6">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <label class="col-sm-4 control-label">N° Police d'assurance</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" id="name" name="name" class="form-control"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                @error('name')
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <strong>{{ $message }}</strong>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                @enderror
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-6">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <label class="col-sm-4 control-label">Société d'assurance</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" name="prenom" id="prenom" class="form-control"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    value="{{ old('prenom') }}" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="form-group">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-6">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <label class="col-sm-4 control-label">Nom du propriétaire</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" id="name" name="name" class="form-control"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                @error('name')
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <strong>{{ $message }}</strong>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                @enderror
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-6">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <label class="col-sm-4 control-label">Prénom du propriétaire</label>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="col-sm-8">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <input type="text" name="prenom" id="prenom" class="form-control"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    value="{{ old('prenom') }}" required>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </form>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            -->
        <div class="main-content">
            <div class="jumbotron">
                <div class="row justify-content-center">
                    <div class="panel panel-default panel-border-color panel-border-color-primary">
                        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                            <center>
                                <h2 id="heading">Déclaration sinistre</h2>
                                <p>Déclarez votre sinitre en toute facilité</p>
                            </center>
                            <form id="msform" class="form-horizontal">

                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>L'Assurance</strong></li>
                                    <li id="account"><strong>Le propriétaire</strong></li>
                                    <li id="personal"><strong>le véhicule</strong></li>
                                    <li id="personal"><strong>le conducteur</strong></li>
                                    <li id="payment"><strong>l'accident</strong></li>
                                    <li id="confirm"><strong>Validation</strong></li>
                                </ul>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <fieldset>
                                    <div class="form-card">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">N° Police d'assurance</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Société d'assurance</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="prenom" id="prenom" class="form-control"
                                                        value="{{ old('prenom') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Attestation valable du</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Au</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="prenom" id="prenom" class="form-control"
                                                        value="{{ old('prenom') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check" style="text-align: center;">
                                        <input class="form-check-input" name="c1" type="checkbox"
                                            onclick="showMe('div1'), showMe('div2'), showMe('div3'), showMe('div4')"
                                            style="width: 100px;margin-right: -27px;">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Cet accident s'est produit avec un
                                            advaisaire
                                        </label>

                                    </div>
                                    <div id="div1" style="display:none">
                                        <div class="form-card">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">N° Police d'assurance</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            value="{{ old('name') }}" required autocomplete="name"
                                                            autofocus>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Société d'assurance</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="prenom" id="prenom" class="form-control"
                                                            value="{{ old('prenom') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Attestation valable du</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            value="{{ old('name') }}" required autocomplete="name"
                                                            autofocus>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Au</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="prenom" id="prenom" class="form-control"
                                                            value="{{ old('prenom') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Suivant" />

                                </fieldset>
                                <fieldset>
                                    <div class="form-card">

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Nom</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Prénom</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="prenom" id="prenom" class="form-control"
                                                        value="{{ old('prenom') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Adresse</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Profession</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="prenom" id="prenom" class="form-control"
                                                        value="{{ old('prenom') }}" required>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div id="div2" style="display:none">
                                        <div class="list-group">
                                            <div class="list-group-item" id="separator">
                                                <span> Propriétaire véhicule tier </span>
                                            </div>
                                        </div>

                                        <div class="form-card">

                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Nom</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            value="{{ old('name') }}" required autocomplete="name"
                                                            autofocus>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Prénom</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="prenom" id="prenom" class="form-control"
                                                            value="{{ old('prenom') }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Adresse</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            value="{{ old('name') }}" required autocomplete="name"
                                                            autofocus>
                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Profession</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="prenom" id="prenom" class="form-control"
                                                            value="{{ old('prenom') }}" required>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Précédent" />
                                </fieldset>


                                <fieldset>
                                    <div class="form-card">

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Modèle du Véhicule</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Marque, type</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="prenom" id="prenom" class="form-control"
                                                        value="{{ old('prenom') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">N° d'immatriculation</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Venant de</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="prenom" id="prenom" class="form-control"
                                                        value="{{ old('prenom') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Allant vers</label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>



                                    </div>

                                    <div id="div3" style="display:none">
                                        propriétaire véhicule tier !!!!
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Précédent" />

                                </fieldset>
                                <fieldset>
                                    <div class="form-card">

                                    </div>

                                    <div id="div4" style="display:none">
                                        propriétaire véhicule tier !!!!
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Précédent" />

                                </fieldset>
                                <fieldset>
                                    <div class="form-card">

                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Précédent" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">

                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Valider" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Précédent" />
                                </fieldset>

                            </form>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



@endsection

@section('js')

    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })



        });

        function showMe(box) {

            var chboxs = document.getElementsByName("c1");
            var vis = "none";
            for (var i = 0; i < chboxs.length; i++) {
                if (chboxs[i].checked) {
                    vis = "block";
                    break;
                }
            }
            document.getElementById(box).style.display = vis;


        }
    </script>

@endsection
