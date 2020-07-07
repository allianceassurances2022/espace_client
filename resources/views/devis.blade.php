
<!DOCTYPE html>
<html lang="en">

<head>    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('user_assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('user_assets/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('user_assets/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/assets/vendor/fonts/flag-icon-css/flag-icon.min.css')}}">

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Tarfication</title>

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

       
        a {
  color: hotpink;
} 

input,select {
    outline: none;
    margin: 0;
    border: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    width: 100%;
    font-size: 14px;
    font-family: inherit;
    border: 1px #bbbaba solid;
    padding: 10px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
}
textarea {
    overflow: auto;
    resize: vertical;
    width: 100%;
    min-height: 7em;
}
button{
border: 1px black solid;
padding: 10px;
border-radius: 10px;
float: right;
}
</style>
          
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
                    <form action=""><div class="tarificateur">
                            <h5>Date de souscription </h5>
                            <div class="wrap-input100 validate-input">
                                <input id="montant_calcul" class="input100" type="date" name="montant_calcul" >
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>Date de d'effet </h5>
                            <div class="wrap-input100 validate-input">
                                <input id="montant_calcul" class="input100" type="date" name="montant_calcul" >
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>Date de d'expiration </h5>
                            <div class="wrap-input100 validate-input">
                                <input id="montant_calcul" class="input100" type="date" name="montant_calcul" >
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>adresse </h5>
                            <div class="wrap-input100 validate-input">
                                <textarea></textarea>
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>Wilaya </h5>
                            <div class="wrap-input100 validate-input">
                                <input id="montant_calcul" class="input100" type="text" name="montant_calcul" >
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>Habitation </h5>
                            <div class="wrap-input100 validate-input">
                                <select name="" id="">
                                    <option value="oui">Individuelle</option>
                                    <option value="non">Collective</option>
                                </select>  
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>qualité jurédique </h5>
                            <div class="wrap-input100 validate-input">
                                <select name="" id="">
                                    <option value="oui">Propetaire</option>
                                    <option value="non">Locataire</option>
                                </select> 
                                
                                <span class="focus-input100"></span>
                            </div>
                        </div>                    
                        
                        
                        <div class="tarificateur">
                            <h5>montant forfaitaire </h5>
                            <div class="wrap-input100 validate-input">
                                <input id="montant_calcul" class="input100" type="text" name="montant_calcul" >
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>Nombre de pieces</h5>
                            <div class="wrap-input100 validate-input">
                                <input id="montant_calcul" class="input100" type="text" name="montant_calcul" >
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>Surface</h5>
                            <div class="wrap-input100 validate-input">
                                <input id="montant_calcul" class="input100" type="text" name="montant_calcul" >
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>Etage</h5>
                            <div class="wrap-input100 validate-input">
                                <input id="montant_calcul" class="input100" type="text" name="montant_calcul" >
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        
                        <div class="tarificateur">
                            <h5>Terrasse </h5>
                            <div class="wrap-input100 validate-input">
                                <select name="" id="">
                                    <option value="oui">oui</option>
                                    <option value="non">non</option>
                                </select>                            
                                <span class="focus-input100"></span>
                            </div>
                        </div>      
                        <button type="submit">Valider</button>
                                        <!---    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('signin') }}">
                                            {{ __('Logout') }}
                                       <br>     <span> {{Session()->get('mantant_mrh')}}   </span><br>
                                            <span> {{Session()->get('type_produit')}}   </span>
                                        </a>
                        
                                     
                                    </div>--></form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{asset('user_assets/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <!-- bootstap bundle js -->
    <script src="{{asset('user_assets/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{asset('user_assets/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('user_assets/assets/libs/js/main-js.js')}}"></script>
    <!-- chart chartist js -->
    <script src="{{asset('user_assets/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{asset('user_assets/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- morris js -->
    <script src="{{asset('user_assets/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{asset('user_assets/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <!-- chart c3 js -->
    <script src="{{asset('user_assets/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{asset('user_assets/assets/vendor/charts/c3charts/d3540.min.js')}}"></script>
    <script src="{{asset('user_assets/assets/vendor/charts/c3charts/C3chartjs.js')}}"></script>
    <script src="{{asset('user_assets/assets/libs/js/dashboard-ecommerce.js')}}"></script>
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
