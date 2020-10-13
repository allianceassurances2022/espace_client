<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
    <link rel="stylesheet" href="{{asset('assets/css/etat_style.css')}}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('assets/img/logo_dark.svg')}}">
      </div>
      <div id="company">
        <h2 class="name">ALLIANCE ASSURANCES</h2>
        <div>EL-QODS CHERAGA, ALGER</div>
        <div>+ 213 (0) 21 344 646 / 21 342 443 </div>
        <div><a href="mailto:contact@allianceassurances.com.dz">contact@allianceassurances.com.dz</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Devis pour Assuré :</div>
          <h2 class="name">EL MEDJADJI DJILALI</h2>
          <div class="address">21 Rue Emir Abdelkader</div>
          <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
        </div>
        <div id="invoice">
          <h1>DEVIS #1</h1>
          <div class="date">Effet: 01/07/2020</div>
          <div class="date">Expiration: 30/07/2020</div>
        </div>
      </div>

      <div class="separateur"></div>

      <div id="details" class="clearfix">
        <div id="risque">
          <div class="to">Risque :</div>
          <div class="libelle">Adresse : 21 Rue Emir Abdelkader</div>
          <div class="libelle">Type habitation : Habitation individuel</div>
          <div class="libelle">Valeur contenant : La valeur de reconstruction à dire d'expert.</div>
          <div class="libelle">Valeur contenu : 5 000 000,00</div>
          <div class="libelle">Valeur assurée : 5 000 000,00</div>
        </div>
        <div id="risque_droite">
          <div class="espace"></div>
          <div class="libelle">Qaulité assuré : proprietaire</div>
          <div class="libelle">Etage : 0</div>
          <div class="libelle">Surface : 0</div>
          <div class="libelle">Nombre de pièces : 5</div>
          <div class="libelle">Année de construction : 0</div>
        </div>
      </div>

      <div class="separateur"></div>

      <div class="titre">Garanties :</div>

      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">Garantie</th>
            <th class="unit">Valeur assurée</th>
            <th class="qty">Limite</th>
            <th class="total">Prime</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc">Incendie</td>
            <td class="unit">5 000 000,00</td>
            <td class="qty"></td>
            <td class="total">7 350,00</td>
          </tr>
          <tr>
            <td class="no">02</td>
            <td class="desc">Dégâts des Eaux</td>
            <td class="unit">5 000 000,00</td>
            <td class="qty">5 000 000,00</td>
            <td class="total">6 750,00</td>
          </tr>
          <tr>
            <td class="no">03</td>
            <td class="desc">Bris de Glace</td>
            <td class="unit">5 000 000,00</td>
            <td class="qty">5 000 000,00</td>
            <td class="total">500,00</td>
          </tr>
          <tr>
            <td class="no">04</td>
            <td class="desc">Vol en Mobilier</td>
            <td class="unit">5 000 000,00</td>
            <td class="qty">5 000 000,00</td>
            <td class="total">5 000,00</td>
          </tr>
          <tr>
            <td class="no">05</td>
            <td class="desc">RC Chef de Famille</td>
            <td class="unit">5 000 000,00</td>
            <td class="qty">5 000 000,00</td>
            <td class="total">100,00</td>
          </tr>
        </tbody>
      </table>

      <div class="separateur"></div>

      <div class="titre">Décompte :</div>

      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>

            <td class="desc">Prime Nette</td>
            <td class="total">19 700,00</td>
          </tr>
          <tr>

            <td class="desc">TVA</td>
            <td class="total">3 838,00</td>
          </tr>
          <tr>
            <td class="desc">TD</td>
            <td class="total">120,00</td>
          </tr>
          <tr>

            <td class="desc">CP</td>
            <td class="total">500,00</td>
          </tr>

        </tbody>
        <tfoot>
          <tr>
            <td>TOTAL</td>
            <td>24 158,00</td>
          </tr>
        </tfoot>
      </table>


      
    </main>
    <footer>
      Le Devis a été crée sur un ordinateur et est valide sans la signature et le cachet.
    </footer>
  </body>
</html>
