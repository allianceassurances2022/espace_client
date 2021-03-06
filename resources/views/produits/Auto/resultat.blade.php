@extends('default')

@section('title')
    Devis Auto
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
                        <div class="col-xs-5 invoice-order"><span class="invoice-id">
                                @if ($devis->type_devis == 1)
                                    Devis #{{ $devis->id }}
                                @elseif($devis->type_devis == 2)
                                    Police d'assurance
                                    <h2>Automobile</h2>
                                    <h3>{{ $devis->reference_police }}</h3>
                                @endif
                            </span><span class="incoice-date">{{ $devis->created_at }}</span></div>
                    </div>
                    <div class="row invoice-data">
                        <div class="col-xs-5 invoice-person"><span class="name">{{ $assure->nom }}
                                {{ $assure->prenom }}</span><span>{{ $assure->profession }}</span><span>{{ $assure->mail }}</span><span>{{ $assure->adresse }}</span>
                        </div>
                        <div class="col-xs-2 invoice-payment-direction"><i class="icon mdi mdi-chevron-right"></i></div>
                        <div class="col-xs-5 invoice-person"><span class="name">Alliance Assurances</span><span>Agence
                                {{ $devis->code_agence }}</span><span>{{ $agence->Mail }}</span><span>{{ $agence->Adresse }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="invoice-details">
                                <tr>
                                    <td>Prime</td>
                                </tr>
                                <tr>
                                    <th style="width:60%">Description</th>
                                    <th style="width:17%" class="hours">Nombre</th>
                                    <th style="width:15%" class="amount">Montant TTC</th>
                                </tr>
                                @foreach ($prime as $prim)
                                    <tr>
                                        <td class="description">{{ $prim->libelle }}</td>
                                        <td class="hours">1</td>
                                        <td class="amount">{{ number_format($prim->valeur, 2, ',', ' ') }} DA</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td class="summary">Prime nette</td>
                                    <td class="amount">{{ number_format($devis->prime_nette, 2, ',', ' ') }} DA</td>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Taxes</td>
                                </tr>
                                <tr>
                                    <th style="width:60%">Description</th>
                                    <th style="width:17%" class="hours">Nombre</th>
                                    <th style="width:15%" class="amount">Montant TTC</th>
                                </tr>
                                <tr>
                                    <td class="description">Co??t Police</td>
                                    <td class="hours">1</td>
                                    <td class="amount">{{ number_format($devis->cp, 2, ',', ' ') }} DA</td>
                                </tr>
                                <tr>
                                    <td class="description">Timbre Dimension</td>
                                    <td class="hours">1</td>
                                    <td class="amount">{{ number_format($devis->td, 2, ',', ' ') }} DA</td>
                                </tr>
                                <tr>
                                    <td class="description">TVA</td>
                                    <td class="hours">1</td>
                                    <td class="amount">{{ number_format($devis->tva, 2, ',', ' ') }} DA</td>
                                </tr>
                                {{-- <tr>
                        <td></td>
                        <td class="summary">TVA (19%)</td>
                        <td class="amount">0 DA</td>
                      </tr> --}}
                                <tr>
                                    <td></td>
                                    <td class="summary total">Total</td>
                                    <td class="amount total-value">{{ number_format($prime_total, 2, ',', ' ') }} DA</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 invoice-payment-method"><span class="title">Mode de paiement</span><span>Carte
                                de cr??dit</span><span>Type de carte de cr??dit: CIB ou EDAHABIA</span><span>V??rification du
                                num??ro: 4256981387</span></div>
                    </div>
                    <div class="row invoice-company-info">
                        <div class="col-sm-6 col-md-2 logo"><img src="assets/img/Alliance_assurances_logo.jpg"
                                alt="Logo-symbol"></div>
                        <div class="col-sm-6 col-md-4 summary"><span class="title">Alliance Assurances</span>
                            <p>ALLIANCE ASSURANCES PLUS QU'UNE ASSURANCE, UNE ALLIANCE </p>
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
                                <li>{{ $agence->Mail }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row invoice-footer">
                        <div class="col-md-12">
                            @if ($devis->type_devis == 1)
                                <a href="{{ route('modification_devis_auto', $devis->id) }}"
                                    class="btn btn-lg btn-space btn-default">Modifier devis</a>
                            @endif
                            {{-- <button class="btn btn-lg btn-space btn-default">Enregistrer PDF</button> --}}
                            <a href="{{ route('page_pdf_auto', $devis->id) }}" target="_blank"
                                class="btn btn-lg btn-space btn-default">Imprimer</a>
                            @if ($devis->type_devis == 2)
                                <a href="{{ route('attestation', $devis->id) }}" target="_blank"
                                    class="btn btn-lg btn-space btn-default">Imprimer attestation</a>
                            @endif
                            @if ($devis->type_devis == 1)
                                <a href="{{ route('paiement_auto', $devis->id) }}"
                                    class="btn btn-lg btn-space btn-primary">Payer maintenant</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
