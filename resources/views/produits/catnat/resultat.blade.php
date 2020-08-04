@extends('default')

@section('title')
Devis CATNAT
@endsection

@section('content')

<div class="main-content container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="invoice">
                <div class="row invoice-header">
                  <div class="col-xs-7">
                    <div class="invoice-logo"></div>
                  </div>
                  <div class="col-xs-5 invoice-order"><span class="invoice-id">Devis #2308</span><span class="incoice-date">19 juillet 2020</span></div>
                </div>
                <div class="row invoice-data">
                  <div class="col-xs-5 invoice-person"><span class="name">Djilali EL Medjadji</span><span>Full stack Developer</span><span>delmedjadji@allianceassurances.com.dz</span><span>21 Rue emir A.E.K Bouharoun, TIPAZA</span><span>Algérie</span></div>
                  <div class="col-xs-2 invoice-payment-direction"><i class="icon mdi mdi-chevron-right"></i></div>
                  <div class="col-xs-5 invoice-person"><span class="name">Alliance Assurances</span><span>Agence 16083</span><span>16083@allianceassurances.com.dz</span><span>02, rue Mohamed BOUDIAF, Cheraga ALGER</span><span>Algérie</span></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class="invoice-details">
                      <tr>
                        <th style="width:60%">Description</th>
                        <th style="width:17%" class="hours">Nombre</th>
                        <th style="width:15%" class="amount">Montant TTC</th>
                      </tr>
                      <tr>
                        <td class="description">Catastrophe Naturelle</td>
                        <td class="hours">1</td>
                        <td class="amount">{{number_format($prime_total, 2,',', ' ')}} DA</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="summary">Subtotal</td>
                        <td class="amount">{{number_format($prime_total, 2,',', ' ')}} DA</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="summary">TVA (19%)</td>
                        <td class="amount">0 DA</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td class="summary total">Total</td>
                        <td class="amount total-value">{{number_format($prime_total, 2,',', ' ')}} DA</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 invoice-payment-method"><span class="title">Mode de paiement</span><span>Carte de crédit</span><span>Type de carte de crédit: CIB ou EDAHABIA</span><span>Vérification du numéro: 4256981387</span></div>
                </div>
                <div class="row invoice-company-info">
                  <div class="col-sm-6 col-md-2 logo"><img src="assets/img/Alliance_assurances_logo.jpg" alt="Logo-symbol"></div>
                  <div class="col-sm-6 col-md-4 summary"><span class="title">Alliance Assurances</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                  </div>
                  <div class="col-sm-6 col-md-3 phone">
                    <ul class="list-unstyled">
                      <li>+ 213 (0) 21 344 646</li>
                      <li>+ 213 (0) 21 342 443</li>
                    </ul>
                  </div>
                  <div class="col-sm-6 col-md-3 email">
                    <ul class="list-unstyled">
                      <li>contact@allianceassurances.com.dz</li>
                      <li>16083@allianceassurances.com.dz</li>
                    </ul>
                  </div>
                </div>
                <div class="row invoice-footer">
                  <div class="col-md-12">
                    <a href="{{route('modification_devis_catnat',$risque->id)}}" class="btn btn-lg btn-space btn-default">Modifier devis</a>
                    <button class="btn btn-lg btn-space btn-default">Enregistrer PDF</button>
                    <button class="btn btn-lg btn-space btn-default">Imprimer</button>
                    <a href="{{route('paiement',$risque->id)}}" class="btn btn-lg btn-space btn-primary">Payer maintenant</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
