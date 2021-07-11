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

                                <div class="list-group">
                                    <div class="list-group-item" id="separator">
                                        <span> Propriétaire véhicule tier </span>
                                    </div>
                                </div>

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
                            <input type="button" name="next" class="btn btn-primary next action-button"
                                value="Suivant" />

                        </fieldset>
                        <fieldset>
                            <div class="form-card">

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Nom</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ old('name') }}" requiredprofession>
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
                                            <input type="text" id="adress" name="adress" class="form-control"
                                                value="{{ old('adress') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Profession</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="profession" id="profession" class="form-control"
                                                value="{{ old('profession') }}" required>
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
                                                <input type="text" id="name_adv" name="name_adv"
                                                    value="{{ old('name_adv') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Prénom</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="prenom_adv" id="prenom_adv"
                                                    class="form-control" value="{{ old('prenom_adv') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Adresse</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="adress" name="adress"
                                                    value="{{ old('adress') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Profession</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="profession_adv" id="profession_adv"
                                                    class="form-control" value="{{ old('profession_adv') }}"
                                                    required>
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
                                            <input type="text" id="modele" name="modele" value="{{ old('modele') }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Marque, type</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="marque" id="marque" value="{{ old('marque') }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">N° d'immatriculation</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="matricule" name="matricule"
                                                value="{{ old('matricule') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Venant de</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="from" id="from" value="{{ old('from') }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Allant vers</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="to" name="to" value="{{ old('to') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="div3" style="display:none">
                                <div class="list-group">
                                    <div class="list-group-item" id="separator">
                                        <span> Propriétaire véhicule tier </span>
                                    </div>
                                </div>

                                <div class="form-card">

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Modèle du Véhicule</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="modele" name="modele"
                                                    value="{{ old('modele') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Marque, type</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="marque" id="marque"
                                                    value="{{ old('marque') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">N° d'immatriculation</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="matricule" name="matricule"
                                                    value="{{ old('matricule') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Venant de</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="from" id="from" value="{{ old('from') }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Allant vers</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="to" name="to" value="{{ old('to') }}"
                                                    required>
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
                                        <label class="col-sm-4 control-label">Nom</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="name_cond" name="name_cond"
                                                value="{{ old('name_cond') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Prénom</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="prenom_cond" id="prenom_cond_adv"
                                                value="{{ old('prenom_cond') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Adresse</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="adress_cond" name="adress_cond"
                                                value="{{ old('adress_cond') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Permis de conduire N°</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="permis" id="permis" value="{{ old('permis') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Délivré le</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="deliver" id="deliver"
                                                value="{{ old('deliver') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Catégorie</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="categorie" id="categorie"
                                                value="{{ old('categorie') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="div4" style="display:none">
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
                                                <input type="text" id="name_cond_adv" name="name_cond_adv"
                                                    value="{{ old('name_cond_adv') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Prénom</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="prenom_cond_adv" id="prenom_cond_adv"
                                                    value="{{ old('prenom_cond_adv') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Adresse</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="adress_cond_adv" name="adress_cond_adv"
                                                    value="{{ old('adress_cond_adv') }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Permis de conduire N°</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="permis_adv" id="permis_adv"
                                                    value="{{ old('permis_adv') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Délivré le</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="deliver_adv" id="deliver_adv"
                                                    value="{{ old('deliver_adv') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Catégorie</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="categorie_adv" id="categorie_adv"
                                                    value="{{ old('categorie_adv') }}" required>
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
                                        <label class="col-sm-4 control-label">Date de l'accident</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="date_accident" name="date_accident"
                                                value="{{ old('date_accident') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Heure de l'accident</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="heure_accident" id="heure_accident"
                                                value="{{ old('heure_accident') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Lieu de l'accident</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="lieu_accident" name="lieu_accident"
                                                value="{{ old('lieu_accident') }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Circonstances de l'accident</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="permis" id="permis" value="{{ old('permis') }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Un procès-verbal de gendarmerie</label>
                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" style="width: 100px;
                                                margin-right: -27px;
                                                margin-top: 23px;">
                                            <label class="form-check-label" style="font-size: 16px;">oui</label>
                                            <input class="form-check-input" type="checkbox" id="gendarme"
                                                name="gendarme" value="{{ old('gendarme') }}" style="width: 100px;
                                            margin-right: -27px;
                                            margin-top: 23px;">
                                            <label class="form-check-label" style="font-size: 16px;">non</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Un rapport de police</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="categorie" id="categorie"
                                                value="{{ old('categorie') }}" required>
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
