@extends('default')
@section('head_title')
    Confirmation SATIM
@endsection
@section('head')
    <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/declaration.css" />
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-content">
        <div class="jumbotron">
            <div class="row justify-content-center">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                        <center>
                            <h2 id="heading">Confirmation du paiement</h2>
                        </center>

                        <div>
                            <center>
                                <img src="{{ asset('/images/verifier.png') }}" style="margin: auto;" width="200"
                                    height="200">
								 <h2 style="color:teal;">{{$message}}</h2>

								<table class="table table-hover" style="width: 500px;margin-top: 31px;">
								  <tbody>
									<tr>
									  <th scope="row">respCode_desc</th>
									  <td>{{$respCode_desc}}</td>
									</tr>
									<tr>
									  <th scope="row">orderId</th>
									  <td>{{$orderId}}</td>
									</tr>
									<tr>
									  <th scope="row">orderNumber</th>
									  <td colspan="2">{{$orderNumber}}</td>
									</tr>
									  <tr>
									  <th scope="row">approvalCode</th>
									  <td colspan="2">{{$approvalCode}}</td>
									</tr>
									  <tr>
									  <th scope="row">orderNumber</th>
									  <td colspan="2">{{$orderNumber}}</td>
									</tr>
									  <tr>
									  <th scope="row">date</th>
									  <td colspan="2">{{$date}}</td>
									</tr>
									<tr>
									  <th scope="row">montant</th>
									  <td colspan="2">{{$montant}}</td>
									</tr>
									  <tr>
									  <th scope="row">mode</th>
									  <td colspan="2">{{$mode}}</td>
									</tr>
								  </tbody>
								</table>
								<div>
						<center>
                        <span style="font-size:14px;"> Pour plus d'informations, veuillez contacter les numéros suivants : </span>
							<br/>
                          <span > Service clients Alliance assurance : +213 23 46 31/23/33   </span>
							<br/>
                          <span style="color: green;" >  Service clients SATIM : 3020 </span>

							<span >
								<img 		src="{{asset('images/3020.png')}}" style="margin: auto;" width="60" height="60"/>
							</span>
                       </center>
                    </div>
                                <form method="GET" action="{{ route('home') }}" class="form-horizontal">
                                    @csrf
                                    <button data-dismiss="modal" type="submit" id="accueil-button" class="btn btn-lg btn-space btn-default"
                                        value="Retour à l'accueil">Retour à l'accueil</button>
                                    @if($devis->type_assurance=="Automobile")
                                        <a href="{{route('contrat_auto',$devis->id)}}" class="btn btn-lg btn-space btn-default">Consulter</a>
                                        <a href="{{route('page_pdf_auto',$devis->id)}}" class="btn btn-lg btn-space btn-default" target="_blank">Imprimer</a>
                                        <a href="{{route('download_pdf_auto',$devis->id)}}" class="btn btn-lg btn-space btn-default" target="_blank">Télécharger</a>
                                    @endif
                                    @if($devis->type_assurance=="Catastrophe Naturelle")
                                        <a href="{{route('contrat_catnat',$devis->id)}}" class="btn btn-lg btn-space btn-default">Consulter</a>
                                        <a href="{{route('page_pdf',$devis->id)}}" class="btn btn-lg btn-space btn-default" target="_blank">Imprimer</a>
                                        <a href="{{route('download_pdf',$devis->id)}}" class="btn btn-lg btn-space btn-default" target="_blank">Télécharger</a>
                                    @endif
                                    @if($devis->type_assurance=="Multirisques Habitation")
                                        <a href="{{route('contrat_mrh',$devis->id)}}" class="btn btn-lg btn-space btn-primary">Consulter</a>
                                        <a href="{{route('page_pdf',$devis->id)}}" class="btn btn-lg btn-space btn-primary" target="_blank">Imprimer</a>
                                        <a href="{{route('download_pdf',$devis->id)}}" class="btn btn-lg btn-space btn-primary" target="_blank">Télécharger</a>
                                    @endif
                                </form>
                            </center>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
