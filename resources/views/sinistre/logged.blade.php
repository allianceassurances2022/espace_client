@extends('default')
@section('head_title')
    Déclaration sinistres
@endsection
@section('head')
    <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/declaration.css" />
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
@endsection

@section('content')

    @include('sinistre.form_core');

@endsection

@section('js')
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery CDN -->
    <script>
        var donnes = '';

        $(document).ready(function() {


            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;


            $.ajax({
                url: '{{ route('getSinistres') }}',
                type: 'POST',
                data: {
                    '_token': function() {
                        return $('input[name="_token"]').val();
                    },
                },
                success: function(data) {
                    donnes = data;
                    for (i = 0; i < data.length; i++) {
                        // $('#num_police').append(new Option(data[i].REFERENCE), i)
                        $('#num_police').append($('<option>', {
                            value: i,
                            text: data[i].REFERENCE
                        }));
                    }

                    $("#loading").hide();
                    $("#main-content").show();


                }
            });






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

        function showDiv() {

        }

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

        function mapdata() {

            var i = $('#num_police').val();
            var data = donnes[i]

            $('#contrat_debut').val(data.EFFET);
            $('#contrat_fin').val(data.EXPIRATION);

            $('#name').val(data.NOM);
            $('#prenom').val(data.PRENOM);
            $('#adress').val(data.ADRESSE);
            $('#profession').val(data.PROFFESSION);

            $('#modele').val(data.model);
            $('#marque').val(data.marque);
            $('#matricule').val(data.matricule);

        }
    </script>


@endsection
