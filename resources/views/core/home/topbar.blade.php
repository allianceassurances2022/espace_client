<nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
          <div class="navbar-header"><a href="{{route('index_produit')}}" class="navbar-brand"></a></div>
          <div class="be-right-navbar">

            <ul class="nav navbar-nav navbar-right be-user-nav">
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ asset('user_assets/assets/uploads/avatars/'.Auth()->user()->avatar) }}" alt="Avatar"><span class="user-name">Djilali EL Medjadji</span></a>
                <ul role="menu" class="dropdown-menu">
                  <li>
                    <div class="user-info">
                      <div class="user-name">
                        <a style=" color: whitesmoke;text-decoration: none;" href="{{ route('home') }}">{{Auth()->user()->prenom}} {{Auth()->user()->name}}</a>
                      </div>

                      <div class="user-position online">online</div>
                    </div>
                  </li>

                    <li><a href="{{route('home')}}"><span class="icon mdi mdi-settings"></span>Tableau de bord</a></li>
                  <li><a href="{{ route('profil') }}"><span class="icon mdi mdi-face"></span> Profil</a></li>

                  <li><a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="icon mdi mdi-power"></span> Déconnexion</a><form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form></li>
                </ul>
              </li>
            </ul>
            {{-- <div class="page-title"><span>Alliance Assurances</span></div> --}}
            <ul class="nav navbar-nav navbar-right be-icons-nav">

              <li class="dropdown">
                <a  href="{{ route ('home') }}"  role="button" aria-expanded="false"><span class="icon mdi mdi-home"></span></a>
              </li>

              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="icon mdi mdi-apps"></span></a>
                <ul class="dropdown-menu be-connections">
                  <li>
                    <div class="list">
                      <div class="content">
                        <div class="row">
                          <div class="col-xs-4"><a href="{{route('type_produit',['auto','index'])}}" class="connection-item"><img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" alt="Automobile"><span>Auto</span></a></div>
                          <div class="col-xs-4"><a href="{{route('type_produit',['mrh','index'])}}" class="connection-item"><img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" alt="Multirisques Habitation"><span>MRH+</span></a></div>
                          {{-- <div class="col-xs-4"><a href="{{route('type_produit',['mrp','index'])}}" class="connection-item"><img src="{{asset('produit_assets/images/icons/pro_col.svg')}}" alt="Multirisques Professionnelle"><span>MRP+</span></a></div> --}}
                          <div class="col-xs-4"><a href="{{route('type_produit',['catnat','index'])}}" class="connection-item"><img src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}" alt="Catastrophe Naturelle"><span>CATNAT</span></a></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12"><a target="_blank" href="https://www.amana.dz/" class="connection-item"><img src="{{asset('assets/img/logo_amana.png')}}" alt="Mail Chimp" style="max-width: 120px;"><span>Ammana</span></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="footer"> <a href="{{route('index_produit')}}">Tous les Produits</a></div>
                  </li>


                </ul>
              </li>

            </ul>
          </div>
        </div>
      </nav>
