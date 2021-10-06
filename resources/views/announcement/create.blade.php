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

    <!-- Mon css -->
    <link rel="stylesheet" href="{{ asset('css/announcement-create.css') }}" type="text/css">

    <style>
        .primary-btn {
            display: inline-block !important;
            font-size: 14px !important;
            padding: 12px 30px 10px !important;
            color: #ffffff !important;
            text-transform: uppercase !important;
            font-weight: 700 !important;
            background: #f03250 !important;
            border-radius: 2px !important;
            border-color: #f03250 !important;
        }
    </style>
</head>
<body>
    <!-- Header -->
    @include('partials.header')
    <section>
    <div class="container px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <h2 class="text-center mb-4">Création d'une annonce</h2>
                <form class="form-card" action="{{ route('announcement.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row justify-content-between text-left">
                        <div class="row justify-content-between text-left col-12">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3">Titre<span class="text-danger"> *</span></label> 
                                <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Titre"> 
                            </div>
                                @error('title')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Prix<span class="text-danger"> *</span></label> 
                            <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Prix">
                            @error('price')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Téléphone<span class="text-danger"> *</span></label> 
                            <input id="phone" name="phone"  type="text" class="form-control" placeholder="Téléphone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Adresse<span class="text-danger"> *</span></label> 
                            <input id="address" name="address" type="text"  class="form-control" placeholder="Adresse" value="{{ old('address') }}">
                            @error('title')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Localité<span class="text-danger"> *</span></label> 
                            <select id ="locality" class="form-control" name="locality_id">
                                @foreach ($localities as $locality)
                                    <option value="{{ $locality->id }}">
                                        {{ $locality->postal_code }} {{ $locality->locality }}
                                    </option>
                                @endforeach
                            </select>
                            @error('locality')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> 
                            <p style="font-size: 1.3em;">Catégories<span class="text-danger"> *</span></p> 
                            <div class="form-row">
                                @foreach ($categories as $category)
                                    <div class="form-group col-md-4">
                                        <label for="checkbox{{ $category->category }}" class="form-check-label"
                                        style="margin-right:25px;">
                                            {{ $category->category }}
                                        </label>
                                        <input id="checkbox{{ $category->category }}" type="checkbox" name="categories[]" class="form-check-input" value="{{ $category->category }}">
                                    </div>
                                @endforeach
                                @error('categories')
                                    <span class="error">You must select at least one category</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between text-left col-12">
                        <div class="form-group col-12 flex-column d-flex"> 
                            <label class="form-control-label px-3">Description</span></label> 
                            <textarea id="description" name="description" placeholder="Description" class="form-control" value="{{ old('description') }}"></textarea>
                        </div>
                        @error('description')
                            <span class="error">{{ $message }}</span>
                        @enderror 
                    </div>
                    <div class="row justify-content-between text-left col-12">
                        <div class="form-group col-12 flex-column d-flex"> 
                            <label class="form-control-label px-3">Description</span></label> 
                            <input id="pictures" type="file" name="pictures[]" class="form-control" multiple>
                        </div>
                        @error('pictures')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> 
                            <button type="submit" class="btn-block btn-primary">Créer mon annonce</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

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