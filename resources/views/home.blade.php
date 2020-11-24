@extends('default')


@section('head_title')
Home
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
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

    <div class="bord-title">
        <h1>Bienvenu sur notre plateforme E-commerce</h1>
    </div>
    <div class="panel">

        <div class="row">
            <h2 style="padding-top: 12px; padding-bottom: 13px; margin-left: 56px;">si vous êtes déjà souscrit, renouvellez votre contrat ici :</h2>
        </div>
       <div class="row" style="padding: 20px;">
           <div class="col-md-3 item-renouvellement">
               <a href="{{ route('renouvellement.auto') }}" >
                   <img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" class="img-renouvellement" alt="Automobile">
                   <br>
                   <span>Renouvellement Auto</span>
               </a>
           </div>
           <div class="col-md-3 item-renouvellement">
               <a href="{{ route('renouvellement.mrh') }}" >
                   <img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" class="img-renouvellement" alt="mrh">
                   <br>
                   <span>Renouvellement Multirisque habitation</span>
               </a>
           </div >
           <div class="col-md-3 item-renouvellement">
               <a href="{{ route('renouvellement.mrp') }}">
                   <img src="{{asset('produit_assets/images/icons/pro_col.svg')}}" class="img-renouvellement" alt="mrp">
                   <br>
                   <span>Renouvellement multirisque professionnelle</span>
               </a>
           </div>
           <div class="col-md-3 item-renouvellement">
               <a href="{{ route('renouvellement.catnat') }}" >
                   <img src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}" class="img-renouvellement" alt="catnat">
                   <br>
                   <span>Renouvellement catastrophe naturelle</span>
               </a>
           </div>
       </div>
    </div>

</div>
</div>

    

      <div class="row">
        <div class="col-sm-6">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Mes Devis</div>
                <form>
										@csrf
								</form>
                <div class="panel-body">
                  <table id="devis" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Produit</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>

        </div>

        <div class="col-sm-6">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Mes Contrats</div>
                <form>
										@csrf
								</form>
                <div class="panel-body">
                  <table id="contrat" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Produit</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>

        </div>

      </div>



@endsection


            @section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.mask.min.js')}}"></script>

    <script src="assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.html5.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.flash.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.print.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.colVis.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/app-tables-datatables.js" type="text/javascript"></script>


    <script>

///////////////////////////////////////////////////////////  Devis ///////////////////////////////////////////////////////////////////

    var table_ods = $('#devis').DataTable({
					"responsive": true,
					"autoWidth": true,
					"columns": [
					{"data": "id",  "orderable": true,"visible": false, "searchable": true},
          {"data": "type_assurance", "orderable": true, "searchable": true,
          "render" : function(data){
            if(data == "Automobile")
            return '<img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" style="height: 30px;"  />'+'  '+data;
            else if(data == "Catastrophe Naturelle")
            return '<img src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}" style="height: 30px;"  />'+'  '+data;
            else if(data == "Multirisques Habitation")
            return '<img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" style="height: 30px;"  />'+'  '+data;
          }
        },
					{"data": "prime_total", "orderable": true, "searchable": true},
          {"data": "created_at", "orderable": true, "searchable": true,"render" : function(data) {
						   		return data.substr(0, 10)+ ' ' + data.substr(11, 8);
						}},
          // {"data": "date_ods", "orderable": true, "searchable": true},
					// {"data": "date_ods", "orderable": true, "searchable": true},
					// {"data": "nom_tiers", "orderable": true, "searchable": true},
					// {"data": "libelle", "orderable": true, "searchable": false},
					{"data": "id", "orderable": false, "searchable": false,
          "render" : function(data){
            return '<a href="#" class="icon" onclick="delete_devis('+data+')"><i class="mdi mdi-delete" ></i></a>'
          }
        },
        {"data": "edit", "orderable": false, "searchable": false,
        "render" : function(data){

          if(data[0] == "Automobile"){
          var url = '{{ route("modification_devis_auto", ":id") }}';
          url = url.replace(':id', data[1]);
          return '<a href="'+url+'" class="icon"><i class="mdi mdi-edit"></i></a>';
          }
           else if(data[0] == "Catastrophe Naturelle"){
             var url = '{{ route("modification_devis_catnat", ":id") }}';
             url = url.replace(':id', data[1]);
           return '<a href="'+url+'" class="icon"><i class="mdi mdi-edit"></i></a> ';
           }
           else if(data[0] == "Multirisques Habitation"){
             var url = '{{ route("modification_devis_mrh", ":id") }}';
             url = url.replace(':id', data[1]);
           return '<a href="'+url+'" class="icon"><i class="mdi mdi-edit"></i></a> ';
           }
        }
        },

					],
					"rowId": 'id', // IdRow = Id_User in bd
					"processing": true,
					"serverSide": true,
					"ajax": {
						url: '{{route('devis.table')}}',
						type: 'POST',
						data: {
							'_token': function () {
											return $('input[name="_token"]').val();
											},
						}

					},
					"order": [[0, "asc"]],
					"searching": true,
					"deferRender": true,
					"scrollY":"180px",
					"language": {
						"info": " page : _PAGE_ sur _PAGES_   (de _START_ à _END_ sur un total de : _TOTAL_ enregistrements )",
						"infoEmpty": "Pas de résultat",
						"infoFiltered": " - Filtere dans _MAX_ enregistrements",
						"decimal": "",
						"emptyTable": "Pas de résultat",
						"infoPostFix": "",
						"thousands": ",",
						"lengthMenu": " <select>" +
								'<option value="10">10</option>' +
								'<option value="20">20</option>' +
								'<option value="30">30</option>' +
								'<option value="40">40</option>' +
								'<option value="50">50</option>' +
								'<option value="100">100</option>' +
								'<option value="-1">Tous</option>' +
								"</select>  lignes à afficher", //_MENU_

						"loadingRecords": "Veuillez patienter - Chargement...",
//"processing":     "<img src='{{asset('assets/images/loading_bar.gif')}}' > Chargement...",
						"search": "Recherche:",
						"zeroRecords": "Pas de résultat",
						"paginate": {
							"first": "Premier",
							"last": "Dernier",
							"next": "Suivant",
							"previous": "précédent"
						}
					}
				});





