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
</head>
<body>
    <!-- Header -->
    @include('partials.header')
    
    <section class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Créer votre annonce</h2>
                    </div>
                </div>
            </div>
            
            <form  action="{{ route('announcement.create') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Titre*</label>
                        <input id="title" type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Titre">
                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Prix*</label>
                        <input type="text" name="price"  class="form-control" id="price" value="{{ old('price') }}" placeholder="Prix">
                        @error('price')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Téléphone*</label>
                        <input id="phone" name="phone"  type="text" class="form-control" placeholder="Téléphone" value="{{ old('phone') }}">
                        @error('phone')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                    <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Description" class="form-control" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                    <label for="address">Adresse*</label>
                    <input id="address" name="address" type="text"  class="form-control" placeholder="Adresse" value="{{ old('address') }}">
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="locality">Localité*</label>
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
                <label>Catégorie*</label>
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
                <div class="form-group">
                    <div class="col-6" style="padding-left:0px;">
                        <label for="pictures">Photo (maximum 3 photos)</label>
                        <input id="pictures" type="file" name="pictures[]" class="form-control" multiple>
                        @error('pictures')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Créer mon annonce</button>
            </form>
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