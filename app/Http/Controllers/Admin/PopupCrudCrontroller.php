<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\PopupRequest;
use Carbon\Carbon;

class PopupCrudCrontroller extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
        CRUD::setModel("App\Models\Popup");
        CRUD::setRoute(config('backpack.base.route_prefix', 'admin') . '/popup');
        CRUD::setEntityNameStrings('popup', 'popups');

        CRUD::operation(['list', 'show'], function () {

            CRUD::column('name')->label('Nombre');
            CRUD::column('price')->label('Precio')->type('number')->prefix('$');
            CRUD::column('type')->label('Tipo')->type('select_from_array')->options([
                'regular' => 'Venta inmediata',
                'auction' => 'Subasta',
            ]);
            CRUD::column('active')->label('Activo')->type('boolean')->wrapper([
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($entry['seen'] == false) {
                        return 'badge badge-success text-light';
                    }
                    return '';
                }
            ]);
        });

        CRUD::operation(['create', 'update'], function () {
            CRUD::setValidation(PopupRequest::class);
            CRUD::field('title')->label('Título');
            CRUD::field('subtitle')->label('Subtítulo');
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
            CRUD::field('type')->label('Tipo de venta')->type('select2_from_array')->options([
                'regular' => 'Venta inmediata',
                'auction' => 'Subasta'
            ])->size(5);
            CRUD::field('stock')->label('Stock')->type('number')->default(1)->suffix('x disponibles')->size(7);
            CRUD::field('price')->label('Precio')->type('number')->prefix('$')->size(6);
            CRUD::field('price_discount')->label('Precio descuento')->type('number')->prefix('$')->size(6);
            CRUD::field('price_min')->label('Venta mínima')->type('number')->prefix('$')->hint('* Aplica siempre y cuando el tipo de venta sea Subasta.');
            CRUD::field(['starts', 'ends'])->label('Duración')->type('date_range')->hint('* Aplica siempre y cuando el tipo de venta sea Subasta.')->default([Carbon::today(), Carbon::today()->addWeek()])->date_range_options([
                'timePicker' => true,
                'locale' => ['format' => 'DD/MM/YYYY HH:mm']
            ]);
            CRUD::field('active')->label('Activo')->type('select2_from_array')->options([
                1 => 'Si',
                0 => 'No'
            ]);
        });
    }
}
