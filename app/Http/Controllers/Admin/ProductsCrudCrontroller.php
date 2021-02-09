<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\ProductRequest;
use Carbon\Carbon;

class ProductsCrudCrontroller extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ReorderOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

    public function setup()
    {
        CRUD::setModel("App\Models\Product");
        CRUD::setRoute(config('backpack.base.route_prefix', 'admin') . '/products');
        CRUD::setEntityNameStrings('producto', 'productos');

        CRUD::operation(['list', 'show'], function () {

            CRUD::column('name')->label('Nombre');
            CRUD::column('price')->label('Precio base')->type('number')->prefix('$');
            CRUD::column('type')->label('Tipo')->type('select_from_array')->options([
                'regular' => 'Venta inmediata',
                'auction' => 'Subasta',
                ]);
            CRUD::column('winner')->label('Oferta ganadora');
            CRUD::column('bids_count')->label('Ofertas');
            CRUD::column('active')->label('Activo')->type('boolean')->wrapper([
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($entry['seen'] == false) {
                        return 'badge badge-success text-light';
                    }
                    return '';
                }
            ]);
            // CRUD::column('user_id')->label('Usuario')->type('select')->entity('user')->attribute('name')->wrapper([
            //     'href' => function ($crud, $column, $entry, $related_key) {
            //         return backpack_url('user/' . $related_key . '/edit');
            //     },
            //     'class' => function ($crud, $column, $entry, $related_key) {
            //         if ($entry['seen'] == false) {
            //             return 'text-success';
            //         }
            //         return '';
            //     }
            // ]);
            // CRUD::column('comments')->label('Comentario')
            //     ->visibleInModal(true)
            //     ->wrapper([
            //         'class' => function ($crud, $column, $entry, $related_key) {
            //             if ($entry['seen'] == false) {
            //                 return 'text-success';
            //             }
            //             return '';
            //         }
            //     ]);
            // CRUD::column('updated_at')->label('Recibido')->type('date')->wrapper([
            //     'class' => function ($crud, $column, $entry, $related_key) {
            //         if ($entry['seen'] == false) {
            //             return 'text-success';
            //         }
            //         return '';
            //     }
            // ]);
        });

        CRUD::operation(['create', 'update'], function () {
            CRUD::setValidation(ProductRequest::class);
            CRUD::field('name')->label('Nombre de producto');
            CRUD::field('images')->label('Imágenes')->type('repeatable')->fields([[
                'type' => 'image',
                'name' => 'image_url',
                'label' => 'Imagen',
                'upload' => true,
                'crop' => true,
                'aspect_ratio' => 16 / 9,
                // 'disk' => 'products'
            ]])->hint('Agregue todas las imágenes del producto.');
            CRUD::field('description')->type('textarea')->label('Descripción corta');
            CRUD::field('content')->label('Descripción larga')->type('ckeditor');
            CRUD::field('type')->label('Tipo de venta')->type('select2_from_array')->options([
                'regular' => 'Venta inmediata',
                'auction' => 'Subasta'
            ])->size(5);
            CRUD::field('stock')->label('Stock')->type('number')->suffix('x disponibles')->size(7)->hint('Dejar vacío si no aplica.');
            CRUD::field('price')->label('Precio')->type('number')->prefix('$')->size(6);
            CRUD::field('price_discount')->label('Precio descuento')->type('number')->prefix('$')->size(6);
            CRUD::field('timeframe')->label('Duración de venta')->type('select2_from_array')->options([
                'always' => 'Permanente',
                'stock' => 'Hasta que termine stock',
                'date' => 'Duración específica',
            ])->size(5);
            CRUD::field(['starts', 'ends'])->label('Duración')->type('date_range')->hint('* Aplica siempre y cuando el tipo de venta sea Subasta.')->default([Carbon::today(), Carbon::today()->addWeek()])->date_range_options([
                'timePicker' => true,
                'locale' => ['format' => 'DD/MM/YYYY HH:mm']
            ]);
            CRUD::field('active')->label('Activo')->type('select2_from_array')->options([
                1 => 'Si',
                0 => 'No'
            ])->size(6);
            CRUD::field('new')->label('Destacar como nuevo')->type('select2_from_array')->options([
                1 => 'Si',
                0 => 'No'
            ])->size(6);
        });
    }

    protected function setupReorderOperation()
    {
        CRUD::set('reorder.label', 'name');
        CRUD::set('reorder.max_level', 1);
    }
}
