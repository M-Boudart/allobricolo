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
    <!-- Template Profile -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/workers.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header" style="background-color:black;">
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

    <!-- Workers List Section -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"><a href="#custom-modal" class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><i class="mdi mdi-plus"></i> Add Member</a></div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                @foreach ($workers as $worker)
                <div class="col-lg-4">
                        <div class="text-center card-box">
                            <div class="member-card pt-2 pb-2">
                                <div class="thumb-lg member-thumb mx-auto">
                                @if (!empty($worker->picture_url))
                                    <img src="{{ asset('img/users/'.$worker->picture_url) }}" 
                                    class="rounded-circle img-thumbnail" 
                                    alt="Photo de {{ $worker->firstname }}"
                                    style="width:78px;height:78px;">
                                @else
                                    <img src="{{ asset('img/users/no-profile.jpg') }}" 
                                    class="rounded-circle img-thumbnail" 
                                    alt="Photo de profile">
                                @endif
                                </div>
                                <div class="">
                                    <h4>{{  $worker->lastname }} {{ $worker->firstname }}</h4>
                                    <p class="text-muted"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                </div>
                                <button type="button" class="btn btn-primary mt-3 btn-rounded waves-effect w-md waves-light">Consulter le profile</button>
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-3">
                                                <h4>2563</h4>
                                                <p class="mb-0 text-muted">Annonces réalisées</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- <div class="row">
                <div class="col-12">
                    <div class="text-right">
                        <ul class="pagination pagination-split mt-0 float-right">
                            <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span> <span class="sr-only">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span> <span class="sr-only">Next</span></a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Workers List Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer" style="padding-top:20px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html">
                                <img src="{{ asset('template/img/footer-logo.png') }}" alt="">
                            </a>
                        </div>
                        <p>
                        Allo Bricolo est un site d'économie collaborative qui met en lien des personnes ayant besoin d'aide dans un domaine lié au bricolage.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6">
                    <div class="footer__address">
                        <ul>
                            <li>
                                <span>Appelez nous:</span>
                                <p>(+32) 456.286.598</p>
                            </li>
                            <li>
                                <span>Email:</span>
                                <p>info.allobricolo@gmail .com</p>
                            </li>
                            <li>
                                <span>Fax:</span>
                                <p>(+32) 432.210.628</p>
                            </li>
                            <li>
                                <span>Suivez nous:</span>
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
                            <li><a href="{{ route('welcome') }}">Accueil</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        <ul>
                            <li><a href="{{ route('login') }}">Se connecter</a></li>
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
                            <a href="#">Termes d'utilisation</a>
                            <a href="#">RGPD</a>
                            <a href="#">Politique des cookies</a>
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