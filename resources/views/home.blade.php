@extends('default')

@section('title')
Home 
@endsection


@section('content')

<div class="row">
  <div class="col-md-5">
    <div class="user-display">
      <div class="user-display-bg"><img src="assets/img/user-profile-display.png" alt="Profile Background"></div>
      <div class="user-display-bottom">
        <div class="user-display-avatar"><img src="assets/img/avatar-150.png" alt="Avatar"></div>
        <div class="user-display-info">
          <div class="name">Djilali EL Medjadji</div>
          <div class="nick"><span class="mdi mdi-account"></span> Ingénieur Développeur</div>
      </div>
      <div class="row user-display-details">
          <div class="col-xs-4">
            <div class="title">Issues</div>
            <div class="counter">26</div>
        </div>
        <div class="col-xs-4">
            <div class="title">Commits</div>
            <div class="counter">26</div>
        </div>
        <div class="col-xs-4">
            <div class="title">Followers</div>
            <div class="counter">26</div>
        </div>
    </div>
</div>
</div>
</div>
<div class="col-md-7">
    
         <div id="accordion2" class="panel-group accordion accordion-color">
                <div class="panel panel-full-primary">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse-1"><i class="icon mdi mdi-chevron-down"></i> Primary Color</a></h4>
                  </div>
                  <div id="collapse-1" class="panel-collapse collapse in">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed vestibulum quam. Pellentesque non feugiat neque, non volutpat orci. Integer ligula lacus, ornare eget lobortis ut, molestie quis risus. </div>
                  </div>
                </div>
                <div class="panel panel-full-success">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse-2" class="collapsed"><i class="icon mdi mdi-chevron-down"></i> Success Color</a></h4>
                  </div>
                  <div id="collapse-2" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed vestibulum quam. Pellentesque non feugiat neque, non volutpat orci. Integer ligula lacus, ornare eget lobortis ut, molestie quis risus. </div>
                  </div>
                </div>
                <div class="panel panel-full-warning">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse-3" class="collapsed"><i class="icon mdi mdi-chevron-down"></i> Warning color</a></h4>
                  </div>
                  <div id="collapse-3" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed vestibulum quam. Pellentesque non feugiat neque, non volutpat orci. Integer ligula lacus, ornare eget lobortis ut, molestie quis risus. </div>
                  </div>
                </div>
                <div class="panel panel-full-danger">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion2" href="#collapse-4" class="collapsed"><i class="icon mdi mdi-chevron-down"></i> Danger Color </a></h4>
                  </div>
                  <div id="collapse-4" class="panel-collapse collapse">
                    <div class="panel-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sed vestibulum quam. Pellentesque non feugiat neque, non volutpat orci. Integer ligula lacus, ornare eget lobortis ut, molestie quis risus. </div>
                  </div>
                </div>
             
    </div>
</div>
</div>

<div class="row">
    <div class="col-sm-4">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Mon Panier
                  <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:37%;">Produit</th>
                        <th style="width:36%;">Montant</th>
                        <th>Date</th>
                        <th class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($mrh != '')
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" alt="Avatar">{{$mrh['nom']}}</td>
                        <td>{{number_format($mrh['montant'], 2,',', ' ')}} DA</td>
                        <td>{{$mrh['datec']}}</td>
                        <td class="actions"><a href="{{route('devis_mrh')}}" class="icon"><i class="mdi mdi-edit"></i></a></td>
                      </tr>
                        @endif
                        @if($auto != '')
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" alt="Avatar">{{$auto['nom']}}</td>
                        <td>{{number_format($auto['montant'], 2,',', ' ')}} DA</td>
                        <td>{{$auto['datec']}}</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                      </tr>
                        @endif
                        @if($cat != '')
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}" alt="Avatar">{{$cat['nom']}}</td>
                        <td>{{number_format($cat['montant'], 2,',', ' ')}} DA</td>
                        <td>{{$mrh['datec']}}</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-edit"></i></a></td>
                      </tr>
                        @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

    <div class="col-sm-4">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Mes Devis
                  <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:37%;">Produit</th>
                        <th style="width:36%;">Montant</th>
                        <th>Date</th>
                        <th class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" alt="Avatar">Multirisques Habitation</td>
                        <td>1 000 DA</td>
                        <td>Aug 6, 2015</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" alt="Avatar">Automobile</td>
                        <td>1 000 DA</td>
                        <td>Jul 28, 2015</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" alt="Avatar">Automobile</td>
                        <td>1 000 DA</td>
                        <td>Jul 15, 2015</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" alt="Avatar">Multirisques Habitation</td>
                        <td>1 000 DA</td>
                        <td>Jun 30, 2015</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Mes Contrat
                  <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:37%;">Produit</th>
                        <th style="width:36%;">Montant</th>
                        <th>Date</th>
                        <th class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" alt="Avatar">Automobile</td>
                        <td>1 000 DA</td>
                        <td>Aug 6, 2015</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" alt="Avatar">Multirisques Habitation</td>
                        <td>1 000 DA</td>
                        <td>Jul 28, 2015</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" alt="Avatar">Automobile</td>
                        <td>1 000 DA</td>
                        <td>Jul 15, 2015</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}" alt="Avatar">Catastrophe Naturelle</td>
                        <td>1 000 DA</td>
                        <td>Jun 30, 2015</td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-delete"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          

          </div>

@endsection