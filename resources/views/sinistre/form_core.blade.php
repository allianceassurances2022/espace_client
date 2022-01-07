<div class="main-content" id="main-content" @if (Auth::user()) style="display: none" @endif>
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
                            <li id="personal"><strong>Le propriétaire</strong></li>
                            <li id="payment"><strong>le véhicule</strong></li>
                            <li id="user"><strong>le conducteur</strong></li>
                            <li id="confirm"><strong>l'accident</strong></li>
                            <li id="coins"><strong>Remboursement</strong></li>

                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <fieldset>
                            <div class="form-card">
                                <div class="form-group">
                                    @if (Auth::user())
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">N° Police d'assurance</label>
                                            <div class="col-sm-8">
                                                <select onclick="mapdata()" type="text" id="num_police" name='num_police'>
                                                </select>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">N° Police d'assurance</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="num_police" name="num_police"
                                                    value="{{ old('num_police') }}" autofocus>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Société d'assurance</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="societe_assurance" id="societe_assurance"
                                                value="Alliance assurances">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Attestation valable du</label>
                                        <div class="col-sm-8">
                                            <input type="date" id="contrat_debut" name="contrat_debut"
                                                value="{{ old('contrat_debut') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-4 control-label">Au</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="contrat_fin" id="contrat_fin"
                                                value="{{ old('contrat_fin') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check form-switch" style="text-align: center;">
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
                                                <input type="date" id="contrat_debut_adv" name="contrat_debut_adv"
                                                    value="{{ old('contrat_debut_adv') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Au</label>
                                            <div class="col-sm-8">
                                                <input type="date" name="contrat_fin_adv" id="contrat_fin_adv"
                                                    value="{{ old('contrat_fin_adv') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--input type="button" name="next" class="btn btn-primary next action-button"
                                value="Suivant" /-->
                            <input type="button" name="next" class="next action-button" value="Suivant" />




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
                                                <input type="text" id="adress_adv" name="adress_adv"
                                                    value="{{ old('adress_adv') }}">
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

                            <input type="button" name="next" class="next action-button" value="Suivant" />
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

                                    @if (Auth::user())
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Marque, type</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="marque" id="marque"
                                                    value="{{ old('marque') }}">
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-md-6">
                                            <label class="col-sm-4 control-label">Marque, type</label>
                                            <div class="col-sm-8">
                                                <select name="marque" id="marque" class="form-control select2"
                                                    required>
                                                    @foreach ($marques as $marque)
                                                        <option value="{{ $marque->code }}">{{ $marque->libelle }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                    @endif


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
                            <input type="button" name="next" class="next action-button" value="Suivant" />
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

                                            <select name="categorie" id="categorie" class="form-control select2"
                                                required>
                                                @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->libelle }}">
                                                        {{ $categorie->libelle }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label class="col-sm-4 control-label">Date de naissance</label>
                                    <div class="col-sm-8">
                                        <input type="date" id="adress_cond_adv" name="adress_cond_adv"
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
                                        <input class="form-check-input" type="radio" id="au_volant" name="au_volant"
                                            value="1" style="width: 100px;
                                                margin-right: -27px;
                                                margin-top: 23px;">
                                        <label class="form-check-label" style="font-size: 16px;">oui</label>
                                        <input class="form-check-input" type="radio" id="au_volant" name="au_volant"
                                            value="0" style="width: 100px;
                                            margin-right: -27px;
                                            margin-top: 23px;">
                                        <label class="form-check-label" style="font-size: 16px;">non</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-sm-4 control-label">Le conducteur réside-t-il chez
                                        vous</label>
                                    <div class="col-sm-8">
                                        <input class="form-check-input" type="radio" id="resid_cond" name="resid_cond"
                                            value="1" style="width: 100px;
                                            margin-right: -27px;
                                            margin-top: 23px;">
                                        <label class="form-check-label" style="font-size: 16px;">oui</label>
                                        <input class="form-check-input" type="radio" id="resid_cond" name="resid_cond"
                                            value="0" style="width: 100px;
                                        margin-right: -27px;
                                        margin-top: 23px;">
                                        <label class="form-check-label" style="font-size: 16px;">non</label>

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
                            <input type="button" name="next" class="next action-button" value="Suivant" />
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
                                        <label class="col-sm-4 control-label">Un procès-verbal de
                                            gendarmerie</label>
                                        <div class="col-sm-8">
                                            <input class="form-check-input" type="radio" id="gendarme" name="gendarme"
                                                value="1" style="width: 100px;
                                                margin-right: -27px;
                                                margin-top: 23px;">
                                            <label class="form-check-label" style="font-size: 16px;">oui</label>
                                            <input class="form-check-input" type="radio" id="gendarme" name="gendarme"
                                                value="0" style="width: 100px;                                  margin-right: -27px;
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
                                                        name="police" value="1" onclick="showInput('brigade1')" style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="police"
                                                        name="police" value="0" onclick="showNone('brigade1')"
                                                        style="width: 100px;margin-right: -27px;margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">non</label>
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
                                                        value="1" onclick="showInput('serie_type')" style="width: 100px;
                                                margin-right: -27px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="vol" name="vol"
                                                        value="0" onclick="showNone('serie_type')"
                                                        style="width: 100px; margin-right: -27px; margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">non</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="display: none" id="serie_type">
                                                <label class="col-sm-4 control-label">Numéro dans la série du
                                                    type</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="num_serie_type" id="num_serie_type"
                                                        value="{{ old('num_serie_type') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: -25px;">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Votre véhicule est-il
                                                    gagé</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id=gager" name="gager"
                                                        value="1" onclick="showInput('gage')" style="width: 100px;
                                                margin-right: -27px;
                                                margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="gager"
                                                        name="gager" value="0" onclick="showNone('gage')" style="width: 100px; margin-right: -27px;
                                            margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">non</label>
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
                                                    <input class="form-check-input" type="radio" id="lourd"
                                                        name="lourd" value="1" onclick="showInput('div-lourd')" style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="lourd"
                                                        name="lourd" value="0" onclick="showNone('div-lourd')" style="width: 100px;
                                                    margin-right: -27px;
                                                    margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">non</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="display: none" id="div-lourd">

                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">était attelé à un autre
                                                    véhicule
                                                    (tracteur
                                                    ou remorque) au moment de l'accident</label>
                                                <div class="col-sm-8">
                                                    <input class="form-check-input" type="radio" id="attele"
                                                        name="police" value="1" onclick="showInput('attele')" style="width: 100px;
                                                            margin-right: -27px;
                                                            margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="attele"
                                                        name="police" value="0" onclick="showNone('attele')" style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">non</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-sm-4 control-label">Poids total en
                                                    charge(Kg)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="poids_charge" id="poids_charge_second"
                                                        value="{{ old('poids_charge') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display: none" id="attele">
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">Numéro d'immatriculation
                                                        du
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
                                                        <input type="text" name="assurance_second" id="assurance_second"
                                                            value="{{ old('assurance_second') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="col-sm-4 control-label">N° de police</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="n_police_second" id="n_police_second"
                                                            value="{{ old('n_police_second') }}">
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
                                                    <input class="form-check-input" type="radio" id="degat"
                                                        name="degat" value="1" onclick="showInput('dega')" style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="degat"
                                                        name="autre_degat" value="0" onclick="showNone('degat')" style="width: 100px;
                                                    margin-right: -27px; margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">non</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none" id="nature">
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
                                                        name="blesse" value="1" onclick="showInput('autre_bless')"
                                                        style="width: 100px;
                                                        margin-right: -27px;
                                                        margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">oui</label>
                                                    <input class="form-check-input" type="radio" id="blesse"
                                                        name="blesse" value="0" onclick="showNone('autre_bless')" style="width: 100px;
                                                    margin-right: -27px;
                                                    margin-top: 23px;">
                                                    <label class="form-check-label"
                                                        style="font-size: 16px;">non</label>
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
                            </div>

                            <input type="button" name="next" class="next action-button" value="Suivant" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Précédent" />

                        </fieldset>

                        <fieldset>


                            <!--div class="radio_section_slice"-->
                            <div>
                                <h3><span> Séléctionner un moyen de paiement pour votre rembouressement</h3>
                                <input class="form-check-input" type="radio" id="type_paiement" name="type_paiement"
                                    value="RIP" onclick="showInput('cas_rip'),showNone('cas_cheq')" style="width: 100px;
                                        margin-right: -27px;
                                        margin-top: 23px;">
                                <label class="form-check-label" style="font-size: 16px;">RIB</label>
                                <input class="form-check-input" type="radio" id="type_paiement" name="type_paiement"
                                    value="CHEQ" onclick="showNone('cas_rip'),showInput('cas_cheq')" style="width: 100px;
                                        margin-right: -27px;
                                        margin-top: 23px;">
                                <label class="form-check-label" style="font-size: 16px;">Chèque</label>

                                <div id="cas_rip" style="display: none">
                                    <label class="col-sm-4">Veuillez introduire votre numéro de RIP</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="rip" id="rip" value="{{ old('num_rip') }}">
                                    </div>
                                    <label class="col-sm-4" for="myfile">Joindre le chèque</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="myfile" id="myfile" accept="pdf/*">
                                    </div>
                                </div>
<<<<<<< HEAD
                                <label class="col-sm-4">Veuillez ntroduire votre numéro de RIP</label>
                                <div class="col-sm-6">
                                    <input type="text" name="rip" id="rip" value="{{ old('num_rip') }}">
=======
                                
                                <div id="cas_cheq" style="display: none">
                                    <label class="col-md-12" style="font-size: 25px;">Est-ce que vous voulez :</label>
                                        <input class="form-check-input" type="radio" id="facon_paiement" name="facon_paiement"
                                        value="livrer"  style="width: 100px;  margin-right: -27px; margin-top: 23px;">
                                    <label class="form-check-label" style="font-size: 16px;">Livrer</label>
                                    <input class="form-check-input" type="radio" id="facon_paiement" name="facon_paiement"
                                        value="recuperation"   style="width: 100px;  margin-right: -27px; margin-top: 23px;">
                                    <label class="form-check-label" style="font-size: 16px;">Récupération de l'agence</label>                                  
>>>>>>> 467a737967ae7d88e44ea14217a18baaf3b17b54
                                </div>
                            </div>

                        <div class="col-md-12">
                            <br>
                            <hr>
                            <br>
                            <br>
                            <div class="col-md-6" name="formulaire" id="formulaire" >
                            <a href="#" onclick="openOnglet()">Télécharger formulaire</a>
                            </div>
                            <div class="col-md-6" name="formulaire" id="formulaire" >
                            <input type="file" value="Importer formulaire" name="myfile" id="myfile" accept="pdf/*">    
                            </div>
                        </div>

                            <button data-dismiss="modal" type="submit" class="next action-button"
                                value="Valider">{{ __('Valider') }}</button>
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Précédent" />

                </div>



                </fieldset>

                </form>

            </div>

        </div>
    </div>
</div>
</div>

@section('js')
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('assets/lib/jquery.maskedinput/jquery.maskedinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/app-form-masks.js') }}" type="text/javascript"></script>

    <!-- jQuery CDN -->
    <script>
        var donnes = '';

        $(document).ready(function() {


            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;



            $.ajax({
                url: '{{ route('getSinistres') }}',
                type: 'POST',
                data: {
                    '_token': function() {
                        return $('input[name="_token"]').val();
                    },
                },
                success: function(data) {
                    donnes = data;
                    for (i = 0; i < data.length; i++) {
                        // $('#num_police').append(new Option(data[i].REFERENCE), i)
                        $('#num_police').append($('<option>', {
                            value: i,
                            text: data[i].REFERENCE
                        }));
                    }

                    $("#loading").hide();
                    $("#main-content").show();


                }
            });

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

            $('#matricule').mask("99999 - 999 - 99", {
                placeholder: "xxxxx - xxx - xx"
            });
            $('#heure_accident').setMask('time').val('hh:mm');


        });

        function showDiv() {

        }

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

        function showInput(box) {
            document.getElementById(box).style.display = "block";
        }

        function showNone(box) {
            document.getElementById(box).style.display = "none";
        }

        function openOnglet(){
         window.open("https://epaiement.allianceassurances.com.dz/documents/export/declaration_automobile.pdf", "_blank");
}
        function mapdata() {

            var i = $('#num_police').val();
            var data = donnes[i]


          

            $('#contrat_debut').val(data.date2);
            $('#contrat_fin').val(data.EXPIRATION);

            $('#name').val(data.NOM);
            $('#prenom').val(data.PRENOM);
            $('#adress').val(data.ADRESSE);
            $('#profession').val(data.PROFFESSION);

            $('#modele').val(data.model);
            $('#marque').val(data.marque);
            $('#matricule').val(data.matricule);

        }
    </script>


@endsection