@extends('default')


@section('head_title')
Home
@endsection


@section('content')

    @if (Session::has('sweet_alert.alert'))
        <script>
            swal({!! Session::get('sweet_alert.alert') !!});
        </script>
    @endif

    <div class="row">
  <div class="col-md-5">
    <div class="user-display">
      <div class="user-display-bg"><img src="assets/img/user-profile-display.png" alt="Profile Background"></div>
      <div class="user-display-bottom">
        <div class="user-display-avatar"><img src="{{ asset('user_assets/assets/uploads/avatars/'.Auth()->user()->avatar) }}" alt="Avatar"></div>
        <div class="user-display-info">
          <div class="name">{{Auth()->user()->prenom}} {{Auth()->user()->name}}</div>
          <div class="nick"><span class="mdi mdi-account"></span> {{Auth()->user()->profession}}</div>
      </div>
      <div class="row user-display-details">
          <div class="col-xs-">
              <!--
            <div class="title">Issues</div>
            <div class="counter">26</div>

            -->
        </div>
        <div class="col-xs-6">
            <div class="title">Nombre de devis</div>
            <div class="counter" >{{ $sum_devis }}</div>
        </div>
        <div class="col-xs-6">
            <div class="title">Nombre de souscriptions</div>
            <div class="counter">{{ $sum_contr }}</div>
        </div>
    </div>
</div>
</div>
</div>
<div class="col-md-7">
<!--
Accordion
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


    </div>

    -->
    <div class="bord-title">
        <h1>Bienvenu sur notre plateforme E-commerce</h1>
    </div>
    <div class="panel ">

        <div class="row">
            <h2 style="padding-top: 12px; padding-bottom: 13px; margin-left: 56px;">si vous êtes déjà souscrit, renouvellez votre contrat ici :</h2>
        </div>
       <div class="row" style="padding: 20px;">
           <div class="col-md-3 item-renouvellement">
               <a href="{{ route('renouvellement_auto') }}" >
                   <img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" class="img-renouvellement" alt="Automobile">
                   <br>
                   <span> renouvellment Auto</span>
               </a>
           </div>
           <div class="col-md-3 item-renouvellement">
               <a href="#" >
                   <img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" class="img-renouvellement" alt="Automobile">
                   <br>
                   <span> renouvellment Auto</span>
               </a>
           </div >
           <div class="col-md-3 item-renouvellement">
               <a href="#" >
                   <img src="{{asset('produit_assets/images/icons/pro_col.svg')}}" class="img-renouvellement" alt="Automobile">
                   <br>
                   <span> renouvellment Auto</span>
               </a>
           </div>
           <div class="col-md-3 item-renouvellement">
               <a href="#" >
                   <img src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}" class="img-renouvellement" alt="Automobile">
                   <br>
                   <span> renouvellment Auto</span>
               </a>
           </div>
       </div>
    </div>

</div>
</div>

    <div class="row">
<!--
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
                        <td>{{$cat['datec']}}</td>
                        <td class="actions"><a href="{{route('devis_catnat')}}" class="icon"><i class="mdi mdi-edit"></i></a></td>
                      </tr>
                        @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
 -->
    <div class="col-sm-6">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Mes Devis
                  <!--div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div-->
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
                    @foreach($devis as $devi)
                      <tr>
                        <td class="user-avatar"> <img @if($devi->type_assurance == 'Automobile')
                                                      src="{{asset('produit_assets/images/icons/auto_col.svg')}}"
                                                      @endif

                                                      @if($devi->type_assurance == 'Catastrophe Naturelle')
                                                      src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}"
                                                      @endif

                                                      @if($devi->type_assurance == 'Multirisques Habitation')
                                                      src="{{asset('produit_assets/images/icons/hab_col.svg')}}"
                                                      @endif
                                                      alt="Avatar">{{ $devi->type_assurance }} </td>

                        <td>{{ $devi->prime_total }}</td>
                        <td>{{ $devi->created_at }}</td>
                        <td class="actions"><a href="#" class="icon" onclick="delete_devis({{$devi->id}})"><i class="mdi mdi-delete" ></i></a></td>

                        <td class="actions"><a  @if($devi->type_assurance == 'Automobile')
                                                href="{{ route('modification_devis_auto',$devi->id) }}"
                                                @endif
                                                @if($devi->type_assurance == 'Catastrophe Naturelle')
                                                href="{{ route('modification_devis_catnat',$devi->id) }}"
                                                @endif
                                                @if($devi->type_assurance == 'Multirisques Habitation')
                                                href="{{ route('modification_devis_mrh',$devi->id) }}"
                                                @endif

                                                class="icon"><i class="mdi mdi-edit"></i>
                                            </a>
                        </td>
                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    <div class="col-sm-6">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Mes Contrat
                  <!--div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div-->
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

                    @foreach($contrats as $contrat)
                      <tr>
                        <td class="user-avatar"> <img @if($contrat->type_assurance == 'Automobile')
                                                      src="{{asset('produit_assets/images/icons/auto_col.svg')}}"
                                                      @endif

                                                      @if($contrat->type_assurance == 'Catastrophe Naturelle')
                                                      src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}"
                                                      @endif

                                                      @if($contrat->type_assurance == 'Multirisques Habitation')
                                                      src="{{asset('produit_assets/images/icons/hab_col.svg')}}"
                                                      @endif
                                                      alt="Avatar">{{ $contrat->type_assurance }} </td>

                        <td>{{ $contrat->prime_total }}</td>
                        <td>{{ $contrat->created_at }}</td>
                        @if($contrat->type_assurance == 'Multirisques Habitation')
                        <td class="actions"><a href="{{route('contrat_mrh',$contrat->id)}}" class="icon"><i class="mdi mdi-eye"></i></a></td>
                        @endif
                        @if($contrat->type_assurance == 'Catastrophe Naturelle')
                        <td class="actions"><a href="{{route('contrat_catnat',$contrat->id)}}" class="icon"><i class="mdi mdi-eye"></i></a></td>
                        @endif
                        @if($contrat->type_assurance == 'Automobile')
                        <td class="actions"><a href="{{route('contrat_auto',$contrat->id)}}" class="icon"><i class="mdi mdi-eye"></i></a></td>
                        @endif

                      </tr>
                    @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

    </div>

    <div class="row">

    <div class="col-sm-6">
      <div style="float: right">
        {{ $devis->links() }}
      </div>
    </div>
    <div class="col-sm-6">
      <div style="float: right">
        {{ $contrats->links() }}
      </div>
    </div>
  </div>

@endsection


            @section('js')

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.mask.min.js')}}"></script>


    <script>
        function delete_devis( id ) {
            //  swal.fire("Hello World");


          //  window.alert(id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/delete_devis/" +id;
                }
            });




        }
    </script>
@endsection
