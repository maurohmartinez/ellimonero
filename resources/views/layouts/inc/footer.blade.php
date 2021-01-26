<footer class="footer-area">
    <div class="footer-top-area">
        <div class="container">
            <div class="footer-top-wrapper d-flex justify-content-between">
                <!--header-logo-->
                <div><!--class="footer-logo-area" -->
                    <div class="header-logo ">
                        <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 80px; width: auto;">
                    </div>
                    <p>Un ritual de conexión en un lugar mágico...</p>
                    <div class="social-icon pt-40 pt-lg-15">
                        <h4>Seguinos</h4>
                        <ul class="d-flex align-items-center">
                            <!-- <li><a href="#"><img src="/images/svg/facebook.svg" alt=""></a></li> -->
                            <li><a href="https://www.instagram.com/maxipardooficial/"><img src="/images/svg/instagram.svg" alt=""></a></li>
                            <!-- <li><a href="#"><img src="/images/svg/twitter.svg" alt=""></a></li> -->
                            <li><a href="https://www.youtube.com/user/maxipardo"><img src="/images/svg/youtube.svg" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <!-- menu-bar -->
                <!-- <div class="footer-menu-bar community-area">
                    <h4>Community</h4>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="/author.html">Author</a></li>
                    </ul>
                </div>
                <div class="footer-menu-bar usefull-link">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
                <div class="contact-area">
                    <h4>Contacto</h4>
                    <div class="contact-address">
                        <a href="#">email@email.com</a>
                        <p>+123 456 - 789</p>
                    </div>
                    <div class="contact-app-link">
                        <h4>See the Map</h4>
                        <a href="#">https://www.google.com.bd/maps</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p>Copyright © 2021
                    @if(backpack_auth()->check())
                    @if(backpack_user()->hasRole('Admin') || backpack_user()->is_admin)
                        <a href="{{ route('backpack.dashboard') }}" class="ml-3">cPanel</a>
                    @endif
                    @endif
                    </p>
                </div>
                <!-- <div class="col-lg-6">
                    <ul class="footer-privacy-card">
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</footer>