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

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{ asset('template/img/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="{{ route('welcome') }}">Accueil</a></li>
                                <li><a href="{{ route('announcement.index') }}">Annonces</a></li>
                                <li><a href="#">Nos bricoleurs</a></li>
                                <li><a href="#">Langue</a>
                                    <ul class="dropdown">
                                        <li><a href="./about.html">Fr</a></li>
                                        <li><a href="./listing-details.html">Ndls</a></li>
                                        <li><a href="./blog-details.html">Ang</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="header__menu__right">
                            @if (Auth::check())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="primary-btn">Deconnexion</button>
                            </form>
                            <a href="{{ route('login') }}" class="login-btn"><i class="fa fa-user"></i></a>
                            @else
                            <a href="{{ route('register') }}" class="primary-btn">S'inscrire</a>
                            <a href="{{ route('login') }}" class="login-btn"><i class="fa fa-user"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="{{ asset('template/img/hero/hero-bg.jpg') }}">
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

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html">
                                <img src="{{ asset('template/img/footer-logo.png') }}" alt="">
                            </a>
                        </div>
                        <p>Challenging the way things have always been done can lead to creative new options that reward
                            you.</p>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6">
                    <div class="footer__address">
                        <ul>
                            <li>
                                <span>Call Us:</span>
                                <p>(+12) 345-678-910</p>
                            </li>
                            <li>
                                <span>Email:</span>
                                <p>info.colorlib@gmail .com</p>
                            </li>
                            <li>
                                <span>Fax:</span>
                                <p>(+12) 345-678-910</p>
                            </li>
                            <li>
                                <span>Connect Us:</span>
                                <div class="footer__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-skype"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="footer__widget">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">How it work</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">How it Work</a></li>
                            <li><a href="#">Advantages</a></li>
                            <li><a href="#">Direo App</a></li>
                            <li><a href="#">Packages</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                        <div class="footer__copyright__links">
                            <a href="#">Terms</a>
                            <a href="#">Privacy Policy</a>
                            <a href="#">Cookie Policy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

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