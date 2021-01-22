<header class="header-area @if(Route::current()->getName() !== 'home') default-header @endif">
    <div class="container">
        <div class="header-wrapper d-flex align-items-center justify-content-between">
            <!--header-logo-->
            <div class="header-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/logo-800-w.png') }}" alt="" style="max-height: 60px; width: auto;">
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
                <ul class="d-flex align-items-center">
                    @if(backpack_auth()->check())
                    <li class="sign-click relative" style="text-decoration: none;">
                        <a href="{{ route('profile') }}" class="d-flex align-items-center"><i class="la la-user-circle" style="font-size: 25px;"></i></a>
                    </li>
                    <li class="sign-click relative" style="text-decoration: none;">
                        <a href="{{ route('profile.tickets') }}" class="d-flex align-items-center"><i class="la la-ticket" style="font-size: 25px;"></i>
                            <sup>
                                <span class="text-light" style="font-size: 13px; font-family:Arial, Helvetica, sans-serif;">{{ backpack_user()->qr()->ticket()->count() > 0 ? backpack_user()->qr()->ticket()->count() : '' }}</span>
                            </sup></a>
                    </li>
                    <li style="text-decoration: none;" class="px-3">
                        <livewire:cart />
                    </li>
                    @else
                    <li class="sign-click relative px-2" style="text-decoration: none;">
                        <a href="{{ route('backpack.auth.login') }}">Ingresar</a>
                    </li>
                    <li style="text-decoration: none;" class="px-2">
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
</header>