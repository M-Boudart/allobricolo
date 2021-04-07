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
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header  -->
    @include('partials.header')

    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="{{ asset('img/header-background.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <div class="section-title">
                            <h2>Annonces</h2>
                        </div>
                        <div class="hero__search__form">
                            <form action="{{ route('announcement.index') }}" method="POST">
                                @csrf
                                <input type="text" name="keyword" 
                                    placeholder="Mots cléfs séparés par des espaces...">
                                <div name="category" class="select__option">
                                    <select name="category">
                                        <option value="" selected>Catégories</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->category }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div name="locality" class="select__option">
                                    <select name="locality">
                                        <option value="" selected>Localité</option>
                                        @foreach ($localities as $locality)
                                            <option value="{{ $locality->id }}">
                                                {{ $locality->postal_code }} {{ $locality->locality }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit">Trier les annonces</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Announcement Result Section -->
    <section class="most-search spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Liste des annonces</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row">
                            @foreach ($announcements as $announcement)
                                <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        @if (sizeof($announcement->pictures) > 0)
                                            <div class="listing__item__pic set-bg"
                                            data-setbg="{{ asset('img/announcements/'.$announcement->pictures[0]->picture_url) }}">
                                        @else
                                            <div class="listing__item__pic set-bg"
                                            data-setbg="{{ asset('img/announcements/no-picture.png') }}">
                                        @endif
                                        @if (!empty($announcement->applicant->picture_url))
                                            <a href="#">
                                            <img src="{{ asset('img/users/'.$announcement->applicant->picture_url) }}"
                                            alt="Photo de profile de 
                                            {{$announcement->applicant->firstname}}">
                                            </a>
                                        @else
                                            <img src="{{ asset('img/users/no-profile.jpg') }}" alt="Photo de profile">
                                        @endif
                                        </div>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>{{ $announcement->title }}</h5>
                                                <div class="listing__item__text__rating">
                                                    <h6>{{ $announcement->price }} €</h6>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <span class="icon_pin_alt"></span>
                                                        {{ $announcement->address }},
                                                        {{ $announcement->locality->postal_code }} 
                                                        {{ $announcement->locality->locality }}
                                                    </li>
                                                    <li>
                                                        <span class="icon_phone"></span>
                                                        {{ $announcement->phone }}
                                                    </li>
                                                    <li>
                                                        <span class="material-icons-outlined"></span>
                                                        {{ $announcement->created_at }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div class="listing__item__text__info__left">
                                                    <span>
                                                        <a href="#" class="btn btn-primary">Plus d'infos</a>
                                                    </span>
                                                </div>
                                                <div class="listing__item__text__info__right">
                                                    <a href="#" class="btn btn-success">Proposer mon aide</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Announcement Result Section End -->

    <!-- Footer -->
    @include('partials.footer')

    <!-- Js Plugins -->
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