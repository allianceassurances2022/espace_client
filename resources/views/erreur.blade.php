@extends('default')


@section('head_title')
Erreur
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel" style="padding: 20px; text-align: center;font-size: 25px;">

                <div class="error-container">
                    <div class="error-number" style="font-weight: bold;">{{$titre}}</div>
                    <div class="error-description">{{$description}}</div>
                    <div class="error-goback-button"><a href="{{route('home')}}" class="btn btn-xl btn-primary">Revenir à l'accueil</a></div>
                </div>

        </div>
    </div>
</div>


@endsection
