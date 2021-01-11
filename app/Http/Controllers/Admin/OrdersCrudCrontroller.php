<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class OrdersCrudCrontroller extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    public function setup()
    {
        CRUD::setModel("App\Models\Order");
        CRUD::setRoute(config('backpack.base.route_prefix', 'admin') . '/orders');
        CRUD::setEntityNameStrings('pedido', 'pedidos');

        CRUD::operation(['list', 'show'], function () {
            CRUD::column('number')->label('#ID');
            CRUD::column('user')->label('Usuario')->wrapper([
                'href' => function ($crud, $column, $entry, $related_key) {
                    return backpack_url('user/' . $related_key . '/edit');
                }
            ]);
            CRUD::column('total')->label('Total')->type('number')->prefix('$');
            CRUD::column('products_list')->label('Products');
            CRUD::column('status')->label('Estado')->wrapper([
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($entry['status'] == 'paid') {
                        return 'badge badge-success text-light';
                    }
                    return 'badge badge-warning';
                }
            ]);
            CRUD::column('payment')->attribute('payment_id')->label('Mercadopago');
            CRUD::column('observations')->label('Observaciones')->type('textarea');
        });
    }
}
