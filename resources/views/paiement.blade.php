<!DOCTYPE html>
<html>
<head>
	<title>Paiement</title>
	<link rel="stylesheet" href="{{asset('payment_assets/css/payment_style.css')}}">
    <link rel="icon" type="image/png" href="{{asset('produit_assets/images/icons/favicon.ico')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('produit_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('produit_assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('produit_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Suez+One&display=swap" rel="stylesheet">
    <style> 
     @media screen and (max-width: 880px) {
        .all_header{
            background-color: transparent;             
        }
        .all_header img{
         background-color: #007481;
          padding: 3% 5%;
          border-radius: 10px;
          margin-left: 1em !important;
        }
    }
    .my-menu-inside{
      padding: 30px 55px 0px 30px;
      text-align: center; 
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
    .menu-header{
      display: block;
    }
    .image-clignote  {
   animation-duration: .8s;
   animation-name: clignoter;
   animation-iteration-count: infinite;
   transition: none;
}
@keyframes clignoter {
  0%   { opacity:1; }
  40%   {opacity:0; }
  100% { opacity:1; }
}
    </style>
</head>
<body>
 	<div class='container'>
  <div class='window'>
    <div class='order-info'>

    <div class='order-info-content'>
      <div class="all_header">
        <img src="{{asset('produit_assets/images/icons/alliance-assurance.png')}}" alt="">
      </div>
    


        @if($risqueh != '')
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='{{asset('produit_assets/images/icons/hab_col.svg')}}' class='full-width'></img>
              </td>
              <td>
                <br> <span class='thin product_title'> MULTIRISQUES HABITATION</span>
                <br> <br> <span class='thin small'> <br><br></span>
              
              </td>
            </tr>
            
          </tbody>
        </table>
        @endif

       

        <div class='line'></div>
      <div class='total'>
          <span style='float:left;'>
           
            MONTANT
          </span>
          <span style='float:right; text-align:right;'>
           
            {{number_format($prime_total, 2,',', ' ')}} DA
          </span>
        </div>
   

        <div class="action">
       
          {{-- <form> --}}
	        
           
      <h3>Confirmer que vous etes un etre humain <span>1</span></h3>
      <div class="d-flex justify-content-center">
		    <div class="cc-selector">
            <div class="g-recaptcha"  data-sitekey="6Lcej2kUAAAAALC9FcojJ3-UdYusYTeLF_VdG2IL"></div>
		    </div>

      </div>
         
		  
        <div class="radio_section_slice">
                 <h3>SÉLECTIONNER UN MOYEN DE PAIEMENT</h6>

               
                 
                     <input type="image" name="type_paiment" value="CIB" id="CIB" onclick="test();" width="100" height="100"  src="https://www.bitakati.dz/assets/front/img/logo.svg"   />
               
               <input type="image" name="type_paiment" value="POST" id="POST" onclick="test2();" width="100" height="100"  src="https://secureservercdn.net/45.40.149.34/jkq.199.myftpupload.com/wp-content/uploads/2019/10/20191024_142836_0000-696x392.png"   />
                   
             </div>
              
      
          
      
		    <h3>Acception des conditions generales <span>3</span></h3>
        <div class="condition">
          <p>
            <input type="checkbox">J'accepte les termes et conditions d’utilisation</input>
           </p>
          
        </div>
			{{-- </form> --}}
        	 <a href="{{route('devis_mrh')}}" class="bot-button"> Devis <i class="fa fa-arrow-circle-left"></i></a> 
         <a href="{{route('paiement',$id)}}" class="bot-button"> Payer <i class="fa fa-arrow-circle-right"></i></a> 
            
        </div>
</div>
</div>
      </div>
    </div>
</body>
<script src="{{asset('payment_assets/js/js.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  <script>
      

      function test(){
        $("#POST").removeClass("image-clignote");
        $("#CIB").addClass("image-clignote");
      }
      function test2(){
        $("#CIB").removeClass("image-clignote");
        $("#POST").addClass("image-clignote");
        
      }
  </script>
</html>




