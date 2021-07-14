<div class="main-content">
    <div class="jumbotron">
        <div class="row justify-content-center">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <center>
                        <h2 id="heading">Déclaration sinistre</h2>
                        <p>Déclarez votre sinitre en toute facilité</p>
                    </center>
                    <form id="msform" method="POST" action="{{ route('declare_sinistre') }}" class="form-horizontal">
                        @csrf
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
                                            <input type="text" id="num_police" name="name"
                                                value="{{ old('num_police') }}" autofocus>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Société d'assurance</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="societe_assurance" id="societe_assurance"
                                                value="{{ old('societe_assurance') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Attestation valable du</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="contrat_debut" name="contrat_debut"
                                                value="{{ old('contrat_debut') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Au</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="contrat_fin_adv" id="contrat_fin"
                                                value="{{ old('contrat_fin') }}">
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
                                                    value="{{ old('num_police_adv') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Société d'assurance</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="societe_assurance_adv"
                                                    id="societe_assurance_adv" class="form-control"
                                                    value="{{ old('societe_assurance_adv') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Attestation valable du</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="contrat_debut_adv" name="contrat_debut_adv"
                                                    value="{{ old('contrat_debut_adv') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Au</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="contrat_fin_adv" id="contrat_fin_adv"
                                                    value="{{ old('contrat_fin_adv') }}">
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
                                                value="{{ old('name') }}" profession>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Prénom</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="prenom" id="prenom" class="form-control"
                                                value="{{ old('prenom') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Adresse</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="adress" name="adress" class="form-control"
                                                value="{{ old('adress') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Profession</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="profession" id="profession" class="form-control"
                                                value="{{ old('profession') }}">
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
                                                    value="{{ old('name_adv') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Prénom</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="prenom_adv" id="prenom_adv"
                                                    class="form-control" value="{{ old('prenom_adv') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Adresse</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="adress" name="adress"
                                                    value="{{ old('adress') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Profession</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="profession_adv" id="profession_adv"
                                                    class="form-control" value="{{ old('profession_adv') }}">
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
                                            <input type="text" id="modele" name="modele" value="{{ old('modele') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Marque, type</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="marque" id="marque" value="{{ old('marque') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">N° d'immatriculation</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="matricule" name="matricule"
                                                value="{{ old('matricule') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Venant de</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="from" id="from" value="{{ old('from') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Allant vers</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="to" name="to" value="{{ old('to') }}">
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
                                                    value="{{ old('modele') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Marque, type</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="marque" id="marque"
                                                    value="{{ old('marque') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">N° d'immatriculation</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="matricule" name="matricule"
                                                    value="{{ old('matricule') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Venant de</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="from" id="from" value="{{ old('from') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Allant vers</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="to" name="to" value="{{ old('to') }}">
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
                                                value="{{ old('name_cond') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Prénom</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="prenom_cond" id="prenom_cond_adv"
                                                value="{{ old('prenom_cond') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Adresse</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="adress_cond" name="adress_cond"
                                                value="{{ old('adress_cond') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Permis de conduire N°</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="permis" id="permis" value="{{ old('permis') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Délivré le</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="deliver" id="deliver"
                                                value="{{ old('deliver') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Catégorie</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="categorie" id="categorie"
                                                value="{{ old('categorie') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="col-sm-4 control-label">Date de naissance</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="adress_cond_adv" name="adress_cond_adv"
                                            value="{{ old('adress_cond_adv') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-sm-4 control-label">Numéro de téléphone</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="permis_adv" id="permis_adv"
                                            value="{{ old('permis_adv') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-4 control-label">Étiez-vous au volant du
                                        véhicule</label>
                                    <div class="col-sm-8">
                                        <input class="form-check-input" type="radio" id="gendarme" name="gendarme"
                                            value="{{ old('gendarme') }}" style="width: 100px;
                                                margin-right: -27px;
                                                margin-top: 23px;">
                                        <label class="form-check-label" style="font-size: 16px;">oui</label>
                                        <input class="form-check-input" type="radio" id="gendarme" name="gendarme"
                                            value="{{ old('gendarme') }}" style="width: 100px;
                                            margin-right: -27px;
                                            margin-top: 23px;">
                                        <label class="form-check-label" style="font-size: 16px;">non</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-4 control-label">Le conducteur réside-t-il chez vous</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="permis_adv" id="permis_adv"
                                            value="{{ old('permis_adv') }}">
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
                                                    value="{{ old('name_cond_adv') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Prénom</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="prenom_cond_adv" id="prenom_cond_adv"
                                                    value="{{ old('prenom_cond_adv') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Adresse</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="adress_cond_adv" name="adress_cond_adv"
                                                    value="{{ old('adress_cond_adv') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Permis de conduire N°</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="permis_adv" id="permis_adv"
                                                    value="{{ old('permis_adv') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Délivré le</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="deliver_adv" id="deliver_adv"
                                                    value="{{ old('deliver_adv') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Catégorie</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="categorie_adv" id="categorie_adv"
                                                    value="{{ old('categorie_adv') }}">
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
                                                value="{{ old('date_accident') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Heure de l'accident</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="heure_accident" id="heure_accident"
                                                value="{{ old('heure_accident') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Lieu de l'accident</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="lieu_accident" name="lieu_accident"
                                                value="{{ old('lieu_accident') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Circonstances de l'accident</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="circonstances" id="circonstances"
                                                value="{{ old('circonstances') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Un procès-verbal de gendarmerie</label>
                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="radio" id="gendarme" name="gendarme"
                                                value="{{ old('gendarme') }}" style="width: 100px;
                                                margin-right: -27px;
                                                margin-top: 23px;">
                                            <label class="form-check-label" style="font-size: 16px;">oui</label>
                                            <input class="form-check-input" type="radio" id="gendarme" name="gendarme"
                                                value="{{ old('gendarme') }}" style="width: 100px;
                                            margin-right: -27px;
                                            margin-top: 23px;">
                                            <label class="form-check-label" style="font-size: 16px;">non</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Un rapport de police</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id="police"
                                                        name="police" value="{{ old('police') }}"
                                                        onclick="showInput('brigade1')" style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="police"
                                                        name="police" value="{{ old('police') }}"
                                                        onclick="showNone('brigade1')"
                                                        style="width: 100px;margin-right: -27px;margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">non</label>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none" id="brigade1">
                                                <div class="col-md-6">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Brigade ou commissariat
                                                        de</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="brigade" name="brigade"
                                                            value="{{ old('brigade') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: -25px;">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">S'agit-il d'un vol ?</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id="vol" name="vol"
                                                        value="{{ old('vol') }}" onclick="showInput('serie_type')"
                                                        style="width: 100px;
                                                margin-right: -27px;">
                                                    <label class="form-check-label" style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="vol" name="vol"
                                                        value="{{ old('vol') }}" onclick="showNone('serie_type')"
                                                        style="width: 100px; margin-right: -27px; margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">non</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: none" id="serie_type">
                                                <label class="col-sm-4 control-label">Numéro dans la série du
                                                    type</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="num_serie" id="num_serie"
                                                        value="{{ old('num_serie') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: -25px;">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Votre véhicule est-il gagé</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id=gager" name="gager"
                                                        value="{{ old('gager') }}" onclick="showInput('gage')" style="width: 100px;
                                                margin-right: -27px;
                                                margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="gager" name="gager"
                                                        value="{{ old('gager') }}" onclick="showNone('gage')" style="width: 100px; margin-right: -27px;
                                            margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">non</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="display: none" id="gage">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Nom de l'organisme de
                                                    crédit</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nom_organism" id="nom_organism"
                                                        value="{{ old('nom_organism') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Adresse de l'organisme de
                                                    crédit</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="adress_organism" id="adress_organism"
                                                        value="{{ old('adress_organism') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: -25px;">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">S'agit-il d'un véhicule poids
                                                    lourd</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id="lourd" name="lourd"
                                                        value="{{ old('lourd') }}" onclick="showInput('div-lourd')"
                                                        style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="lourd" name="lourd"
                                                        value="{{ old('lourd') }}" onclick="showNone('div-lourd')"
                                                        style="width: 100px;
                                                    margin-right: -27px;
                                                    margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">non</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="display: none" id="div-lourd">

                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">était attelé à un autre véhicule
                                                    (tracteur
                                                    ou remorque) au moment de l'accident</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id="police"
                                                        name="police" value="{{ old('police') }}"
                                                        onclick="showInput('attele')" style="width: 100px;
                                                            margin-right: -27px;
                                                            margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="police"
                                                        name="police" value="{{ old('police') }}"
                                                        onclick="showNone('attele')" style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">non</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Poids total en charge(Kg)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="poids_charge" id="poids_charge_second"
                                                        value="{{ old('poids_charge') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display: none" id="attele">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Numéro d'immatriculation du
                                                        2nd
                                                        véhicule
                                                    </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="num_imma_charge" id="num_imma_charge"
                                                            value="{{ old('num_imma_charge') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Poids total en
                                                        charge(Kg)</label>

                                                    <div class="col-sm-8">
                                                        <input type="text" name="poids_charge_second"
                                                            id="poids_charge_second"
                                                            value="{{ old('poids_charge_second') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Nom de la société qui
                                                        l'assure</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="assurance" id="assurance"
                                                            value="{{ old('assurance') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">N° de police</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="n_police" id="n_police"
                                                            value="{{ old('n_police') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: -25px;">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Dégâts matériels autres que
                                                    mon
                                                    véhicule
                                                    et celui de mon adversaire</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id="autre_degat"
                                                        name="autre_degat" value="{{ old('autre_degat') }}"
                                                        onclick="showInput('autre-dega')" style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="autre_degat"
                                                        name="autre_degat" value="{{ old('autre_degat') }}"
                                                        onclick="showNone('autre-dega')" style="width: 100px;
                                                    margin-right: -27px; margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">non</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none" id="autre-dega">
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Nature et importance</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nature" id="nature"
                                                    value="{{ old('nature') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Nom du propriétaire</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nom_nature" id="nom_nature"
                                                    value="{{ old('nom_nature') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-sm-4 controladress_naturelabel">Adresse du
                                                propriétaire</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="adress_nature" id="adress_nature"
                                                    value="{{ old('adress_nature') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top: -25px;">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Blessé (S)</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id="blesse"
                                                        name="blesse" value="{{ old('blesse') }}"
                                                        onclick="showInput('autre_bless')" style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="blesse"
                                                        name="blesse" value="{{ old('blesse') }}"
                                                        onclick="showNone('autre_bless')" style="width: 100px;
                                                    margin-right: -27px;
                                                    margin-top: 23px;">
                                                    <label class="form-check-label" style="font-size: 16px;">non</label>
                                                </div>
                                            </div>

                                            <div class="col-md-6" style="display: none" id="autre_bless">
                                                <label class="col-sm-4 control-label">Nombre de personnes
                                                    blessés</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="nmbr_blesse" id="nmbr_blesse"
                                                        value="{{ old('nmbr_blesse') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <button data-dismiss="modal" type="submit"
                                    class="btn btn-primary btn-xl">{{ __('Valider') }}</button>
                                <input type="button" name="next" class="next action-button" value="next" />
                                <input type="button" name="previous" class="previous action-button-previous"
                                    value="Précédent" />
                        </fieldset>
                        <!--fieldset>
                            <div class="form-card">

                            </div>
                            <input type="button" name="next" class="next action-button" value="Valider" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Précédent" />
                        </!--fieldset-->

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
