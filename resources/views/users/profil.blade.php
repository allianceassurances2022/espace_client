@extends('default')

@section('head_title')
    Profil
@endsection

@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/profil_style.css')}}" />
@endsection


@section('content')

    <div class="container emp-profile col-lg-offset-3 col-lg-6">
        <div class="row">
            <form method="post col-lg-6">
                @csrf
                <div class="col-lg-offset-3 center profile-img" >
                    <img  src="{{ asset('user_assets/assets/uploads/avatars/'.$user->avatar) }}" class="img-circle" alt="HelPic" />
                </div>

                <div class="">
                    <div class="profile-head">
                        <h5>
                            {{  $user->name  }} {{  $user->prenom }}
                        </h5>
                        <h6>
                        </h6>
                        <p>
                            {{  $user->date_naissance  }}

                            <br>
                            {{  $user->adresse }} <span>

                            <br>
                                {{  $user->email  }}
                                <br>
                            {{  $user->telephone  }}

                        </p>

                    </div>
                </div>
                <a href="{{ route('edit_profil') }}" class="profile-edit-btn" name="btnAddMore">Modifier le profil</a>
            </form>
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

