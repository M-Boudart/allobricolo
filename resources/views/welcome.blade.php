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
                            <h2>Le site qui rassemble les bricoleurs prêt de chez vous !</h2>
                            <p><a href="{{ route('announcement.create') }}" class="btn btn-danger">Postez votre annonce dès maintenant</a></p>
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
                        <h2>Comment ça marche ?</h2>
                        <p>Trouver de l'aide prêt de chez vous en seulement 3 étapes !</p>
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
                            Postez une annonce afin que nos bricoleurs connaissent votre problème.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="work__item">
                        <div class="work__item__number">02.</div>
                        <img src="{{ asset('template/img/work/work-2.png') }}" alt="">
                        <h5>Discution</h5>
                        <p>
                            Discutez avec les bricoleurs qui vous ont proposé leur aide.
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
                        <h2>Une communauté de plusieurs centaines de personnes</h2>
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
                        <h2>Les 3 dernières annonces</h2>
                        <p>Checkez les dernières annonces de nos membres.</p>
                        <p>
                            <a href="{{ route('announcement.index') }}" 
                            class="color:black">Plus d'annonces</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestAnnouncements as $latestAnnouncement)
                <div class="col-lg-4 col-md-6">
                    <div class="listing__item">
                        @if (sizeof($latestAnnouncement->pictures) > 0)
                            <div class="listing__item__pic set-bg"
                            data-setbg="{{ asset('storage/img/announcements/'.$latestAnnouncement->pictures[0]->picture_url) }}">
                        @else
                            <div class="listing__item__pic set-bg"
                            data-setbg="{{ asset('img/announcements/no-picture.png') }}">
                        @endif
                        @if (!empty($latestAnnouncement->applicant->picture_url))
                            <a href="{{ route('user.show', $latestAnnouncement->applicant->id) }}">
                            <img src="{{ asset('img/users/'.$latestAnnouncement->applicant->picture_url) }}"
                            alt="Photo de profile de 
                            {{$latestAnnouncement->applicant->firstname}}">
                            </a>
                        @else
                            <a href="{{ route('user.show', $latestAnnouncement->applicant->id) }}">
                            <img src="{{ asset('img/users/no-profile.jpg') }}" alt="Photo de profil">
                            </a>
                        @endif
                        </div>
                        <div class="listing__item__text">
                            <div class="listing__item__text__inside">
                                <h5>{{ $latestAnnouncement->title }}</h5>
                                <div class="listing__item__text__rating">
                                    <h6>{{ $latestAnnouncement->price }} €</h6>
                                </div>
                                <ul>
                                    <li>
                                        <span class="icon_pin_alt"></span>
                                        {{ $latestAnnouncement->address }},
                                        {{ $latestAnnouncement->locality->postal_code }} 
                                        {{ $latestAnnouncement->locality->locality }}
                                    </li>
                                    <li>
                                        <span class="icon_phone"></span>
                                        {{ $latestAnnouncement->phone }}
                                    </li>
                                    <li>
                                        <span class="material-icons-outlined"></span>
                                        {{ $latestAnnouncement->created_at }}
                                    </li>
                                </ul>
                            </div>
                            <div class="listing__item__text__info"> 
                                <div class="listing__item__text__info__left">
                                    <span>
                                        <a href="{{ route('announcement.show', $latestAnnouncement->id) }}" class="btn btn-primary">Plus d'infos</a>
                                    </span>
                                </div>
                                @if (Auth::id() != $latestAnnouncement->applicant->id)
                                <div class="listing__item__text__info__right">
                                    <form action="{{ route('announcement.apply', $latestAnnouncement->id) }}" method="POST">
                                        @csrf
                                        @if (Auth::check())
                                            <input type="hidden" name="authId" value="{{ Auth::id() }}">
                                        @endif
                                            <button class="btn btn-success">Proposer mon aide</button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
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
                        <p>Abonnez vous à la newsletter pour ne rater aucune information.</p>
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