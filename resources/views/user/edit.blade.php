<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Directing Template">
    <meta name="keywords" content="Directing, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Allo Bricolo</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/barfiller.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}" type="text/css">

    <!-- Profile template -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" type="text/css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    @include('partials.header')

    <div class="container emp-profile">
        <form action="{{ route('user.edit', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                    @if (!empty($user->picture_url))
                        <img src="{{ asset('img/users/'.$user->picture_url) }}" alt="Photo de {{$user->firstname}}">
                    @else
                        <img src="{{ asset('img/users/no-profile.jpg') }}" alt="Photo de profil">
                    @endif
                    <div class="file btn btn-lg btn-primary">
                        {{ $user->status->status }}
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                                <h5>
                                    {{strtoupper($user->lastname)}}  {{$user->firstname}}
                                </h5>
                                <h6>Formulaire de modification de profil</h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">A propos</a>
                            </li>
                        </ul>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <!-- Colonne gauche (connaissances) -->
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>CONNAISSANCES :</p>
                        <ol style="list-style-type:none;">
                        @foreach ($categories as $category)
                        <li class="knowledges">
                            <label for="{{ $category->category }}">{{ $category->category }}</label>
                            <input id="{{ $category->category }}" 
                                type="checkbox"
                                name="knowledges[]"
                                value="{{ $category->id }}"
                            @php
                                
                            @endphp    
                            >
                        </li>
                        @endforeach
                        </ol>
                    </div>
                </div>
                <!-- Colonne millieu (informations) -->
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="lastname">Nom</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="lastname" type="text" name="lastname" placeholder="{{ $user->lastname}}" class="form-control" 
                                    value="{{ old('lastname') }}">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="firstname">Prénom</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="firstname" type="text" name="firstname" placeholder="{{ $user->firstname}}" class="form-control"
                                    value="{{ old('firstname') }}">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="login">Login</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="login" type="text" name="login" placeholder="{{ $user->login}}" class="form-control"
                                    value="{{ old('login') }}">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" placeholder="{{ $user->email}}" class="form-control"
                                    value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="password">Mot de passe</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="password" type="password" name="password"  class="form-control">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="password_confirmation">Confirmation mot de passe</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" name="password_confirmation"  class="form-control">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="description" name="description" placeholder="{{ $user->description}}" class="form-control" 
                                    value="{{ old('description') }}"></textarea>
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="picture">Photo de profil</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="picture" type="file" name="picture" class="form-control-file">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <a href="{{ route('user.show', $user->id) }}"
                                    class="btn btn-danger">Annuler les modifications</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary">Modifier mes informations</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('partials.footer')
    <!-- Js Plugins Template de base -->
    <script src="{{ asset('template/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>
</html>