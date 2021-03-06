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

    <!-- Header -->
    @include('partials.header')

    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="{{ asset('img/header-background.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <div class="section-title">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <h2>Le site qui rassemble les bricoleurs pr??t de chez vous !</h2>
                            <p><a href="{{ route('announcement.create') }}" class="btn btn-danger">Postez votre annonce d??s maintenant</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- How does it work Begin -->
    <section class="work spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Comment ??a marche ?</h2>
                        <p>Trouver de l'aide pr??t de chez vous en seulement 3 ??tapes !</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="work__item">
                        <div class="work__item__number">01.</div>
                        <img src="{{ asset('template/img/work/work-1.png') }}" alt="">
                        <h5>Annonce</h5>
                        <p>
                            Postez une annonce afin que nos bricoleurs connaissent votre probl??me.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="work__item">
                        <div class="work__item__number">02.</div>
                        <img src="{{ asset('template/img/work/work-2.png') }}" alt="">
                        <h5>Discution</h5>
                        <p>
                            Discutez avec les bricoleurs qui vous ont propos?? leur aide.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="work__item">
                        <div class="work__item__number">03.</div>
                        <img src="{{ asset('template/img/work/work-3.png') }}" alt="">
                        <h5>Rendez-vous</h5>
                        <p>
                            Fixez un rendez-vous afin que notre bricoleur puisse vous donner un coup de main.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How does it work End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial spad set-bg" 
    data-setbg="{{ asset('template/img/testimonial/testimonial-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Une communaut?? de plusieurs centaines de personnes</h2>
                        <p>Les bricoleurs mis en avant cette semaine</p>
                    </div>
                    <div class="testimonial__slider owl-carousel">
                        <div class="testimonial__item" data-hash="review-1">
                            <p>" We worked with Consultant. Our representative was very knowledgeable and helpful.
                                Consultant made a number of suggestions to help improve our systems. Consultant
                                explained how things work and why it would help."</p>
                            <div class="testimonial__item__author">
                                <a href="#review-3">
                                    <img src="{{ asset('template/img/testimonial/author-3.png') }}" alt="">
                                </a>
                                <a href="#review-1" class="active">
                                    <img src="{{ asset('template/img/testimonial/author-1.png') }}" alt="">
                                </a>
                                <a href="#review-2">
                                    <img src="{{ asset('template/img/testimonial/author-2.png') }}" alt="">
                                </a>
                            </div>
                            <div class="testimonial__item__author__text">
                                <h5>John Smith -</h5>
                                <div class="testimonial__item__author__rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial__item" data-hash="review-2">
                            <p>" We worked with Consultant. Our representative was very knowledgeable and helpful.
                                Consultant made a number of suggestions to help improve our systems. Consultant
                                explained how things work and why it would help."</p>
                            <div class="testimonial__item__author">
                                <a href="#review-1">
                                    <img src="{{ asset('template/img/testimonial/author-1.png') }}" alt="">
                                </a>
                                <a href="#review-2" class="active">
                                    <img src="{{ asset('template/img/testimonial/author-2.png') }}" alt="">
                                </a>
                                <a href="#review-3">
                                    <img src="{{ asset('template/img/testimonial/author-3.png') }}" alt="">
                                </a>
                            </div>
                            <div class="testimonial__item__author__text">
                                <h5>John Smith -</h5>
                                <div class="testimonial__item__author__rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <span>CEO Colorlib</span>
                        </div>
                        <div class="testimonial__item" data-hash="review-3">
                            <p>" We worked with Consultant. Our representative was very knowledgeable and helpful.
                                Consultant made a number of suggestions to help improve our systems. Consultant
                                explained how things work and why it would help."</p>
                            <div class="testimonial__item__author">
                                <a href="#review-2">
                                    <img src="{{ asset('template/img/testimonial/author-2.png') }}" alt="">
                                </a>
                                <a href="#review-3" class="active">
                                    <img src="{{ asset('template/img/testimonial/author-3.png') }}" alt="">
                                </a>
                                <a href="#review-1">
                                    <img src="{{ asset('template/img/testimonial/author-1.png') }}" alt="">
                                </a>
                            </div>
                            <div class="testimonial__item__author__text">
                                <h5>John Smith -</h5>
                                <div class="testimonial__item__author__rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <span>CEO Colorlib</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Latest Announcements Begin -->
    <section class="news-post spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Les 3 derni??res annonces</h2>
                        <p>Checkez les derni??res annonces de nos membres.</p>
                        <p>
                            <a href="{{ route('announcement.index') }}" 
                            class="color:black">Plus d'annonces</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestAnnouncements as $announcement)
                    @include('partials.announcementCard', [
                        'announcement' => $announcement,
                    ])
                @endforeach
            </div>
        </div>
    </section>
    
    <!-- Latest Announcements End -->

    <!-- Newslatter Begin -->
    <section class="newslatter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="newslatter__text">
                        <h3>Newsletter</h3>
                        <p>Abonnez vous ?? la newsletter pour ne rater aucune information.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="#" class="newslatter__form">
                        <input type="text" placeholder="Votre email">
                        <button type="submit">M'abonner</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Newslatter End -->

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