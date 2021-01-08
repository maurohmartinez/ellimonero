<div class="account-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <div class="account-order-list">
                    <ul>
                        <li class="active">
                            <a href="#">
                                <div class="order-list-wrapper">
                                    <div class="order-list-img">
                                        <img src="{{ asset('images/svg/shop-card.svg') }}" alt="">
                                    </div>
                                    <p>Compras</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile') }}">
                                <div class="order-list-wrapper">
                                    <div class="order-list-img">
                                        <img src="{{ asset('images/svg/edit.svg') }}" alt="">
                                    </div>
                                    <p>Editar datos</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('backpack.auth.logout') }}">
                                <div class="order-list-wrapper">
                                    <div class="order-list-img">
                                        <img src="{{ asset('images/svg/logout.svg') }}" alt="">
                                    </div>
                                    <p>Salir</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="account-table-wrapper">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Item</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" data-title="Order ID"># 024-38</th>
                                <td data-title="Date">Sep 30, 2019</td>
                                <td data-title="Status">
                                    <button class="badge badge-orange">Processing</button>
                                </td>
                                <td data-title="Item">02</td>
                                <td data-title="Total">$ 40.35</td>
                                <td data-title="">
                                    <button class="btn btn-sm btn-gray btn-radious-6">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" data-title="Order ID"># 024-39</th>
                                <td data-title="Date">Sep 31, 2019</td>
                                <td data-title="Status">
                                    <button class="badge badge-danger">Cancelled</button>
                                </td>
                                <td data-title="Item">02</td>
                                <td data-title="Total">$ 40.35</td>
                                <td data-title="">
                                    <button class="btn btn-sm btn-gray btn-radious-6">Details</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" data-title="Order ID"># 024-34</th>
                                <td data-title="Date">Oct 01, 2019</td>
                                <td data-title="Status">
                                    <button class="badge badge-sucess">Completed</button>
                                </td>
                                <td data-title="Item">02</td>
                                <td data-title="Total">$ 40.35</td>
                                <td data-title="">
                                    <button class="btn btn-sm btn-gray btn-radious-6">Details</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>