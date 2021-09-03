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
        <form action="{{ route('announcement.edit', $announcement->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
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
                <div class="col-md-6">
                    <div class="profile-head">
                        <h6>Formulaire de modification d'annonce</h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">A propos</a>
                            </li>
                        </ul>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <!-- Colonne gauche (connaissances) -->
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>CONNAISSANCES :</p>
                        <ol style="list-style-type:none;">
                        @foreach ($categories as $category)
                        <li class="knowledges">
                            <label for="{{ $category->category }}">{{ $category->category }}</label>
                            <input id="{{ $category->category }}" 
                                type="checkbox"
                                name="categories[]"
                                value="{{ $category->id }}" 
                            >
                        </li>
                        @endforeach
                        </ol>
                    </div>
                </div>
                <!-- Colonne millieu (informations) -->
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="title">Titre</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="title" type="text" name="title" placeholder="{{ $announcement->title}}" class="form-control" 
                                    value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="address">Adresse</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="address" type="text" name="address" placeholder="{{ $announcement->address}}" class="form-control"
                                    value="{{ old('address') }}">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="locality">Localité</label>
                                </div>
                                <div class="col-md-6">
                                <select id ="locality" class="form-control" name="locality_id">
                                @foreach ($localities as $locality)
                                    @if ($announcement->locality->id === $locality->id)
                                    <option value="{{ $locality->id }}" selected>
                                        {{ $locality->postal_code }} {{ $locality->locality }}
                                    </option>
                                    @else
                                    <option value="{{ $locality->id }}">
                                        {{ $locality->postal_code }} {{ $locality->locality }}
                                    </option>
                                    @endif
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="price">Prix</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="price" type="number" name="price" placeholder="{{ $announcement->price}}" class="form-control"
                                    value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="phone">Numéro de téléphone</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="phone" type="text" name="phone" placeholder="{{ $announcement->phone}}" class="form-control">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="description">Description</label>
                                </div>
                                <div class="col-md-6">
                                    <textarea id="description" name="description" placeholder="{{ $announcement->description}}" class="form-control" 
                                    value="{{ old('description') }}"></textarea>
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <label for="pictures">Photo</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="pictures" type="file" name="pictures" class="form-control-file">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="500000">
                                </div>
                            </div>
                            <div class="row form-div">
                                <div class="col-md-6">
                                    <a href="{{ route('announcement.show', $announcement->id) }}"
                                    class="btn btn-danger">Annuler les modifications</a>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary">Modifier mes informations</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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