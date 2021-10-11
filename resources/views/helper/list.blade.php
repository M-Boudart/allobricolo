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
                    <h2>Mes candidatures</h2>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if (sizeof($notSelectedHelper) > 0)
        <div class="row">
            <h3>Non retenues</h3>
            <div class="col-lg-12">
                <div class="tab-content">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Annonce</th>
                        <th scope="col"></th>
                        <th scope="col">Statut</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($notSelectedHelper as $helper)
                        <tr>
                            <td>
                            @if (sizeof($helper->announcement->pictures) > 0)
                                <a href="{{ route('announcement.show', $helper->announcement->id) }}">
                                <img style="width:100px;height:100px;" alt="{{ $helper->announcement->title }}"
                                src="{{ asset('storage/img/announcements/'.$helper->announcement->pictures[0]->picture_url) }}">
                                </a>
                            @else
                                <a href="{{ route('announcement.show', $helper->announcement->id) }}">
                                <img style="width:100px;height:100px;" alt="{{ $helper->announcement->title }}"
                                src="{{ asset('img/announcements/no-picture.png') }}">
                                </a>
                            @endif
                            </td>
                            <td>
                                {{ $helper->announcement->title }}
                            </td>
                            <td>
                                Pas sélectionné
                            </td>
                            <td>
                                <form action="{{ route('helper.destroy', $helper->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Voulez vous supprimer votre candidature non retenue?')">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        {{ $notSelectedHelper->links() }}
                    </div>
                </div>
        </div>
        @endif
        @if (sizeof($pendingHelper) > 0)
        <div class="row">
            <h3>En attente de sélection</h3>
            <div class="col-lg-12">
                <div class="tab-content">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Annonce</th>
                        <th scope="col"></th>
                        <th scope="col">Statut</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($pendingHelper as $helper)
                        <tr>
                            <td>
                            @if (sizeof($helper->announcement->pictures) > 0)
                                <a href="{{ route('announcement.show', $helper->announcement->id) }}">
                                <img style="width:100px;height:100px;" alt="{{ $helper->announcement->title }}"
                                src="{{ asset('storage/img/announcements/'.$helper->announcement->pictures[0]->picture_url) }}">
                                </a>
                            @else
                                <a href="{{ route('announcement.show', $helper->announcement->id) }}">
                                <img style="width:100px;height:100px;" alt="{{ $helper->announcement->title }}"
                                src="{{ asset('img/announcements/no-picture.png') }}">
                                </a>
                            @endif
                            </td>
                            <td>
                                {{ $helper->announcement->title }}
                            </td>
                            <td>
                                En attente
                            </td>
                            <td>
                                <form action="{{ route('helper.destroy', $helper->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Voulez vous supprimer votre candidature non retenue?')">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        {{ $pendingHelper->links() }}
                    </div>
                </div>
        </div>
        @endif
        @if (sizeof($selectedHelper) > 0)
        <div class="row">
            <h3>Sélectionné</h3>
            <div class="col-lg-12">
                <div class="tab-content">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Annonce</th>
                        <th scope="col"></th>
                        <th scope="col">Statut</th>
                        <th scope="col">Date de rendez vous</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($selectedHelper as $helper)
                        <tr>
                            <td>
                            @if (sizeof($helper->announcement->pictures) > 0)
                                <a href="{{ route('announcement.show', $helper->announcement->id) }}">
                                <img style="width:100px;height:100px;" alt="{{ $helper->announcement->title }}"
                                src="{{ asset('storage/img/announcements/'.$helper->announcement->pictures[0]->picture_url) }}">
                                </a>
                            @else
                                <a href="{{ route('announcement.show', $helper->announcement->id) }}">
                                <img style="width:100px;height:100px;" alt="{{ $helper->announcement->title }}"
                                src="{{ asset('img/announcements/no-picture.png') }}">
                                </a>
                            @endif
                            </td>
                            <td>
                                {{ $helper->announcement->title }}
                            </td>
                            <td>
                                Sélectionné
                            </td>
                            <td>
                                {{ date('d-m-Y à H:i', strtotime($helper->announcement->realised_at)) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        {{ $selectedHelper->links() }}
                    </div>
                </div>
        </div>
        @endif
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