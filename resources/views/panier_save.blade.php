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
      <div class="menu-header">
        @include('core.produit.inside-menu')
      </div>
        <h2> Votre Panier <i class="fa fa-shopping-cart" aria-hidden="true"></i></h2>
        {{-- @if($auto != '')
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/auto_col.svg' class='full-width'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>{{$auto['nom']}}</span>
                <br> Resumé<br> <span class='thin small'> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil!<br><br></span>
                <div class="product_actions">
                	<a href="{{route('pannier_supp','auto')}}" class="bot-button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                	<a href="" class="bot-button"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                </div>
              </td>

            </tr>
            <tr>
              <td>
                <div class='price'>{{number_format($auto['montant'], 2,',', ' ')}} DA</div>
              </td>
            </tr>
          </tbody>
        </table>
        @endif --}}


        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/hab_col.svg' class='full-width'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>MRHHHH</span>
                <br> Resumé<br> <span class='thin small'> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil!<br><br></span>
                <div class="product_actions">
                	<a href="{{route('devis_mrh')}}" class="bot-button">Devis  <i class="fa fa-edit" aria-hidden="true"></i></a>
                  <a href="{{route('pannier_supp','mrh')}}" class="bot-button">Supprimer  <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class='price'>{{number_format(1000, 2,',', ' ')}} DA</div>
              </td>
            </tr>
          </tbody>
        </table>
        

        {{-- @if($cat != '')
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/cat_nat_col.svg' class='full-width'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>{{$cat['nom']}}</span>
                <br>Double Lunchbox<br> <span class='thin small'> Color: Pink, Size: Medium</span>
                <div class="product_actions">
									<a href="{{route('devis_catnat')}}" class="bot-button">Devis  <i class="fa fa-edit" aria-hidden="true"></i></a>
                	<a href="{{route('pannier_supp','catnat')}}" class="bot-button">Supprimer  <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                 </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class='price'>{{$cat['montant']}} DA</div>
              </td>
            </tr>
          </tbody>
        </table>
        @endif --}}


        <div class='line'></div>
        <div class='total'>
          <span style='float:left;'>
            {{-- <div class='thin dense'>VAT 19%</div>
            <div class='thin dense'>Delivery</div> --}}
            TOTAL
          </span>
          <span style='float:right; text-align:right;'>
            {{-- <div class='thin dense'>{{$total}} DA</div>
            <div class='thin dense'>400.75 DA</div> --}}
            {{-- {{number_format($total, 2,',', ' ')}} DA --}}
          </span>
        </div>

</div>
</div>
      </div>
    </div>
</body>
<script src="{{asset('payment_assets/js/js.js')}}"></script>
</html>
