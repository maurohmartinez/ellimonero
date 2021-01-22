<?php

namespace App\Http\Livewire\Cart;

// use Livewire\Component;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Items extends TableComponent
{
    use HtmlComponents;

    public $items;
    protected $listeners = ['getItems', 'removeItem', 'plus', 'minus', 'refresh'];
    public $searchEnabled = false;
    public $paginationEnabled = false;
    public $loadingIndicator = false;

    protected $options = [
        // The class set on the table when using bootstrap
        'bootstrap.classes.table' => 'table table-striped',

        // The class set on the table's thead when using bootstrap
        'bootstrap.classes.thead' => '',

        // The class set on the table's export dropdown button
        'bootstrap.classes.buttons.export' => 'btn',

        // Whether or not the table is wrapped in a `.container-fluid` or not
        'bootstrap.container' => false,

        // Whether or not the table is wrapped in a `.table-responsive` or not
        'bootstrap.responsive' => true,
    ];

    public function refresh()
    {
        $this->updated();
    }

    /**
     * Remove item
     * 
     */
    public function removeItem($data)
    {
        backpack_user()->cart()->whereId($data['itemId'])->first()->delete();
        $this->emitTo('cart.total', 'getTotal');
        $this->emitTo('cart', 'countProducts');
    }

    public function query(): Builder
    {
        $this->setTableHeadClass('checkout-header');

        return Cart::where('user_id', backpack_user()->id)->whereHas('product', function ($query) {
            // Regular
            $query->where(function ($q) {
                $q->where('type', 'regular')
                    ->activo()
                    ->onTime()
                    ->hasStock();
            })
                // is subasta
                ->orWhere(function ($qr) {
                    $qr->where('type', 'auction')
                        ->activo();
                });
        });
    }

    public function setTableDataAttributes($attribute, $value): array
    {
        return [
            'data-title' => $attribute
        ];
    }

    public function setTableDataClass($attribute, $value): string
    {
        return $attribute;
    }

    public function columns(): array
    {
        return [
            Column::make('Producto', 'Producto')->format(function (Cart $model) {
                return $model->product['name'];
            }),
            Column::make('Precio/u', 'Precio/u')->format(function (Cart $model) {
                return '$' . ($model->product->type == 'regular' ? $model->product->price : $model->product->bids()->winner()->first()->bid) . '/u';
            }),
            Column::make('Cantidad', 'Cantidad')->format(function (Cart $model) {
                return view('livewire.cart.item-quantity', ['itemId' => $model->id]);
            }),
            Column::make('Subtotal', 'Subtotal')->format(function (Cart $model) {
                return '$' . $model->quantity * ($model->product->type == 'regular' ? $model->product->price : $model->product->bids()->winner()->first()->bid);
            }),
            Column::make('', 'last-child')->format(function (Cart $model) {
                return view('livewire.cart.item-action', ['itemId' => $model->id]);
            }),
        ];
    }
}
