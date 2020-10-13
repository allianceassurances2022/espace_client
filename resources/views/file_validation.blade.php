@extends('default')


@section('head_title')
    Validation
@endsection

@section('head')

@endsection


@section('content')

    <div class="container col-lg-offset-3 col-lg-6 emp-profil">
        <form action="post" >
            @csrf
               <div class="row">
                   <div class="form-group">
                       <label for="reference_police" >Reference police</label>
                       <input type="text" class="form-control">
                   </div>
                   <a href="#" class="btn btn-info col-md-3" style="float:right">Valider</a>
               </div>
        </form>
    </div>

@endsection