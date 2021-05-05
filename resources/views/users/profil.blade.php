@extends('default')

@section('head_title')
    Profil
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/profil_style.css')}}" />
@endsection


@section('content')

    <div class="container emp-profile col-lg-offset-3 col-lg-6">
        <div class="row" style="padding-left: 5%;
    padding-right: 5%;">


                <div class="profile-img" >
                    <img  src="{{ asset('user_assets/assets/uploads/avatars/'.$user->avatar) }}" class="img-circle" alt="HelPic" />
                </div>


                <div class="profile-head">
                    <h5>
                        {{  $user->name  }} {{  $user->prenom }}
                    </h5>
                   <div class="user-info col-lg-12">
                       <table style="list-style: none;" class="table">
                           <tbody>

                           <tr>
                               <td class="strong">Fonction</td>
                               <td class="span">{{  $profession->libelle }}</td>
                           </tr>
                           <tr>
                               <td class="strong">Date de naissance</td>
                               <td class="span">{{  $user->date_naissance  }}</td>
                           </tr>
                           <tr>
                               <td class="strong">Adresse</td>
                               <td class="span">{{  $user->adresse }} </td>
                           </tr>
                           <tr>
                               <td class="strong">E-maile</td>
                               <td class="span">{{  $user->email  }}</td>
                           <tr>
                           <tr>
                               <td class="strong">Téléphone</td>
                               <td class="span">{{  $user->telephone  }}</td>
                           </tr>
                           </tbody>
                       </table>

                   </div>

                </div >
            <div class="edit_form col-md-12">
                <a href="{{ route('edit_profil') }}" class="btn btn-lg btn-pink  btn-custom btn-rounded waves-effect waves-" style="float: right" name="btnAddMore">Modifier le profil</a>

            </div>
        </div>
    </div>

@endsection

@section('docready')
    App.formElements();
    App.masks();

    $('#wilaya').change(function(){


    if($(this).val() != '')
    {
    var select = $(this).attr("id");

    var value = $(this).val();


    //alter(dependent);

    var _token = $('#signup-token').val();
    //alert( _token );
    $.ajax({

    //alert(value);
    url:"{{ route('construction.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token: $('#signup-token').val()},
    success:function(result)
    {
    $('#commune').html(result);
    //alert(value);

    }

    })
    }
    });

@endsection

