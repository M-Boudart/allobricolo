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
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                    @if (!empty($announcement->pictures->toArray()))
                    <a href="{{ asset('img/announcements/'.$announcement->pictures->toArray()[0]['picture_url']) }}">
                        <img src="{{ asset('storage/img/announcements/'.$announcement->pictures->toArray()[0]['picture_url']) }}" alt="Photo de l'annonce">
                    </a>
                    @else
                        <img src="{{ asset('img/announcements/no-picture.png') }}" alt="Aucune photo">
                    @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile-head">
                                <h5>
                                    {{ $announcement->title }}
                                </h5>
                                <p class="proile-rating">
                                    <span>Date de création :</span> {{ $announcement->created_at }}
                                </p>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">A propos</a>
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
                @if (Auth::id() == $announcement->applicant_user_id)
                <div class="col-md-2">
                    <a href="{{ route('announcement.edit', $announcement->id) }}" class="btn btn-primary">
                        Modifier
                    </a>
                </div>
                <div class="col-md-2">
                    <form action="{{ route('announcement.destroy', $announcement->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger"
                    onclick="return confirm('Voulez vous vraiment supprimer votre annonce ?')">
                        Supprimer
                    </button>
                    </form>
                </div>
                @endif
            </div>
            <div class="row">
                <!-- Colonne gauche (catégories) -->
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Categories :</p>
                        <p class="knowledges">
                        @foreach ($announcement->categories as $category)
                            {{$category->category}} <br />
                        @endforeach
                        </p>
                    </div>
                </div>
                <!-- Colonne millieu (informations) -->
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Titre</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $announcement->title }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prix</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $announcement->price }} €</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Adresse</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $announcement->address }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Localité</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $announcement->locality->postal_code }} {{ $announcement->locality->locality }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Description</label>
                                </div>
                                @if (!empty($announcement->description))
                                <div class="col-md-6">
                                    <p>{{ $announcement->description }}</p>
                                </div>
                                @else
                                <div class="col-md-6">
                                    <p>L'auteur n'a pas fait de description</p>
                                </div>
                                @endif
                            </div>
                            @if (Auth::id() != $announcement->applicant_user_id)
                            <div class="row" style="margin-top:3%;">
                                <div class="col-12" style="text-align:center;">
                                    @if (Auth::id() != $announcement->applicant->id)
                                        <form action="{{ route('announcement.apply', $announcement->id) }}" method="POST" style="display:inline">
                                            @csrf
                                            @if (Auth::check())
                                                <input type="hidden" name="authId" value="{{ Auth::id() }}">
                                            @endif
                                                <button class="btn btn-success">Proposer mon aide</button>
                                        </form>
                                    @endif
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Signaler l'annonce
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @if (Auth::id() != $announcement->applicant_user_id)
        @include('partials.reportModal', [
            'type' => "announcements",
            'ressourceId' => $announcement->id,
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