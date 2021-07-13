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

@section('js')
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery CDN -->
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

        function showInput(box) {
            document.getElementById(box).style.display = "block";
        }

        function showNone(box) {
            document.getElementById(box).style.display = "none";
        }
    </script>
    <script type='text/javascript'>
        $(function() {

            $.ajax({

                type: "get",
                url: '{{ route('ajaxdata') }}',
                dataType: 'json',

                success: function(data) { // What to do if we succeed
                    //$('#name').val(JSON.parse(response)[0].name); //<---- This line,
                    console.log(data.data1.num_police);

                    $('#num_police').val(data.data1.num_police);
                    $('#societe_assurance').val(data.data1.societe_assurance);
                    $('#contrat_debut').val(data.data1.contrat_debut);
                    $('#contrat_fin').val(data.data1.contrat_fin);

                    $('#name').val(data.data1.nom_proprietaire);
                    $('#prenom').val(data.data1.prenom_proprietaire);
                    $('#adress').val(data.data1.address_proprietaire);
                    $('#profession').val(data.data1.profession_proprietaire);

                    $('#modele').val(data.data1.modele);
                    $('#marque').val(data.data1.marque);
                    $('#matricule').val(data.data1.matricule);
                    $('#from').val(data.data1.profession_proprietaire);
                    $('#to').val(data.data1.profession_proprietaire);

                    $('#name_cond').val(data.data1.nom_conducteur);
                    $('#prenom_cond').val(data.data1.prenom_conducteur);
                    $('#adress_cond').val(data.data1.address_conducteur);
                    $('#permis').val(data.data1.num_permis);
                    $('#deliver').val(data.data1.date_permis);
                    $('#categorie').val(data.data1.num_permis);

                }
            });
        });
    </script>
@endsection
