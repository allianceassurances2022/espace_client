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
</head>
<body>
 	<div class='container'>
  <div class='window'>
    <div class='order-info'>

      <div class='order-info-content'>
      <div class="all_header">
      	<img src="produit_assets/images/icons/alliance-assurance.png" alt="">
      </div>
        <h2> Votre Pannier <i class="fa fa-shopping-cart" aria-hidden="true"></i></h2>
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
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/hab_col.svg' class='full-width'></img>
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
                <div class='price'>7 000,00 DA</div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/cat_nat_col.svg' class='full-width'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>Monobento</span>
                <br>Double Lunchbox<br> <span class='thin small'> Color: Pink, Size: Medium</span>
                <div class="product_actions">
                	<a href="" class="bot-button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                	<a href="" class="bot-button"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>
              </td>

            </tr>
            <tr>
              <td>
                <div class='price'>14 000,00 DA</div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class='line'></div>
        <div class='total'>
          <span style='float:left;'>
            <div class='thin dense'>VAT 19%</div>
            <div class='thin dense'>Delivery</div>
            TOTAL
          </span>
          <span style='float:right; text-align:right;'>
            <div class='thin dense'>26 000.75 DA</div>
            <div class='thin dense'>400.75 DA</div>
            26 400.75 DA
          </span>
        </div>
   

        <div class="action">
        	<p> Repudiandae ipsam obcaecati nemo, sit ut praesentium odio molestiae, doloremque inventore atque voluptatem. Eius, veniam suscipit iste!</p>
	        <form>
	        <h3>Confirmer que vous etes un etre humain <span>1</span></h3>
	        <h3>Choisir votre mode de paiement <span>2</span></h3>
		    <div class="cc-selector">
		        <input id="visa" type="radio" name="credit-card" value="visa" />
		        <label class="drinkcard-cc visa" for="visa"></label>
		        <input id="mastercard" type="radio" name="credit-card" value="mastercard" />
		        <label class="drinkcard-cc mastercard"for="mastercard"></label>
		    </div>
		    <h3>Acception des conditions generales <span>3</span></h3>
        <div class="condition">
          <p>
            <input type="checkbox">J'accepte les<a href=""> Conditions gelerales</a> fugit excepturi corporis.
            <br>
            <input type="checkbox">J'accepte les<a href=""> Conditions gelerales</a> excepturi corporis.
          </p>
          
        </div>
			</form>
        	<a href="" class="bot-button bot-button-prev"><i class="fa fa-arrow-circle-left"></i> Produits</a>
        	<a href="" class="bot-button"> Payer <i class="fa fa-arrow-circle-right"></i></a>
        </div>
</div>
</div>
      </div>
    </div>
</body>
<script src="{{asset('payment_assets/js/js.js')}}"></script>
</html>