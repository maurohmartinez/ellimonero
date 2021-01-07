<header class="navigation-section @if(Route::currentRouteName() !== 'home') solid @endif" id="top-nav-bar">
    <div class="navigation-overlay"></div>
    <div class="navigation-and-offcanvas">
        <div class="col md-order-first no-margin-bottom-lg">
            <a href="{{ route('home') }}" class="brand justify-left w-inline-block w--current">
                <!-- <img src="images/-asset-zuma-dark.svg" alt=""> -->
                <h4 class="on-dark">El Limonero</h4>
            </a>
        </div>
        <div class="col-lg-8 md-basis-auto md-order-last">
            <nav class="navigation-menu flexh-justify-center position-relative md-margin-top">
                @include('layout.inc.menu')
            </nav>
        </div>
        <div class="col-lg-2 lg-text-align-right md-basis-auto navigation-menu">

            <a href="{{ backpack_auth()->check() ? route('profile') : route('backpack.auth.login') }}" class="on-dark d-flex align-items-center">
                @if(backpack_auth()->check())
                {{ backpack_user()->first_letters }}
                @endif
                <i class="las la-user-circle ml-1" style="font-size: 23px;"></i>
            </a>

            @if(backpack_auth()->check())
            @if(backpack_user()->is_admin)
            <a href="{{ route('backpack.dashboard') }}" class="on-dark d-flex align-items-center ml-3">
                <i class="la la-tachometer-alt" style="font-size: 25px;"></i>
            </a>
            @endif
            @endif

            <div data-w-id="19441b04-6667-8112-1ac3-50ce8ef78c65" class="c-cart">
                <a href="#" class="on-dark margin-left-small">
                    <i class="las la-shopping-cart ml-1" style="font-size: 25px;"></i>
                </a>
                <div class="c-cart__dropdown">
                    <div class="c-cart__item">
                        <a href="#" class="c-cart__remove-btn w-inline-block">
                            <div class="iconfont"><em class="iconfont__no-italize"></em></div>
                        </a><img src="https://via.placeholder.com/1000x600.png?text=IMAGE" width="64" alt="" class="c-cart__thumbnail">
                        <div class="text-align-left text-small flexv-space-between">
                            <div class="is-heading-color margin-bottom-xsmall md-text-xsmall">Sorrento Retro Wooden Armchair</div>
                            <div class="weight-is-medium low-text-contrast">1 × $120</div>
                        </div>
                    </div>
                    <div class="c-cart__item no-border-bottom">
                        <a href="#" class="c-cart__remove-btn w-inline-block">
                            <div class="iconfont"><em class="iconfont__no-italize"></em></div>
                        </a><img src="https://via.placeholder.com/1000x600.png?text=IMAGE" width="64" alt="" class="c-cart__thumbnail">
                        <div class="text-align-left text-small flexv-space-between">
                            <div class="is-heading-color margin-bottom-xsmall md-text-xsmall">Loris Contemporary Linen Wingback </div>
                            <div class="weight-is-medium low-text-contrast">1 × $120</div>
                        </div>
                    </div>
                    <div class="c-cart__section">
                        <div>Subtotal : </div>
                        <div>$240</div>
                    </div>
                    <div class="c-cart__buttons">
                        <!-- <a href="#" class="button-primary is-small min-width-100px is-ghost md-margin-bottom-small w-inline-block">
                            <div class="button-primary-text flexv-justify-center">Ver</div>
                        </a> -->
                        <a href="#" class="button-primary is-small min-width-100px w-inline-block">
                            <div class="button-primary-text flexv-justify-center">Ir al checkout</div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <a data-w-id="19441b04-6667-8112-1ac3-50ce8ef78c8b" href="#" class="c-nav__close-button w-inline-block">
            <div class="iconfont is-offcanvas-close-button"><em class="iconfont__no-italize"></em></div>
        </a>
    </div>
    <div class="mobile-navigation-bar">
        <a href="#" class="brand w-inline-block">
            <img src="images/-asset-zuma-light.svg" alt="" class="logo-image">
        </a>
        <a data-w-id="19441b04-6667-8112-1ac3-50ce8ef78c92" href="#" class="burger-button w-inline-block">
            <div class="iconfont is-burger"><em class="iconfont__no-italize"></em></div>
        </a>
    </div>
</header>