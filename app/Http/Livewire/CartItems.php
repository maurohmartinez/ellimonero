<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartItems extends Component
{
    public $items;

    protected $listeners = ['getItems', 'removeItem'];

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.cart-items');
    }

    /**
     * Set values
     * 
     */
    public function mount()
    {
        $this->getItems();
    }

    /**
     * Get all items
     * 
     */
    public function getItems()
    {
        $this->items = backpack_user()->cart()->whereHas('product', function ($query) {
            $query
                ->activo()
                ->onTime()
                ->hasStock();
        })->get();
    }
    
    /**
     * Remove item
     * 
     */
    public function removeItem($data)
    {
        backpack_user()->cart()->whereId($data['itemId'])->first()->delete();
        $this->getItems();
        $this->emitTo('cart-total', 'getTotal');
        $this->emitTo('cart', 'countProducts');
    }
}
