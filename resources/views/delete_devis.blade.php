
@extends('default')

@section('content')

    <div class="main-content container-fluid">
        <h1 class="display-heading text-center">Suppression accomplie avec succès</h1>

        <div class="row pricing-tables" style="margin-top: 5%">
            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <div class="pricing-table pricing-table-success">

                    <div class="pricing-table-title">Succès</div>
                    <div class="panel-divider panel-divider-xl"></div>
                    <div class="pricing-table-price"><span class="currency">Le devis #id_devi a bien été supprimé</span></div>


                    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                        <img src="{{ asset('/assets/success-icon.png') }}" alt="">
                    </div>

                    <a href="{{ route('home') }}" class="btn btn-success">Retour à l'acceuil</a>
                </div>
            </div>

        </div>
    </div>

@endsection

