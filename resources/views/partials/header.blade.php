<style>
    a, a:hover {
        text-decoration: none !important;
    }

    header form {
        display: inline-block !important;
    }
</style>

<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="header__logo">
                    <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo.png') }}" alt="Logo"></a>
                </div>
            </div>
            <div class="col-lg-10 col-md-10">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('welcome') }}">Accueil</a></li>
                            <li><a href="{{ route('announcement.index') }}">Annonces</a></li>
                            @if (Auth::check())
                                <li>
                                    <a href="{{ route('announcement.create') }}">Créer une annonce</a>
                                </li>
                                @if (Auth::user()->status->status == 'Admin' || 
                                    Auth::user()->status->status == 'Modérateur')
                                    <li>
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="/allobricolo/messagerie">Messagerie</a>
                                </li>
                                <li><a href="#"><i class="fa fa-user"></i></a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('user.show', Auth::id()) }}">Profile</a></li>
                                        <li><a href="{{ route('announcement.list') }}">Mes annonces</a></li>
                                        <li><a href="{{ route('helper.list') }}">Mes candidatures</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="primary-btn">Deconnexion</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </nav>
                    <div class="header__menu__right">
                        @if (!Auth::check())
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