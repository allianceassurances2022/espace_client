@extends('default')

@section('head_title')
    renouvellement auto
@endsection

@section('content')

    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-default panel-table">

            <form action="{{ route('new_sinistre_logged') }}">

                <div class="panel-heading">Déclaration d'un sinistre</div>
                <h2 style="padding: 10px; margin-left: 10px;">Veuillez sélectionner votre numéro de police :</h2>
                <div class="submit">
                    <div class="row">
                        <div class="col-sm-10" style="    display: inline-flex;    padding: 42px;    margin-left: 50px;">
                            <!--  <input type="text" name="ref" class="form-control"> -->
                            <select class="form-control" type="text" name="ref" placeholder="Wilaya">
                                @foreach ($codeAssures as $codeAssure)
                                    <option value="{{ $codeAssure }}" selected>{{ $codeAssure }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-info btn-lg col-sm-6">valider</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection
