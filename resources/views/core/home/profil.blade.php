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
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                        <div class="file btn btn-lg btn-info">
                            Modifier la Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                           {{  $user->name  }} {{  $user->prenom }}
                        </h5>
                        <h6>
                            {{  $user->profession  }}
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
<!--
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">A propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Liste</a>
                            </li>
                        </ul>

                        -->
                    </div>
                </div>

                <div class="col-md-2">
                    <!--input type="submit" class="profile-edit-btn" name="btnAddMore" value="Modifier le profil"/-->
                    <a href="{{ route('edit_profil') }}" class="profile-edit-btn" name="btnAddMore">Modifier le profil</a>
                </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-4">
                <!--    <div class="profile-work">
                        <p>WORK LINK</p>
                        <a href="">Website Link</a><br/>
                        <a href="">Bootsnipp Profile</a><br/>
                        <a href="">Bootply Profile</a>
                        <p>SKILLS</p>
                        <a href="">Web Designer</a><br/>
                        <a href="">Web Developer</a><br/>
                        <a href="">WordPress</a><br/>
                        <a href="">WooCommerce</a><br/>
                        <a href="">PHP, .Net</a><br/>
                    </div> -->
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Kshiti123</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection



