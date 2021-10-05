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
                <div class="col-md-4">
                    <a href="{{ route('announcement.show', $announcement->id) }}" class="btn btn-primary">
                        Consulter l'annonce
                    </a>
                </div>
                @endif
            </div>

            @if (!(sizeof($selectedHelper) == 0 && sizeof($pendingHelpers) == 0))
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    @if (sizeof($selectedHelper) == 1)
                        <h1 style="font-size:150%">Bricoleur sélectionné</h1>
                    @else
                        <h1>Liste des candidatures</h1>
                    @endif
                    </div>
                    <div class="row">
                    @if (sizeof($selectedHelper) == 1)
                    <div class="col" style="margin-bottom:8px;">
                        <a href="{{ route('user.show', $selectedHelper[0]->helper->id) }}"><img src="{{ asset('storage/img/users/'.$selectedHelper[0]->helper->avatar) }}" alt="Photo de {{$selectedHelper[0]->helper->firstname}}" style="margin-left: 29px; width:110px;height:110px; border-radius:80px"></a>
                        {{ strtoupper($selectedHelper[0]->helper->lastname) }} {{ $selectedHelper[0]->helper->firstname }} viendra le {{ date('d-m-Y', strtotime($announcement->realised_at)) }} à {{ date('H:i', strtotime($announcement->realised_at)) }}
                    </div>
                    @else
                        @foreach($pendingHelpers as $helper)
                        <div class="col-md-4">
                            <div class="col-md-5" style="margin-bottom:8px;">
                                <a href="{{ route('user.show', $helper->helper->id) }}"><img src="{{ asset('storage/img/users/'.$helper->helper->avatar) }}" alt="Photo de {{$helper->helper->firstname}}" style="margin-left: 29px; width:110px;height:110px; border-radius:80px"></a>
                            </div>
                            <div class="col-md-7" style="text-align:center">
                                <ul style="list-style:none;">
                                    <li>{{ strtoupper($helper->helper->lastname) }} {{ $helper->helper->firstname }}</li>
                                    <li>
                                        <form action="{{ route('helper.select', ['announcementId' => $announcement->id, 'helperId' => $helper->helper->id]) }}" method="POST">
                                            @csrf
                                            <input type="datetime-local"name="realised_at">
                                            <button class="btn btn-secondary">Sélectionner</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{ $pendingHelpers->links() }}
                </div>
            </div>
            @else
            <div class="row">
                <p>Il n'y a pas encore de candidature pour votre annonce. Revenez plus tard.</p>
            </div>
            @endif
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