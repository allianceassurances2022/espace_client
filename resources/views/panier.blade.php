@extends('default2')

@section('title')
Panier
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('assets/lib/select2/css/select2.min.css')}}" />
@endsection

@section('content')
	<div class="splash-container2">

    <div class="panel panel-default panel-border-color panel-border-color-primary">
      <div class="panel-heading"><img src="assets/img/logo_dark.svg" alt="logo" width="300" height="100" class="logo-img"></div>
      <div class="panel-body">

				<div class="menu-header">
				@include('core.produit.inside-menu')
				</div>
				<div class="menu-titre">
		      <h2> Votre Panier <i class="fa fa-shopping-cart" aria-hidden="true"></i></h2>
        </div>

				@if($auto != '')
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/auto_col.svg' class='full-width-icon'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>{{$auto['nom']}}</span>
                <br> ___<br> <span class='thin small'> ___<br><br></span>
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
        @endif

        @if($mrh != '')
        <div class='line'></div>
        <table class='order-table'>
          <tbody>
            <tr>
              <td><img src='produit_assets/images/icons/hab_col.svg' class='full-width-icon'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>{{$mrh['nom']}}</span>
                <br> ___<br> <span class='thin small'> ___<br><br></span>
                <div class="product_actions">
                	<a href="{{route('devis_mrh')}}" class="bot-button">Devis  <i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="{{route('pannier_supp','mrh')}}" class="bot-button">Supprimer  <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class='price'>{{number_format($mrh['montant'], 2,',', ' ')}} DA</div>
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
              <td><img src='produit_assets/images/icons/cat_nat_col.svg' class='full-width-icon'></img>
              </td>
              <td>
                <br> <span class='thin product_title'>{{$cat['nom']}}</span>
                <br> ___<br> <span class='thin small'> ___</span>
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
        @endif

				<div class='line'></div>
        <div class='total_panier'>
          <span style='float:left;'>
            {{-- <div class='thin dense'>VAT 19%</div>
            <div class='thin dense'>Delivery</div> --}}
            TOTAL
          </span>
          <span style='float:right; text-align:right;'>
            {{-- <div class='thin dense'>{{$total}} DA</div>
            <div class='thin dense'>400.75 DA</div> --}}
            {{number_format($total, 2,',', ' ')}} DA
          </span>
        </div>


			</div>
		</div>
</div>



@endsection
