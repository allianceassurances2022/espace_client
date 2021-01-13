@extends('default')

@section('head_title')
    renouvellement auto
@endsection

@section('content')

    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-default panel-table">

            <form action="{{ route('devis_renouvlement_auto') }}">

                <div class="panel-heading">Renouvellement automobile</div>
                <h2 style="padding: 10px; margin-left: 10px;">Veuillez entrer votre numéro de référence ici :</h2>
                <div class="submit">
                    <div class="row">
                        <div class="col-sm-10" style="    display: inline-flex;    padding: 42px;    margin-left: 50px;">
                            <input type="text" name="ref"  class="form-control">
                            <button type="submit" class="btn btn-info btn-lg col-sm-6">valider</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection