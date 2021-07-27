@extends('default')
@section('head_title')
    Déclaration sinistres
@endsection
@section('head')
 {{-- <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="assets/css/declaration.css" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" /> --}}
@endsection
<!--
<div>
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid" style="margin-bottom: 15px;">
            <div class="navbar-header"><a href="{{ route('index_produit') }}" class="navbar-brand"></a></div>
            <div class="be-right-navbar">

                <ul class="nav navbar-nav navbar-right be-icons-nav">
                    <li class="dropdown">
                        <a href="{{ route('index_produit') }}" role="button" aria-expanded="false"><span
                                class="icon mdi mdi-home" style="margin-top: 20px;"></span></a>
                    </li>
                    <li class="dropdown" style="margin-top: 20px;"><a href="#" data-toggle="dropdown" role="button"
                            aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                        <ul class="dropdown-menu be-connections">
                            <li>
                                <div class="list">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-4"><a
                                                    href="{{ route('type_produit', ['auto', 'index']) }}"
                                                    class="connection-item"><img
                                                        src="{{ asset('produit_assets/images/icons/auto_col.svg') }}"
                                                        alt="Automobile"><span>Auto</span></a></div>
                                            <div class="col-xs-4"><a
                                                    href="{{ route('type_produit', ['mrh', 'index']) }}"
                                                    class="connection-item"><img
                                                        src="{{ asset('produit_assets/images/icons/hab_col.svg') }}"
                                                        alt="Multirisques Habitation"><span>MRH+</span></a></div>
                                            {{-- <div class="col-xs-4"><a href="{{route('type_produit',['mrp','index'])}}" class="connection-item"><img src="{{asset('produit_assets/images/icons/pro_col.svg')}}" alt="Multirisques Professionnelle"><span>MRP+</span></a></div> --}}
                                            <div class="col-xs-4"><a
                                                    href="{{ route('type_produit', ['catnat', 'index']) }}"
                                                    class="connection-item"><img
                                                        src="{{ asset('produit_assets/images/icons/cat_nat_col.svg') }}"
                                                        alt="Catastrophe Naturelle"><span>CATNAT</span></a></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12"><a target="_blank" href="https://www.amana.dz/"
                                                    class="connection-item"><img
                                                        src="{{ asset('assets/img/logo_amana.png') }}"
                                                        alt="Mail Chimp"
                                                        style="max-width: 120px;"><span>Ammana</span></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer"> <a href="{{ route('index_produit') }}">Tous les Produits</a>
                                </div>
                            </li>


                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
-->
@section('content')

    @if (auth::user())
        Hello
    @elseif (!auth::user())


        @include('sinistre.form_core');

    @endif



@endsection

@section('js')

    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })



        });

        function showMe(box) {

            var chboxs = document.getElementsByName("c1");
            var vis = "none";
            for (var i = 0; i < chboxs.length; i++) {
                if (chboxs[i].checked) {
                    vis = "block";
                    break;
                }
            }
            document.getElementById(box).style.display = vis;


        }
    </script>

@endsection
