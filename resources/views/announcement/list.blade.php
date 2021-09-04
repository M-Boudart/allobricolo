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

    <style>
        header {
            background-image: url(../img/bandeau.png);
        }
    </style>
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


@include('partials.header')

<!-- Announcement Result Section -->
<section class="most-search spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Mes annonces</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="row">
                        @foreach ($announcements as $announcement)
                            @include('partials.announcementCard', [
                                        'announcement' => $announcement,
                                    ])
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