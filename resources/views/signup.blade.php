






<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="{{asset('signup_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('signup_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('signup_assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('signup_assets/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('signup_assets/css/main.css')}}" rel="stylesheet" media="all">
    <style>
        .all_header{
            position: relative;
            display: block;
            width: 123.7%;
            padding: 2em 0px;
            border-top: 1px #cae0f1 solid;
            border-bottom: 1px #007481 solid;
            text-align: center;
            background-color: #007481;
            margin-left: -1.6em;
            border-radius: 10px 10px 0px 0px;
            border-bottom: 4px #ffffff dashed;
            margin-left: -4.65em;
            border-top: 1px #007481 solid;
            margin-bottom: 45px;
        }


        .card-4 .card-body {
            padding-top: 0px;
        }
        .bg-gra-02 {
            background: -webkit-gradient(linear, left bottom, right top, from(#060505), to(#6c4079));
            background: -webkit-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
            background: -moz-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
            background: -o-linear-gradient(bottom left, #fc2c77 0%, #6c4079 100%);
            background: linear-gradient(to top right, #007481 0%, #290a88 100%);
        }
        .btn--aa {
            background: #007481;
        }
        .btn--aa-white {
            background: white;
            border: 1px #007481 solid;
            color: #007481;
        }
        .btn--aa-white:hover {
            background: #007481;
            border: 1px #007481 solid;
            color: white;
        }
        .btn--aa:hover {
            background: #015058;
        }
        .daterangepicker .table-condensed th select {
            border: 1px solid #ccc;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            font-size: 14px;
            padding: 8px;
            outline: none;
        }
        .page-wrapper{
            background-color: #f2f2f2 !important; 
        }

       
          
    </style>
</head>

<body>
    <div class="page-wrapper p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <div class="all_header">
                        <img src="produit_assets/images/icons/alliance-assurance.png" alt="">
                    </div>
                   
                     
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                 
                                    <label for="name" class="label">{{ __('Name') }}</label>

                                   <div class="col-md-6">
                                          <input id="name" type="text" class="input--style-4 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                     @error('name')
                                         <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                         </span>
                                      @enderror
                                </div></div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Prenom</label>
                                    <input class="input--style-4" type="text" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Wilaya</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Commune</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option disabled="disabled" selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date de naissance</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="birthday">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Sexe</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Homme
                                            <input type="radio" checked="checked" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Femme
                                            <input type="radio" name="gender">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Prefession</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="subject">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option>Subject 1</option>
                                    <option>Subject 2</option>
                                    <option>Subject 3</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            
                            <div class="rs-select2 js-select-simple select--no-search">
                            <label class="label">Telephone</label>
                                    <input class="input--style-4" type="text" name="phone">
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            
                            <div class="rs-select2 js-select-simple select--no-search">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="input--style-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
  @enderror
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            
                            <div class="rs-select2 js-select-simple select--no-search">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <input id="password" type="password" class="input--style-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                  @error('password')
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            
                            <div class="rs-select2 js-select-simple select--no-search">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="input--style-4" name="password_confirmation" required autocomplete="new-password">

                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                      
                       
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--aa" type="submit">M'inscrire</button>
                        </div>
                      
                          
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('signup_assets/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('signup_assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('signup_assets/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('signup_assets/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('signup_assets/js/global.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
