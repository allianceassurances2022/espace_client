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
    </style>
</head>
<body>
 	<div class='container'>
  <div class='window'>
    <div class='order-info'>

      <div class='order-info-content'>
      <div class="all_header">
        <img src="produit_assets/images/icons/alliance-assurance.png" alt="">
      </div>
    
        @if($auto != '')
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/auto_col.svg' class='full-width'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>Nom Du Produit</span>
                <br> Resumé<br> <span class='thin small'> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil!<br><br></span>
                <div class="product_actions">
                	<a href="" class="bot-button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                	<a href="" class="bot-button"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>
              </td>

            </tr>
            <tr>
              <td>
                <div class='price'>5 000,00 DA</div>
              </td>
            </tr>
          </tbody>
        </table>
        @endif

        @if($mrh['montant'] != '')
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/hab_col.svg' class='full-width'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>{{$mrh['nom']}}</span>
                <br> <br> <span class='thin small'> <br><br></span>
              
              </td>
            </tr>
          
          </tbody>
        </table>
        @endif

        @if($cat != '')
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/cat_nat_col.svg' class='full-width'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>{{$cat['nom']}}</span>
                <br><br> <span class='thin small'> </span>
            
              </td>
            </tr>
           
          </tbody>
        </table>
        @endif


        <div class='line'></div>
        <div class='total'>
          <span style='float:left;'>
            {{-- <div class='thin dense'>VAT 19%</div>
            <div class='thin dense'>Delivery</div> --}}
            MONTANT
          </span>
          <span style='float:right; text-align:right;'>
            {{-- <div class='thin dense'>{{$total}} DA</div>
            <div class='thin dense'>400.75 DA</div> --}}
            {{number_format($total, 2,',', ' ')}} DA
          </span>
        </div>
   

        <div class="action">
       
          <form>
	        
           
      <h3>Confirmer que vous etes un etre humain <span>1</span></h3>
		    <div class="cc-selector">
            <div class="g-recaptcha"  data-sitekey="6LfZ4AAVAAAAAFP6tyNYWgycDvXHIfjZg9shDZ05"></div>
		    </div>
            <h3>Choisir votre mode de paiement <span>2</span></h3>
            
		    <div class="cc-selector">
		   
               <input type="image" name="CIB" value="CIB" width="120" height="120"  src="https://www.bitakati.dz/assets/front/img/logo.svg"   />
               <input type="image" name="POST" value="POST"  width="120" height="120"  src="https://secureservercdn.net/45.40.149.34/jkq.199.myftpupload.com/wp-content/uploads/2019/10/20191024_142836_0000-696x392.png"   />
              </div>
		    <h3>Acception des conditions generales <span>3</span></h3>
        <div class="condition">
          <p>
            <input type="checkbox">J'accepte les<a href=""> Conditions gelerales</a> fugit excepturi corporis.
           </p>
          
        </div>
			</form>
        	<a href="{{route('devis_mrh')}}" class="bot-button"> Devis <i class="fa fa-arrow-circle-left"></i></a>
        	<a href="{{route('paiement')}}" class="bot-button"> Suivant <i class="fa fa-arrow-circle-right"></i></a>
            
        </div>
</div>
</div>
      </div>
    </div>
</body>
<script src="{{asset('payment_assets/js/js.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</html>