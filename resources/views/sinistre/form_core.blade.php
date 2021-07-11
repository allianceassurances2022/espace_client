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
                                            <input type="text" id="num_police" name="name" required
                                                value="{{ old('num_police') }}" autofocus>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Société d'assurance</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="societe_assurance" id="societe_assurance"
                                                value="{{ old('societe_assurance') }}" required>


                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Attestation valable du</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="contrat_debut" name="contrat_debut"
                                                value="{{ old('contrat_debut') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Au</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="contrat_fin_adv" id="contrat_fin"
                                                value="{{ old('contrat_fin') }}" required>
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
                                                <input type="text" id="num_police_adv" name="num_police_adv"
                                                    value="{{ old('num_police_adv') }}" required>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Société d'assurance</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="societe_assurance_adv"
                                                    id="societe_assurance_adv" class="form-control"
                                                    value="{{ old('societe_assurance_adv') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Attestation valable du</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="contrat_debut_adv" name="contrat_debut_adv"
                                                    value="{{ old('contrat_debut_adv') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Au</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="contrat_fin_adv" id="contrat_fin_adv"
                                                    value="{{ old('contrat_fin_adv') }}" required>
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
