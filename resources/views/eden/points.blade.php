@extends('default')


@section('head_title')
    Home
@endsection

@section('head')

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

    <style>
        .counter {
            background-color: #f5f5f5;
            padding: 20px 0;
            border-radius: 5px;
            color: teal;
        }

        .count-title {
            font-size: 40px;
            font-weight: normal;
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
        }

        .count-text {

            font-weight: normal;
            margin-top: 10px;
            margin-bottom: 0;
            text-align: center;
        }

        .fa-2x {
            margin: 0 auto;
            float: none;
            display: table;
            color: #4ad1e5;
        }

    </style>
@endsection

@section('content')

    @if (Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif

    </div>


    <div class="main-content container-fluid">
        <div class="container">
            <div class="panel panel-default panel-border-color panel-border-color-primary">

                <div class="panel-body">
                    <div class="card">
                        <center>
                            <h2 id="heading">Eden - Parrainage</h2>
                            <p>Vos points récoltés: </p>
                        </center>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="counter">

                                    <h2 class="count-text ">Points collectés </h2>
                                    <h1 class="timer count-title count-number" data-to="{{ $points_collected }}"
                                        data-speed="1500"></h1>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="counter">
                                    <!--i class="fa fa-code fa-2x"></!--i-->
                                    <h2 class="count-text ">Points à convertir</h2>
                                    <h1 class="timer count-title count-number" data-to="{{ $point_to_convert }}"
                                        data-speed="1500"></h1>
                                </div>
                            </div>
                        </div>



                        <!-- Button trigger modal -->


                        <center>
                            <button data-toggle="modal" type="button" class="btn btn-primary btn-xl"
                                data-target="#exampleModal" style="    margin-top: 20px;">{{ __('Convertir') }}</button>
                        </center>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 20px;">
                            <div class="panel panel-default" style="width: 750px;  margin: auto;">

                                <center>
                                    <div class="panel-heading">Mes demandes de conversions non valides</div>
                                </center>


                                <table id="convertion" class="table table-striped table-hover text-center"
                                    style="width: 600px;
                                                                                                                                                                                margin: auto;margin-top:20px">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Numéro</th>
                                            <th class="text-center">Nombre de points</th>
                                            <th class="text-center">Date de la demande</th>
                                            <th class="text-center">Statut</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($data_demandes as $data)

                                            <tr>
                                                <td> {{ $count++ }}</td>
                                                <td> {{ $data['points'] }}</td>
                                                <td> {{ $data['created_at'] }}</td>
                                                <td> {{ $data['is_validate'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>




@endsection


@section('js')

    <script>
        (function($) {
            $.fn.countTo = function(options) {
                options = options || {};

                return $(this).each(function() {
                    // set options for current element
                    var settings = $.extend({}, $.fn.countTo.defaults, {
                        from: $(this).data('from'),
                        to: $(this).data('to'),
                        speed: $(this).data('speed'),
                        refreshInterval: $(this).data('refresh-interval'),
                        decimals: $(this).data('decimals')
                    }, options);

                    // how many times to update the value, and how much to increment the value on each update
                    var loops = Math.ceil(settings.speed / settings.refreshInterval),
                        increment = (settings.to - settings.from) / loops;

                    // references & variables that will change with each update
                    var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data('countTo') || {};

                    $self.data('countTo', data);

                    // if an existing interval can be found, clear it first
                    if (data.interval) {
                        clearInterval(data.interval);
                    }
                    data.interval = setInterval(updateTimer, settings.refreshInterval);

                    // initialize the element with the starting value
                    render(value);

                    function updateTimer() {
                        value += increment;
                        loopCount++;

                        render(value);

                        if (typeof(settings.onUpdate) == 'function') {
                            settings.onUpdate.call(self, value);
                        }

                        if (loopCount >= loops) {
                            // remove the interval
                            $self.removeData('countTo');
                            clearInterval(data.interval);
                            value = settings.to;

                            if (typeof(settings.onComplete) == 'function') {
                                settings.onComplete.call(self, value);
                            }
                        }
                    }

                    function render(value) {
                        var formattedValue = settings.formatter.call(self, value, settings);
                        $self.html(formattedValue);
                    }
                });
            };

            $.fn.countTo.defaults = {
                from: 0, // the number the element should start at
                to: 0, // the number the element should end at
                speed: 1000, // how long it should take to count between the target numbers
                refreshInterval: 100, // how often the element should be updated
                decimals: 0, // the number of decimal places to show
                formatter: formatter, // handler for formatting the value before rendering
                onUpdate: null, // callback method for every time the element is updated
                onComplete: null // callback method for when the element finishes updating
            };

            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        }(jQuery));

        jQuery(function($) {
            // custom formatting example
            $('.count-number').data('countToOptions', {
                formatter: function(value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                }
            });

            // start all the timers
            $('.timer').each(count);

            function count(options) {
                var $this = $(this);
                options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                $this.countTo(options);
            }
        });
    </script>
@endsection
