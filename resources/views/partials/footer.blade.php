<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html">
                            <img src="{{ asset('template/img/footer-logo.png') }}" alt="">
                        </a>
                    </div>
                    <p>
                    Allo Bricolo est un site d'économie collaborative qui met en lien des personnes ayant besoin d'aide dans un domaine lié au bricolage.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1 col-md-6">
                <div class="footer__address">
                    <ul>
                        <li>
                            <span>Appelez nous:</span>
                            <p>(+32) 456.286.598</p>
                        </li>
                        <li>
                            <span>Email:</span>
                            <p>info.allobricolo@gmail .com</p>
                        </li>
                        <li>
                            <span>Fax:</span>
                            <p>(+32) 432.210.628</p>
                        </li>
                        <li>
                            <span>Suivez nous:</span>
                            <div class="footer__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-skype"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1 col-md-6">
                <div class="footer__widget">
                    <ul>
                        <li><a href="{{ route('welcome') }}">Accueil</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <ul>
                        @if (!Auth::check())
                        <li><a href="{{ route('login') }}">Se connecter</a></li>
                        <li><a href="{{ route('register') }}">S'inscrire</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="footer__copyright__links">
                        <a href="#">Termes d'utilisation</a>
                        <a href="#">RGPD</a>
                        <a href="#">Politique des cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>