///////////////////////////////////////////////////////////  Contrat ///////////////////////////////////////////////////////////////////

var table_ods = $('#contrat').DataTable({
      "responsive": true,
      "autoWidth": true,
      "columns": [
      {"data": "id",  "orderable": true,"visible": false, "searchable": true},
      {"data": "type_assurance", "orderable": true, "searchable": true,
      "render" : function(data){
        if(data == "Automobile")
        return '<img src="{{asset('produit_assets/images/icons/auto_col.svg')}}" style="height: 30px;"  />'+'  '+data;
        else if(data == "Catastrophe Naturelle")
        return '<img src="{{asset('produit_assets/images/icons/cat_nat_col.svg')}}" style="height: 30px;"  />'+'  '+data;
        else if(data == "Multirisques Habitation")
        return '<img src="{{asset('produit_assets/images/icons/hab_col.svg')}}" style="height: 30px;"  />'+'  '+data;
      }
    },
      {"data": "prime_total", "orderable": true, "searchable": true},
      {"data": "created_at", "orderable": true, "searchable": true,"render" : function(data) {
              return data.substr(0, 10)+ ' ' + data.substr(11, 8);
        }},
      // {"data": "date_ods", "orderable": true, "searchable": true},
      // {"data": "date_ods", "orderable": true, "searchable": true},
      // {"data": "nom_tiers", "orderable": true, "searchable": true},
      // {"data": "libelle", "orderable": true, "searchable": false},
      {"data": "show", "orderable": false, "searchable": false,
      "render" : function(data){
        if(data[0] == "Automobile"){
        var url = '{{ route("contrat_auto", ":id") }}';
        url = url.replace(':id', data[1]);
        return '<a href="'+url+'" class="icon"><i class="mdi mdi-eye"></i></a>';
        }
         else if(data[0] == "Catastrophe Naturelle"){
           var url = '{{ route("contrat_catnat", ":id") }}';
           url = url.replace(':id', data[1]);
         return '<a href="'+url+'" class="icon"><i class="mdi mdi-eye"></i></a> ';
         }
         else if(data[0] == "Multirisques Habitation"){
           var url = '{{ route("contrat_mrh", ":id") }}';
           url = url.replace(':id', data[1]);
         return '<a href="'+url+'" class="icon"><i class="mdi mdi-eye"></i></a> ';
         }
      }
    },

      ],
      "rowId": 'id', // IdRow = Id_User in bd
      "processing": true,
      "serverSide": true,
      "ajax": {
        url: '{{route('contrat.table')}}',
        type: 'POST',
        data: {
          '_token': function () {
                  return $('input[name="_token"]').val();
                  },
        }

      },
      "order": [[0, "asc"]],
      "searching": true,
      "deferRender": true,
      "scrollY":"180px",
      "language": {
        "info": " page : _PAGE_ sur _PAGES_   (de _START_ à _END_ sur un total de : _TOTAL_ enregistrements )",
        "infoEmpty": "Pas de résultat",
        "infoFiltered": " - Filtere dans _MAX_ enregistrements",
        "decimal": "",
        "emptyTable": "Pas de résultat",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": " <select>" +
            '<option value="10">10</option>' +
            '<option value="20">20</option>' +
            '<option value="30">30</option>' +
            '<option value="40">40</option>' +
            '<option value="50">50</option>' +
            '<option value="100">100</option>' +
            '<option value="-1">Tous</option>' +
            "</select>  lignes à afficher", //_MENU_

        "loadingRecords": "Veuillez patienter - Chargement...",
//"processing":     "<img src='{{asset('assets/images/loading_bar.gif')}}' > Chargement...",
        "search": "Recherche:",
        "zeroRecords": "Pas de résultat",
        "paginate": {
          "first": "Premier",
          "last": "Dernier",
          "next": "Suivant",
          "previous": "précédent"
        }
      }
    });


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

@section('docready')
App.dataTables();
@endsection
