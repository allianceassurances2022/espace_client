@extends('default')
@section('head_title')
    Déclaration sinistres
@endsection
@section('head')
    <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/declaration.css" />
@endsection

@section('content')

    @include('sinistre.form_core');

@endsection
