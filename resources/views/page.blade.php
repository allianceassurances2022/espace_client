@extends('default');

@section('content')

    white page
    <a href="{{ route('page_pdf',['download'=>'pdf']) }}">Download PDF</a>
@endsection