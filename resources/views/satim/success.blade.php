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
                                <img src="{{ asset('/images/verifier.png') }}" style="margin: auto;" width="250"
                                    height="300">
                                <h2>Votre paiement a été enregistré avec succées</h2>
								 <h2>{{$message}}</h2>
                                <form method="GET" action="{{ route('home') }}" class="form-horizontal">
                                    @csrf
                                    <button data-dismiss="modal" type="submit" id="accueil-button" class="action-button"
                                        value="Retour à l'accueil">Retour à l'accueil</button>
					@if($devis->type_assurance=="Automobile")
                    <a href="{{route('contrat_auto',$devis->id)}}" class="btn btn-lg btn-space btn-default">Consulter</a>
                    @endif
                    @if($devis->type_assurance=="Catastrophe Naturelle")
                    <a href="{{route('contrat_catnat',$devis->id)}}" class="btn btn-lg btn-space btn-default">Consulter</a>
                    @endif
                    @if($devis->type_assurance=="Multirisques Habitation")
                    <a href="{{route('contrat_mrh',$devis->id)}}" class="btn btn-lg btn-space btn-primary">Consulter</a>
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
