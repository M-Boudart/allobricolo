<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ route('welcome') }}"><img src="{{ asset('template/img/logo.png') }}" alt="Logo"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('welcome') }}">Accueil</a></li>
                            <li><a href="{{ route('announcement.index') }}">Annonces</a></li>
                            <li><a href="{{ route('user.workers') }}">Nos bricoleurs</a></li>
                            @if (Auth::check())
                            <li>
                                <a href="{{ route('announcement.create') }}">Créer une annonce</a>
                            </li>
                            @endif
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
                        <a href="{{ route('user.show', Auth::id()) }}" class="login-btn"><i class="fa fa-user"></i></a>
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