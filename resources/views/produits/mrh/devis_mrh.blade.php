
<!DOCTYPE html>
<html lang="en">

<head>    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('payment_assets/css/payment_style.css')}}">
  <link rel="icon" type="image/png" href="{{asset('produit_assets/images/icons/favicon.ico')}}"/>
  <link rel="stylesheet" type="text/css" href="{{asset('produit_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('produit_assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('produit_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">

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
  
  .my-menu-inside{
    padding: 30px 0px 0px 30px;
    text-align: center; 
    float: right;
    margin-bottom: 2em;
  }

  .my-menu-inside li{
    display: inline-block;
    margin: 0 10px;
  }

  .my-menu-inside li a{
    padding: 8px 19px;
    border: 1px #286f74 solid;
    border-radius: 57px;
    font-weight: bold !important;
    background: #ffffff;
    color: white;
    text-transform: uppercase;
    font-size: 12px;
    color: #007480;
  }

  .my-menu-inside li a:hover{
    background-color: #007480;
    border: 1px #007480 solid;
    color: white;
    transition: 0.3s;
  }

  .all_header {
    position: relative;
    display: block;
    width: 112.7%;
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

  .wrapper--w680 {
    max-width: 60%;
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

  input{
    outline: none;
    margin: 0;
    border: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    width: 90%;
    font-size: 14px;
    font-family: inherit;
    padding: 10px;
    border-radius: 4px;
    border: 1px #c7c7c7 solid;
    margin-left: 2%;
    margin-top: 2%;
  }

  input.disable{
    background-color: #ECECEC;
  }

  a {
    color: hotpink;
  }

  .label {
    font-size: 16px;
    color: #555;
    text-transform: capitalize;
    display: block;
    margin-bottom: 5px;
    font-weight: 600;
    margin-top: 1em;
  }

  .my-card{
    clear: both;
  }



</style>

</head>

<body>
  <div class="page-wrapper p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
      <div class="card card-4">
        <form class="contact100-form " action="{{route('validation_devis_mrh')}}" method="post" >
          @csrf
          <div class="card-body">
            <div class="all_header" >
              <img src="produit_assets/images/icons/alliance-assurance.png" alt="">

            </div>

            <div class="card my-card">
              <h2 class="card-header">Devis</h2>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <div class="input-group">
                   <div class="col-md-4">
                     <label class="label">Date souscription </label>
                     <input  class="disable" type="date" name="date_sous" value="{{$date_souscription}}" readonly required>
                   </div>
                   <div class="col-md-4">
                    <label class="label">Date d'effet</label>
                    <input  type="date" id="date_effet" name="date_eff" value="{{$date_eff ?? ''}}" onchange="dateplusunans()" required>
                  </div>
                  <div class="col-md-4">
                   <label class="label">Date expiration </label>   
                   <input class="disable" type="date" id="date_expiration" name="date_exp" value="{{$date_exp ?? ''}}" readonly required>
                 </div>
               </div>

                 <div class="input-group">

                   <div class="col-md-4">
                    <label class="label">Habitation</label>
                    <input class="disable" name="hab" type="text" value="{{$habitation}}" readonly required> 
                  </div>
                  <div class="col-md-4">
                    <label class="label">Qualité juredique</label>
                    <input class="disable" name="juredique" type="text" value="{{$juredique}}" readonly required> 
                  </div>
                  <div class="col-md-4">
                    <label class="label">Terrasse</label>
                    <input class="disable" name="terasse" type="text" value="{{$terasse}}" readonly required> 
                  </div>
                </div>
              <div class="input-group">

               <div class="col-md-8">
                <label class="label">Adress</label>
                <input   type="text"  name="adresse" value="{{$adresse ?? ''}}" required>
              </div>
              <div class="col-md-4">
               <label class="label">Wilaya </label>             
               <select id="Wilaya" 
               style="padding: 10px; border-radius: 4px; border: 1px #c7c7c7 solid; margin-left: 2%; margin-top: 2%;" type="text" name="Wilaya" placeholder="Wilaya" required>
               @foreach($wilaya as $wilay)
               <option value="{{$wilay->code_wilaya}}" @if($wilaya_selected == $wilay->code_wilaya) selected @endif>{{$wilay->nlib_wilaya}}</option>
               @endforeach
             </select>
           </div>
         </div>
         <div class="input-group">

           <div class="col-md-4">
            <label class="label">Nombre de pieces</label>
            <input  type="text" name="nbr_piece"  value="{{$nbr_piece ?? ''}}" readonly required> 
       
          </div>
          <div class="col-md-4">
            <label class="label">Surface</label>
            <input type="number" name="surface" value="{{$surface ?? ''}}" required> 
          </div>
          <div class="col-md-4">
            <label class="label">Etage</label>
            <input type="text" type="number" name="etage" value="{{$etage ?? ''}}" required> 
          </div>
        </div>
        <div class="input-group">
          <div class="col-md-12">
            <label class="label">Montant forfetaire</label>
            <input  type="text" name="montant"  value="{{$montant}}" readonly required>
    
          </div> 

        </div>


      </div>

    </div>  

  </div>

  <div class="card my-card">
              <h2 class="card-header">Agence</h2>
              <div class="card-body p-0">
                <div class="table-responsive">
                  
                  <div class="input-group">
                   
               </div>
         

    </div>  

  </div>

  <div  class="action">     

  <input type="hidden" name="prime_total" value="{{$prime_total}}">   
  <input type="hidden" name="id" value="{{$id ?? ''}}">   

    <input class="bot-button" type ='submit' id="valider" nom="valider" value="valider">  

  </div>



</div>

</form>

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

<script>

  function dateplusunans() {

    var x = document.getElementById("date_effet");
    var dat=x.value;
    var a = dat.substring(0,4);
    var m = dat.substring(5,7);
    var d = dat.substring(8,10);
    var t = m+"-"+d+"-"+a;
    var act = new Date(t);
    var apr = new Date (act.setFullYear(act.getFullYear() + 1));
    var apj = apr.setDate(apr.getDate() - 1);
    //var final = apr.toLocaleDateString();
    var day = ('0' + apr.getDate()).slice(-2);
    var month = ('0' + (apr.getMonth() + 1)).slice(-2);
    var year = apr.getFullYear();
    var final = year+"-"+month+"-"+day;
    document.getElementById("date_expiration").value=final;
  }

</script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
