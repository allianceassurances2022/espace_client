@extends('default')

@section('head_title')
    Page satim
@endsection

@section('content')

    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-default panel-table">

            <form action="{{ route('satim_confirmation') }}">

                <div class="panel-heading">Confirmation SATIM</div>
                <div class="submit">
                    <div class="row">
                        <div class="col-sm-10" style="    display: inline-flex;    padding: 42px;    margin-left: 50px;">
                            <input type="hidden" name="devis_id" value={{ $devis->id }} class="form-control">
                            <button type="submit" class="btn btn-info btn-lg col-sm-6">valider</button>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>
@endsection
