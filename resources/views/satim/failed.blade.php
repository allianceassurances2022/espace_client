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
                            <h2 id="heading">Information sur la transaction </h2>
							<h2>
								<strong style="color:red;">Paiement rejeté </strong>
									<img src="https://www.freeiconspng.com/uploads/error-icon-4.png" style="margin: auto;" width="50" height="50"> <h2>		
							<h2> <FONT size="2">{{ $message ?? '' }} </FONT> </h2>	 
                        </center>
<br/><br/><br/><br/>
                        <div>
                            <center>
                       
                                <form method="GET" action="{{ route('index_produit') }}" class="form-horizontal">
                                    @csrf
                                    <button data-dismiss="modal" type="submit" id="accueil-button" class="action-button"
                                        value="Retour à l'accueil">Retour à l'accueil</button>
                                </form>
                            </center>
                        </div>
						<br/><br/>
					<div>
						<center>
                        <span class="s1"> Pour plus d'informations, veuillez contacter les numéros suivants : </span>
							<br/>
                          <span class="s1"> Service clients Alliance assurance : +213 23 46 31/23/33   </span>
							<br/>
                          <span class="s1">  Service clients SATIM : 3020 </span>
							
							<span class="s1"> <img src="{{asset('images/3020.png')}}" style="margin: auto;" width="60" height="60"/> </span>
                       </center>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
