<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Auto</title>
    <style>
    @font-face {
      font-family: SourceSansPro;
      src: url(assets/css/SourceSansPro-Regular.ttf);
    }

     .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

    a {
      color: #00899A;
      text-decoration: none;
    }

     body {
       position: relative;
       margin: 0 auto;
       color: #555555;
       background: #FFFFFF;
       font-family: Arial, sans-serif;
       font-size: 13px;
       font-family: SourceSansPro;
    }

     header {
      margin-bottom: 5px;
      border-bottom: 3px solid #AAAAAA;
    }



#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 98px;
}

#qr {
float: left;
margin-left: 200px;
}

#qr img {
height: 100px;
}

    #company {
      float: right;
      text-align: left;
    }


    #details {
      margin-bottom: 10px;
    }

    #date {
      margin-top: -23px;
    }

    #client {
      padding-left: 6px;
      border-left: 6px solid #00899A;
      float: left;
      margin-right: 270px;
    }



    #risque {
      margin-top: 10px;
      padding-left: 6px;
      border-left: 6px solid #00899A;
      float: left;
    }

    .to {
      font-weight: bold;
    }

    #risque_droite {
      margin-top: 21px;
      margin-left: 45px;
      padding-left: 6px;
      border-left: 6px solid #00899A;
      float: left;
    }
    #franchise_droite {
      margin-left: 45px;
      padding-left: 6px;
      border-left: 6px solid #00899A;
      float: left;
    }

    .libelle {
      padding: 2px;
    }

    .titre {
      color: #777777;
      margin-left: 10px;
      margin-bottom: 5px;
    }

    h2.name {
      font-size: 1.4em;
      font-weight: normal;
      margin: 0;
    }

    .date_left{
        float: left;
        text-align: left;
    }

    .date_right{
        float: right;
        text-align: left;
    }

    #invoice {
      float: left;
      text-align: left;
    }

    #invoice h1 {
      color: #00899A;
      font-size: 2.4em;
      line-height: 1em;
      font-weight: normal;
      margin-top: -10px;
    }

    #invoice h2 {
      color: #00899A;
      font-size: 1.4em;
      line-height: 1em;
      font-weight: normal;
      margin-top: -25px;
    }

    #invoice h3 {
      color: #00899A;
      font-size: 1.4em;
      line-height: 1em;
      font-weight: normal;
      margin-top: -10px;
    }



    .espace {
      margin-top: 15px;
    }



    table {
      width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;
    }

    table th,
    table td {
      padding: 0px;
      background: #EEEEEE;
      text-align: center;
    }
    table .desc {
      text-align: left;
    }
    table .unit {
      background: #DDDDDD;
    }
    table .total {
      background: #DDDDDD;
    }

    table#franchise_table   {
       width:360px;
       margin-bottom: 0px;
    }

    #thanks{
      font-size: 2em;
      margin-bottom: 50px;
    }

    #notices{
      padding-left: 6px;
      border-left: 6px solid #00899A;
    }

    #notices .notice {
      font-size: 1.2em;
    }

    footer {
      position: fixed;
      bottom: -60px;
      left: 0px; right: 0px;
      height: 35px;
      text-align: center;
      font-size: 12px;
      padding: 20px 30px;
    }

    .separateur {
      border-bottom: 1px solid #AAAAAA;
      margin-bottom: 10px;
    }

    </style>
  </head>
  <body>
      <header class="clearfix">

       <div id="logo">
         <img src="{{ public_path('assets/img/Alliance_assurances_logo_etat.jpg') }}" alt="">
      </div>
     @if($devis->type_devis == 2)
      <div id="qr">
        <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate($devis->reference_police)) }} " >
     </div>
     @endif
       <div id="company">
        <h2 class="name">ALLIANCE ASSURANCES</h2>
        <div>EL-QODS CHERAGA, ALGER</div>
        <div>+ 213 (0) 21 344 646 / 21 342 443 </div>
        <div>contact@allianceassurances.com.dz</a></div>
      </div>

    </header>
    <main>
      <div id="details" class="clearfix"   @if($devis->type_devis == 1) style="margin-bottom:20px;" @endif>
        <div id="client">
          <div class="to">Assuré :</div>
          <h2 class="name">{{$assure->nom}} {{$assure->prenom}}</h2>
          <div class="address">{{$assure->adresse}}</div>
          <div class="email">{{$assure->mail}}</div> 
        </div>
        <div id="invoice">
          @if($devis->type_devis == 1)
          <h1>DEVIS #{{$devis->id}}</h1>
          @elseif($devis->type_devis == 2)
          <h1>Police d'assurance</h1>
          <h2>Multirisque habitation +</h2>
          <h3>{{$devis->reference_police}}</h3>
          @endif
        </div>
      </div>
     <div id="date" class="clearfix">
      <div class="date_left">Effet: {{$devis->date_effet}}</div>
      <div class="date_right">Expiration: {{$devis->date_expiration}}</div>
    </div>

      <div class="separateur"></div>

      <div id="details" class="clearfix">
        <div id="risque">
          <div class="to">Conducteur :</div>
          <div class="libelle">Conducteur : {{$assure->nom}} {{$assure->prenom}}</div>
          <div class="libelle">Permis de conduire : {{$risque->permis_num}} / {{$risque->categorie}}</div>
        </div>
        <div id="risque_droite">
          <div class="espace"></div>
          <div class="libelle">né(e) le : {{$assure->date_naissance}}</div>
          <div class="libelle">Date délivrance : {{$risque->date_permis}}</div>
        </div>
      </div>

      <div class="separateur"></div>

      <div id="details" class="clearfix">
        <div id="risque">
          <div class="to">Véhicule :</div>
          <div class="libelle">Marque : {{$risque->marque}}</div>
          <div class="libelle">Chassis : {{$risque->num_chassis}}</div>
          <div class="libelle">Puissance : {{$risque->puissance}}</div>
        </div>
        <div id="risque_droite">
          <div class="libelle">Modele : {{$risque->modele}}</div>
          <div class="libelle">Type : {{$risque->type}}</div>
          <div class="libelle">Nombre de places : {{$risque->personne_transporte}}</div>
        </div>
        <div id="risque_droite">
          <div class="libelle">Couleur : {{$risque->couleur}}</div>
          <div class="libelle">Immatriculation : {{$risque->matricule}}</div>
          <div class="libelle">Année : {{$risque->annee_mise_circulation}}</div>
        </div>
      </div>

      <div class="separateur"></div>

      <div id="details" class="clearfix">
        <div id="risque">
          <div class="to">Tarification :</div>
          <div class="libelle">Genre : Véhicules particuliers sans remorques</div>
          <div class="libelle">Usage : {{$risque->num_chassis}}</div>
          <div class="libelle">Zone : {{$risque->puissance}}</div>
          <div class="libelle">Valeur véhicule : {{$risque->puissance}}</div>
        </div>
        <div id="franchise_droite">
          <div class="to">En cas de sinistre:</div>
          <table id="franchise_table">
            <thead>
              <tr>
                <th colspan="3">Sinistre Avec Tier</th>
                <th colspan="2">Sans Tier</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td></td>
              <td>Franchise</td>
              <td>Minimum</td>
              <td>Franchise</td>
              <td>Minimum</td>
              </tr>
              <tr>
              <td>1ere</td>
              <td>5%</td>
              <td>3 000 DA</td>
              <td>15%</td>
              <td>3 000 DA</td>
              </tr>
              <tr>
              <td>2eme</td>
              <td>10%</td>
              <td>3 000 DA</td>
              <td>20%</td>
              <td>3 000 DA</td>
              </tr>
              <tr>
              <td>3eme</td>
              <td>15%</td>
              <td>3 000 DA</td>
              <td>25%</td>
              <td>30 000 DA</td>
              </tr>
              <tr>
              <td>>=4</td>
              <td>20%</td>
              <td>3 000 DA</td>
              <td>30%</td>
              <td>45 000 DA</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="separateur"></div>

      <div class="titre">Garanties :</div>

      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desc">Garantie</th>
            <th class="unit">Limite</th>
            <th class="qty">Franchise</th>
            <th class="total">Prime</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($prime as $prim )
          <tr>
            <td class="desc">{{$prim->libelle}}</td>
            <td class="unit">{{number_format($risque->montant_forfaitaire, 2,',', ' ')}}</td>
            <td class="qty">{{number_format($risque->montant_forfaitaire, 2,',', ' ')}}</td>
            <td class="total">{{number_format($prim->valeur, 2,',', ' ')}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="separateur"></div>

      <div id="details" class="clearfix">
        <div id="risque" style="width:200px;">
          <div class="to">Majorations :</div>
          <div class="libelle">Maj PC : </div>
          <div class="libelle">Maj Age : </div>
        </div>
        <div id="risque_droite" style="width:200px;">
          <div class="libelle">Maj Mat. Inf. : </div>
          <div class="libelle">Bonus/Malus : </div>
        </div>
        <div id="risque_droite">
          <div class="libelle">Taux Réduction : </div>
          <div class="libelle">Total Réduction : </div>
        </div>
      </div>

      <div class="separateur"></div>

      <div id="details" class="clearfix">
        <div id="risque" style="width:200px;">
          <div class="to">Majorations :</div>
          <div class="libelle">Timbre de dimension : {{number_format($devis->td, 2,',', ' ')}}</div>
          <div class="libelle">Timbre gradué : {{number_format($devis->tg, 2,',', ' ')}}</div>
        </div>
        <div id="risque_droite" style="width:200px;">
          <div class="libelle">Cout de police : {{number_format($devis->cp, 2,',', ' ')}}</div>
          <div class="libelle">Fond de garantie : {{number_format($devis->fga, 2,',', ' ')}}</div>
        </div>
        <div id="risque_droite">
          <div class="libelle">Prime nette: {{number_format($devis->prime_nette, 2,',', ' ')}}</div>
          <div class="libelle">TVA : {{number_format($devis->tva, 2,',', ' ')}}</div>
        </div>
      </div>

      <div id="details" class="clearfix" style="margin-top:-10px;">
        <div id="risque" style="width:457px;margin-top:0px;">
      <div class="libelle">Taxe Pollution (selon la loi de finance 2020 - Article 84) : {{number_format($devis->tp, 2,',', ' ')}}</div>
        </div>
       <div id="risque_droite" style="margin-top:2px;font-weight: bold; ">
         <div class="libelle">Total : {{number_format($devis->prime_total, 2,',', ' ')}} DA</div>
       </div>
     </div>




    </main>

    <footer style="text-align:left;margin-bottom: -15px;font-size: 12px;margin-left: -10px;">
     <span style="font-size: 10px;">Imprimmé Par <strong>{{strtoupper(auth()->user()->email)}} <span style="display:inline-block;margin-left: 150px;"></strong> Le <strong>{{date('Y-m-d H:i:s')}}</strong></span></span>
     <span style="font-size: 10px;margin-left:80px;">https://allianceassurances.com.dz/</span>
     <span style="display: block;position: absolute;right: 20px;">
      </span>
  </footer>
  </body>
</html>
