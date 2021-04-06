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
    <section class="hero set-bg" data-setbg="{{ asset('template/img/hero/hero-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <div class="section-title">
                            <h2>Le site qui rassemble les bricoleurs prêt de chez vous !</h2>
                            <p><a href="#" class="btn btn-danger">Postez votre annonce dès maintenant</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Most Popular Categories</h2>
                        <p>Travelocity empowers travelers who are giving back on their trips in ways big and small</p>
                    </div>
                    <div class="categories__item__list">
                        <div class="categories__item">
                            <img src="{{ asset('template/img/categories/cat-1.png') }}" alt="">
                            <h5>Food & Drink</h5>
                            <span>78 Listings</span>
                        </div>
                        <div class="categories__item">
                            <img src="{{ asset('template/img/categories/cat-2.png') }}" alt="">
                            <h5>Restaurent</h5>
                            <span>32 Listings</span>
                        </div>
                        <div class="categories__item">
                            <img src="{{ asset('template/img/categories/cat-3.png') }}" alt="">
                            <h5>Hotels</h5>
                            <span>16 Listings</span>
                        </div>
                        <div class="categories__item">
                            <img src="{{ asset('template/img/categories/cat-4.png') }}" alt="">
                            <h5>Beauty & Spa</h5>
                            <span>55 Listings</span>
                        </div>
                        <div class="categories__item">
                            <img src="{{ asset('template/img/categories/cat-5.png') }}" alt="">
                            <h5>Shopping</h5>
                            <span>23 Listings</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Work Section Begin -->
    <section class="work spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>How Does It Work</h2>
                        <p>Travelocity empowers travelers who are giving back on their trips in ways big and small</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="work__item">
                        <div class="work__item__number">01.</div>
                        <img src="{{ asset('template/img/work/work-1.png') }}" alt="">
                        <h5>Location & Categories</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="work__item">
                        <div class="work__item__number">02.</div>
                        <img src="{{ asset('template/img/work/work-2.png') }}" alt="">
                        <h5>Explore Listting</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="work__item">
                        <div class="work__item__number">03.</div>
                        <img src="{{ asset('template/img/work/work-3.png') }}" alt="">
                        <h5>Making Appointments</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Work Section End -->

    <!-- Feature Location Section Begin -->
    <section class="feature-location spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Top Featured Locations</h2>
                        <p>Explore restaurants, bars, and cafés by locality</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="#" class="feature__location__item large-item set-bg"
                        data-setbg="{{ asset('template/img/feature-location/fl-1.jpg') }}">
                        <div class="feature__location__item__text">
                            <h5>Washington, D.C</h5>
                            <ul>
                                <li>2045 Listings</li>
                                <li>3648 Users</li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <a href="#" class="feature__location__item set-bg"
                                data-setbg="{{ asset('template/img/feature-location/fl-2.jpg') }}">
                                <div class="feature__location__item__text">
                                    <h5>Chicago</h5>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <a href="#" class="feature__location__item set-bg"
                                data-setbg="{{ asset('template/img/feature-location/fl-3.jpg') }}">
                                <div class="feature__location__item__text">
                                    <h5>San Antonio</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                    <a href="#" class="feature__location__item set-bg" 
                        data-setbg="{{ asset('template/img/feature-location/fl-4.jpg') }}">
                        <div class="feature__location__item__text">
                            <h5>Los Angeles</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Location Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial spad set-bg" 
    data-setbg="{{ asset('template/img/testimonial/testimonial-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Trusted By Over 5000+ User</h2>
                        <p>What people say about us</p>
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
                            <span>CEO Colorlib</span>
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

    <!-- Blog Section Begin -->
    <section class="news-post spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>News Post</h2>
                        <p>Checkout Latest News And Articles From Our Blog</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg"
                        data-setbg="{{ asset('template/img/blog/blog-1.jpg') }}">
                            <a href="https://www.youtube.com/watch?v=8EJ3zbKTWQ8" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="blog__item__text">
                            <ul class="blog__item__tags">
                                <li><i class="fa fa-tags"></i> Travel</li>
                                <li>Videos</li>
                            </ul>
                            <h5><a href="#">Internet Banner Advertising Most Reliable</a></h5>
                            <ul class="blog__item__widget">
                                <li><i class="fa fa-clock-o"></i> 19th March, 2019</li>
                                <li><i class="fa fa-user"></i> John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" 
                            data-setbg="{{ asset('template/img/blog/blog-2.jpg') }}"></div>
                        <div class="blog__item__text">
                            <ul class="blog__item__tags">
                                <li><i class="fa fa-tags"></i> Travel</li>
                                <li>Restaurant</li>
                            </ul>
                            <h5><a href="#">Internet Banner Advertising Most Reliable</a></h5>
                            <ul class="blog__item__widget">
                                <li><i class="fa fa-clock-o"></i> 19th March, 2019</li>
                                <li><i class="fa fa-user"></i> John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" 
                            data-setbg="{{ asset('template/img/blog/blog-3.jpg') }}"></div>
                        <div class="blog__item__text">
                            <ul class="blog__item__tags">
                                <li><i class="fa fa-tags"></i> Travel</li>
                                <li>Restaurant</li>
                            </ul>
                            <h5><a href="#">Internet Banner Advertising Most Reliable</a></h5>
                            <ul class="blog__item__widget">
                                <li><i class="fa fa-clock-o"></i> 19th March, 2019</li>
                                <li><i class="fa fa-user"></i> John Smith</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Newslatter Section Begin -->
    <section class="newslatter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="newslatter__text">
                        <h3>Subscribe Newsletter</h3>
                        <p>Subscribe to our newsletter and don’t miss anything</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form action="#" class="newslatter__form">
                        <input type="text" placeholder="Your email">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Newslatter Section End -->

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