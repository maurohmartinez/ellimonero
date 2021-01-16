<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Http\Requests\QrRequest;
use Carbon\Carbon;

class QrCrudCrontroller extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
        CRUD::setModel("App\Models\Qr");
        CRUD::setRoute(config('backpack.base.route_prefix', 'admin') . '/qr');
        CRUD::setEntityNameStrings('QR', 'QR');

        CRUD::operation(['list', 'show'], function () {
            CRUD::column('token')->label('Token');
            CRUD::column('stock')->label('Stock')->type('number');
            CRUD::column('available_stock')->label('Stock disponible')->type('number');
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
            CRUD::setValidation(QrRequest::class);
            CRUD::field('token')->label('Token');
            CRUD::field('image')->label('Imagen')
                ->upload(true)
                ->crop(true)
                ->type('image');
            CRUD::field('welcome')->label('Mensaje inicial')->hint('Ej: ¡Estás a punto de adquirir una de las 100 entradas que regalamos!');
            CRUD::field('success')->label('Mensaje de confirmación')->type('ckeditor')->hint('Ej: Revisá tu email y pronto recibirás tu regalo.');
            CRUD::field('description')->label('Descripción del regalo')->type('textarea')->hint('Ej: Vale x2 entradas para ver a Maxi el día xx-xx en xxx. Para ingresar entrá por puerta xx y mostrá este mensaje.');

            CRUD::field('stock')->label('Stock')->type('number')->default(1)->hint('Dejar vacío si no aplica.')->size(4);
            CRUD::field(['starts', 'ends'])->label('Duración')->type('date_range')->hint('* Aplica siempre y cuando el tipo de venta sea Subasta.')->default([Carbon::today(), Carbon::today()->addWeek()])->date_range_options([
                'timePicker' => true,
                'locale' => ['format' => 'DD/MM/YYYY HH:mm']
            ])->size(8);
            CRUD::field('always_visible')->label('Siempre visible')->type('select2_from_array')->options([
                1 => 'Si',
                0 => 'No'
            ])->hint('Esta opción ignora las fechas de duración.')->size(6);
            CRUD::field('active')->label('Activo')->type('select2_from_array')->options([
                1 => 'Si',
                0 => 'No'
            ])->size(6);
        });
    }
}
