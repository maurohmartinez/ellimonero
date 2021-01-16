<div class="col-xl-3 px-4">
    <div class="account-order-list">
        <ul class="row">
            <li class="@if($tab == 'index') active @endif col-6 col-xl-12">
                <a href="{{ route('profile') }}">
                    <div class="order-list-wrapper">
                        <div class="order-list-img">
                            <i style="font-size: 25px;" class="la la-user {{ $tab == 'index' ? 'text-dark' : 'text-secondary' }}"></i>
                        </div>
                        <p>Perfil</p>
                    </div>
                </a>
            </li>
            <li class="@if($tab == 'orders') active @endif col-6 col-xl-12">
                <a href="{{ route('profile.orders') }}">
                    <div class="order-list-wrapper">
                        <div class="order-list-img">
                            <i style="font-size: 25px;" class="las la-shopping-cart {{ $tab == 'orders' ? 'text-dark' : 'text-secondary' }}"></i>
                        </div>
                        <p>Compras</p>
                    </div>
                </a>
            </li>
            <li class="@if($tab == 'tickets') active @endif col-6 col-xl-12">
                <a href="{{ route('profile.tickets') }}">
                    <div class="order-list-wrapper">
                        <div class="order-list-img">
                            <i style="font-size: 25px;" class="la la-ticket {{ $tab == 'tickets' ? 'text-dark' : 'text-secondary' }}"></i>
                        </div>
                        <p>Boletería</p>
                    </div>
                </a>
            </li>
            <li class="col-6 col-xl-12">
                <a href="{{ route('backpack.auth.logout') }}">
                    <div class="order-list-wrapper">
                        <div class="order-list-img">
                            <i style="font-size: 25px;" class="la la-sign-out-alt text-danger"></i>
                        </div>
                        <p>Salir</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>