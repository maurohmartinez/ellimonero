<header class="header-area @if(Route::current()->getName() !== 'home') default-header @endif">
    <div class="container">
        <div class="header-wrapper d-flex align-items-center justify-content-between">
            <!--header-logo-->
            <div class="header-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 80px; width: auto;">
                </a>
            </div>
            <!-- menu-bar -->
            <div class="menu-bar">
                <ul class="d-flex align-items-center justify-content-between">
                    @include('layouts.inc.menu')
                </ul>
            </div>
            <!-- sign-in area -->
            <div class="sign-in-area">
                <ul class="d-flex align-items-center justify-content-between">
                    <!-- <li class="popup"><img src="{{ asset('/images/svg/search.svg') }}" alt=""></li> -->
                    <!-- <li class="dark-light"><img src="{{ asset('/images/svg/dark-light.svg') }}" alt=""></li> -->
                    @if(backpack_auth()->check())
                    <li class="sign-click relative" style="text-decoration: none;">
                        <a href="{{ route('profile') }}">{{ backpack_user()->first_letters }}</a>
                    </li>
                    <li class="" style="text-decoration: none;">
                        <a href="#"><i class="las la-shopping-cart" style="font-size: 25px;"></i></a>
                    </li>
                    <li style="text-decoration: none;">
                        <a class="text-light" href="{{ route('backpack.auth.logout') }}">Salir</a>
                    </li>
                    @else
                    <li class="sign-click relative" style="text-decoration: none;">
                        <a href="{{ route('backpack.auth.login') }}">Ingresar</a>
                    </li>
                    <span>|</span>
                    <li style="text-decoration: none;">
                        <a class="text-light" href="{{ route('backpack.auth.register') }}">Registrarme</a>
                    </li>
                    @endif
                    <li>
                        <!--mobile menu icon-->
                        <div class="menu-toggole">
                            <span class="menu-show comon-tab">
                                <img src="{{ asset('/images/svg/toggle.svg') }}" alt="">
                            </span>
                            <span class="menu-close comon-tab">
                                <img src="{{ asset('/images/svg/close.svg') }}" alt="">
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- menu search popup -->
    <!-- <div class="search-popup-area">
        <div class="search-option">
            <div class="search-box">
                <img src="{{ asset('/images/svg/search.svg') }}" alt="">
                <input id="search" name="search" type="text" data-list=".data-list" placeholder="Type your keywords...">
            </div>
            <div class="data-list-wrapper">
                <ul class="data-list">
                    <li>
                        <a href="">
                            <div class="search-content">
                                <div class="search-title">
                                    <h4>Ingredients to look for in skin care products <span>April 30, 2019</span></h4>
                                </div>
                                <p>Read our top seven health benefits of fishing to learn why, whether you're a match angler or a weekend hobbyist.</p>
                            </div>
                            <img src="{{ asset('/images/svg/arrow-left.svg') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="search-content">
                                <div class="search-title">
                                    <h4>Sky Parachute Adventure <span>April 25, 2019</span></h4>
                                </div>
                                <p>Muay Thai (Thai boxing) is the most popular contact sport in Thailand, and a pillar of Thai culture, so much so that for years the Thai government has been asking, unsuccessfully, for it to be included as an Olympic sport. </p>
                            </div>
                            <img src="{{ asset('/images/svg/arrow-left.svg') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="search-content">
                                <div class="search-title">
                                    <h4>Small boy and girl on road<span>April 18, 2019</span></h4>
                                </div>
                                <p>Many parents are tired of the pink and blue divide in the toy aisles. Just last month, the White House held a conference in toys and media, with many toy manufacturers and experts attending. After feedback, Target announced in 2015 that it would get rid of signs labeling toys for boys or for girls</p>
                            </div>
                            <img src="{{ asset('/images/svg/arrow-left.svg') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <div class="search-content">
                                <div class="search-title">
                                    <h4>Colorful women digital art face<span>April 21, 2019</span></h4>
                                </div>
                                <p>The first thing I do before starting an illustration is to browse through my folder of inspiration. Inside are plenty of sub-folders, containing images of lighting, faces, human figures, clothing, illustrations from my favourite artists, animals, caterpillars, flowers and plenty more besides.</p>
                            </div>
                            <img src="{{ asset('/images/svg/arrow-left.svg') }}" alt="">
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="popup-close-icon">
            <img src="{{ asset('/images/svg/close-icon.svg') }}" alt="">
        </div>
    </div> -->
</header>