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
    <style>
    p { color:black;}
    </style>
</head>

<body>
    @include('partials.header')

    <div class="container emp-profile">
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
                <div class="col-md-4">
                    <div class="profile-head">
                                <h5>
                                    {{strtoupper($user->lastname)}}  {{$user->firstname}}
                                </h5>
                                    @if (sizeof($user->knowledges) > 0)
                                        <h6>Bricoleur</h6>
                                        <p class="proile-rating">
                                            Nombre d'annonces réalisées : <span>{{ $nbAnnouncementRealised }}</span>
                                        </p>
                                        <p class="proile-rating">
                                            Moyenne des notes : <span>0</span>
                                        </p>
                                    @else
                                        <h6>Requérant</h6>
                                    @endif
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <p class="nav-link" style="color:#495057">A propos</p>
                            </li>
                        </ul>
                    </div>
                    @if (session('success'))
                        <div class="row">
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        </div>
                    @elseif (session('error'))
                        <div class="row">
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        </div>
                    @endif
                </div>
                @if (Auth::id() == $user->id)
                <div class="col-md-2">
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">
                        Modifier mon profil
                    </a>
                </div>
                <div class="col-md-2">
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger"
                    onclick="confirm('Voulez vous vraiment supprimer votre profil ?')">
                        Supprimer mon profil
                    </button>
                    </form>
                </div>
                @else
                <div class="col-md-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Signaler le profile
                    </button>
                </div>
                @endif
            </div>
            <div class="row">
                <!-- Colonne gauche (connaissances) -->
                <div class="col-md-4">
                    <div class="profile-work">
                    @if (sizeof($user->knowledges) > 0)
                        <p>CONNAISSANCES :</p>
                        <p class="knowledges">
                        @foreach ($user->knowledges as $knowledge)
                            {{$knowledge->category}} <br />
                        @endforeach
                        </p>
                    @endif
                    </div>
                </div>
                <!-- Colonne millieu (informations) -->
                <div class="col-md-8">
                    <div class="tab-content profile-tab">
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nom</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ strtoupper($user->lastname) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prénom</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->firstname }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            @if (!empty($user->description))
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $user->description }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Annonces / reviews -->

            <div class="row" style="margin-top:3%">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ses annonces</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ses reviews</a>
                            </li>
                        </ul>
                   </div> 
                <div class="col-12">
                   <div class="tab-content col-12" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @if (sizeof($announcements) > 0)
                                @foreach ($announcements as $announcement)
                                    <div class="col-md-6 col-md-12" style="padding:0px">
                                        <div class="card mb-3" style="max-width: 540px;">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                @if (sizeof($announcement->pictures) > 0)
                                                    <img src="{{ asset('storage/img/announcements/'.$announcement->pictures[0]->picture_url) }}">
                                                @else
                                                    <img src="{{ asset('img/announcements/no-picture.png') }}">
                                                @endif
                                                </div>
                                                <div class="col-md-8">
                                                <div class="card-body" style="color:black">
                                                    <h5 class="card-title">{{ $announcement->title }}</h5>
                                                    <p class="card-text" style="color:red;font-weight:bold;">{{ $announcement->price }} €</p>
                                                    <p class="card-text"><span class="icon_pin_alt"></span>
                                                    {{ $announcement->address }},
                                                    {{ $announcement->locality->postal_code }} 
                                                    {{ $announcement->locality->locality }}
                                                    </p>
                                                    <p class="card-text"><span class="icon_phone"></span>
                                                    {{ $announcement->phone }}
                                                    </p>
                                                    <p class="card-text">
                                                    <small class="text-muted">{{ $announcement->created_at }}</small>
                                                    </p> 
                                                    <p class="card-text">
                                                    <a href="{{ route('announcement.show',$announcement->id) }}" class="btn btn-primary">Plus d'info</a>
                                                    <a href="#"
                                                    class="btn btn-success">
                                                    Aider</a>
                                                    </p>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row">
                                    Cet utilisateur n'a pas d'annonce pour l'instant.
                                </div>
                            @endif
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @if (sizeof($reviews) > 0)
                                @foreach ($reviews as $review)
                                <div class="row">   
                                    <div class="card col-12">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $review->note }} / 10</h5>
                                            <p class="card-text">{{ $review->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="row">
                                    Cet utilisateur n'a pas encore de review.
                                </div>
                            @endif
                            </div>
                        </div>
                </div>
            </div>
            <!-- Fin annonces / reviews -->
    </div>
    </div>

    @if (Auth::id() != $user->id)
        @include('partials.reportModal', [
            'type' => "profile",
            'ressourceId' => $user->id
        ])
    @endif

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