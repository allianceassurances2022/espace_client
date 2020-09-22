@extends('default_produit')
@section('tab_title')
    Mon compte
@endsection

@section('head')
<style>
    *, *:after, *:before {
  box-sizing: border-box;
}

body {
  font-family: "Inter", sans-serif;
  background-color: #f2f5f7;
}

.card {
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    flex-basis: 23em;
    flex-shrink: 0;
    -webkit-box-flex: 0;
    flex-grow: 0;
    max-width: 100%;
    background-color: #FFF;
    box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    overflow: hidden;
    margin: 1rem;
}

.card-img {
  padding-bottom: 56.25%;
  position: relative;
}
.card-img img {
  position: absolute;
  width: 100%;
}

.card-body {
  padding: 3em 1.5em;
}

.card-title {
  font-size: 1.5rem;
  line-height: 1.33;
  font-weight: 700;
  background: #00748108;
  padding: 10px 0;
  text-align: right;
  padding-right: 10px;
  font-weight: 200;
}
.card-title.skeleton {
  min-height: 28px;
  border-radius: 4px;
}

.card-intro {
  margin-top: .75rem;
  line-height: 1.5;
}
.card-intro.skeleton {
  min-height: 72px;
  border-radius: 4px;
}

.skeleton {
  background-color: #e2e5e7;
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(255, 255, 255, 0)), color-stop(rgba(255, 255, 255, 0.5)), to(rgba(255, 255, 255, 0)));
  background-image: linear-gradient(90deg, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0));
  background-size: 40px 100%;
  background-repeat: no-repeat;
  background-position: left -40px top 0;
  -webkit-animation: shine 1s ease infinite;
          animation: shine 1s ease infinite;
}

@-webkit-keyframes shine {
  to {
    background-position: right -40px top 0;
  }
}

@keyframes shine {
  to {
    background-position: right -40px top 0;
  }
}
.container2 {
  position: absolute;
  top: 7em;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  display: -webkit-box;
  display: flex;
  -webkit-box-align: center;
          align-items: center;
  -webkit-box-pack: center;
          justify-content: center;
  flex-wrap: wrap;
  z-index: 5;
}
.btn-dark{
    background-color: #007481;
    float: right;
    margin-top: 1em;
    padding: 0.8em 2.5em;
    border-radius: 50px;
    font-weight: bold;
    color: white !important;
}
.card h2 {
  font-weight: bold;
  font-size: 1.35em;
}
.card h2 img {
    vertical-align: middle;
    border-style: none;
    width: 9%;
}

</style>
@endsection

@section('produit_url')
background-image: url({{asset('produit_assets/images/backgrounds/index.jpg')}});
@endsection

@section('content')
<div class="container2">
    <!-- code here -->
    <div class="card">
        <a href="{{route('type_produit',['auto','index'])}}">
          <div class="card-img">
              <img src="{{asset('produit_assets/images/backgrounds/automobile.jpg')}}" />
          </div>
          <div class="card-body">
              <h2 class="card-title">
              Automobile
              <img src="{{asset('produit_assets/images/icons/auto_black.svg')}}" /> 
              </h2>
              <p class="card-intro">
                  Driver is a skilled Hollywood stuntman who moonlights as a getaway driv...
              </p>
              <a href="{{route('type_produit',['auto','index'])}}"  class="btn-dark"><i class="fa fa-calculator"></i> Tarification</a>
          </div>
        </a>
    </div>

    <div class="card">
        <a href="{{route('type_produit',['mrh','index'])}}">
          <div class="card-img">
              <img src="{{asset('produit_assets/images/backgrounds/habitation.jpg')}}" />
          </div>
          <div class="card-body">
              <h2 class="card-title">
                Multirisques Habitation
                <img src="{{asset('produit_assets/images/icons/hab_black.svg')}}" />
              </h2>
              <p class="card-intro">
                  Driver is a skilled Hollywood stuntman who moonlights as a getaway driv...
              </p>
              <a href="{{route('type_produit',['mrh','index'])}}" class="btn-dark"><i class="fa fa-calculator"></i> Tarification</a>
          </div>
        </a>
    </div>
    <div class="card">
        <a href="{{route('type_produit',['mrp','index'])}}">
          <div class="card-img">
              <img src="{{asset('produit_assets/images/backgrounds/entreprise.jpg')}}" />
          </div>
          <div class="card-body">
              <h2 class="card-title">
                Multirisques Professionnelle
                <img src="{{asset('produit_assets/images/icons/pro_black.svg')}}" />
              </h2>
              <p class="card-intro">
                  Driver is a skilled Hollywood stuntman who moonlights as a getaway driv...
              </p>
              <a href="{{route('type_produit',['mrp','index'])}}" class="btn-dark"><i class="fa fa-calculator"></i> Tarification</a>
        </a>
        </div>
    </div>
    <div class="card">
      <a href="{{route('type_produit',['catnat','index'])}}">
        <div class="card-img">
            <img src="{{asset('produit_assets/images/backgrounds/catastrophe-naturelle.jpg')}}" style="height: 216.55px;"/>
        </div>
        <div class="card-body">
            <h2 class="card-title">
                Catastrophe Naturelle
                <img src="{{asset('produit_assets/images/icons/cat_nat_black.svg')}}" />
            </h2>
            <p class="card-intro">
                Driver is a skilled Hollywood stuntman who moonlights as a getaway driv...
            </p>
            <a href="{{route('type_produit',['catnat','index'])}}" class="btn-dark"><i class="fa fa-calculator"></i> Tarification</a>
        </div>
      </a>
    </div>
</div>
@endsection