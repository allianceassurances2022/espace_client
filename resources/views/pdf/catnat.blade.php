<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MRH</title>
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
       font-size: 14px;
       font-family: SourceSansPro;
    }

     header {
      margin-bottom: 10px;
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

    #client .to {
      color: #777777;
    }

    #risque {
      margin-top: 10px;
      padding-left: 6px;
      border-left: 6px solid #00899A;
      float: left;
    }

    #risque .to {
      color: #777777;
    }

    #risque_droite {
      margin-top: 21px;
      margin-left: 245px;
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
      padding: 2px;
      background: #EEEEEE;
      text-align: center;
      border-bottom: 1px solid #FFFFFF;
    }

    table th {
      white-space: nowrap;
      font-weight: normal;
    }

    table td {
      text-align: right;
    }

    table td h3{
      color: #00899A;
      font-size: 1.2em;
      font-weight: normal;
      margin: 0 0 0.2em 0;
    }

    table .no {
      color: #FFFFFF;
      font-size: 1.6em;
      background: #00899A;
    }

    table .desc {
      text-align: left;
    }

    table .unit {
      background: #DDDDDD;
    }

    table .qty {
    }

    table .total {
      background: #DDDDDD;
    }

    table td.unit,
    table td.qty,
    table td.total {
      font-size: 1.2em;
    }

    table tbody tr:last-child td {
      border: none;
    }

    table tfoot td {
      padding: 10px 20px;
      background: #FFFFFF;
      border-bottom: none;
      font-size: 1.2em;
      white-space: nowrap;
      border-top: 1px solid #AAAAAA;
    }

    table tfoot tr:first-child td {
      border-top: none;
    }

    table tfoot tr:last-child td {
      color: #00899A;
      font-size: 1.4em;
      border: 1px solid #00899A;

    }

    table tfoot tr td:first-child {
      border: none;
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
          <h2 class="name">{{$user->name}} {{$user->prenom}}</h2>
          <div class="address">{{$user->adresse}}</div>
          <div class="email">{{$user->email}}</div>
        </div>
        <div id="invoice">
          @if($devis->type_devis == 1)
          <h1>DEVIS #{{$devis->id}}</h1>
          @elseif($devis->type_devis == 2)
          <h1>Police d'assurance</h1>
          <h2>Catastrophe Naturelle</h2>
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
          <div class="to">Risque :</div>
          <div class="libelle">Adresse : {{$risque->adresse}}</div>
          <div class="libelle">Activite : {{$risque->formule}}</div>
          <div class="libelle">Type Batiment : {{$risque->type_habitation}}</div>
          <div class="libelle">Valeur Déclarée : {{number_format($risque->valeur_assure, 2,',', ' ')}}</div>
          <div class="libelle">Valeur normative : {{number_format(0, 2,',', ' ')}}</div>
        </div>
        <div id="risque_droite">
          <div class="libelle">Zone : {{$risque->code_zone}}</div>
          <div class="libelle">Etage : {{$risque->etage}}</div>
          <div class="libelle">Superficie : {{$risque->superficie}}</div>
          <div class="libelle">Nombre de Chambre : {{$risque->nombre_piece}}</div>
          <div class="libelle">Année de construction : {{$risque->annee_construction}}</div>
        </div>
      </div>

      <div class="separateur"></div>

      <div class="titre">Garanties :</div>

      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="desc">Garantie</th>
            <th class="unit">Valeur assurée</th>
            <th class="qty">Limite</th>
            <th class="total">Prime</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($prime as $prim )
          <tr>
            <td class="desc">{{$prim->libelle}}</td>
            <td class="unit">{{number_format($risque->valeur_contenant, 2,',', ' ')}}</td>
            <td class="qty">{{number_format($risque->valeur_contenant, 2,',', ' ')}}</td>
            <td class="total">{{number_format($prim->valeur, 2,',', ' ')}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="separateur"></div>

      <div class="titre">Décompte :</div>

      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>

            <td class="desc">Total HT</td>
            <td class="total">{{number_format($devis->prime_nette, 2,',', ' ')}}</td>
          </tr>
          <tr>

            <td class="desc">TVA</td>
            <td class="total">{{$devis->tva}}</td>
          </tr>
          <tr>
            <td class="desc">TD</td>
            <td class="total">{{$devis->td}}</td>
          </tr>
          <tr>

            <td class="desc">CP</td>
            <td class="total">{{$devis->cp}}</td>
          </tr>

        </tbody>
        <tfoot>
          <tr>
            <td>Total à payer TTC</td>
            <td>{{number_format($devis->prime_total, 2,',', ' ')}} DA</td>
          </tr>
        </tfoot>
      </table>





    </main>
    {{-- <footer>
      Le Devis a été crée sur un ordinateur et est valide sans la signature et le cachet.
    </footer> --}}
    <footer style="text-align:left;margin-bottom: -15px;font-size: 12px;margin-left: -10px;">
     <span style="font-size: 10px;">Imprimmé Par <strong>{{strtoupper(auth()->user()->email)}} <span style="display:inline-block;margin-left: 150px;"></strong> Le <strong>{{date('Y-m-d H:i:s')}}</strong></span></span>
     <span style="font-size: 10px;margin-left:80px;">https://allianceassurances.com.dz/</span>
     <span style="display: block;position: absolute;right: 20px;">
      </span>
  </footer>
  </body>
</html>
