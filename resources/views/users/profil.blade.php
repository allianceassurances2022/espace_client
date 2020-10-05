@extends('default')

@section('title')
   page de profil
@endsection


@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/profil_style.css')}}" />
@endsection


@section('content')

    <div class="container emp-profile">
        <form method="post"">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <!--img src="user_assets/assets/images/bitbucket.png" alt=""/-->
                        <img src="src="{{ asset('user_assets/assets/uploads/avatars/'.$user->profil_picture) }}" alt=""/>
                        <!--
                        <form action="{{ route('update_avatar') }}" mathod="post">
                            <div class="file btn btn-lg btn-info">
                                Modifier la Photo
                                <input type="file" name="file"/>
                            </div>
                        </form>
-->
                    </div>
                </div>
                <div class="col-md-6">
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
                </div>

        </form>
    </div>

@endsection



