<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartTotal extends Component
{
    public $total;

    protected $listeners = ['getTotal'];

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.cart-total');
    }

    /**
     * Set values
     * 
     */
    public function mount()
    {
        $this->getTotal();
    }

    /**
     * Add product to cart
     * 
     */
    public function getTotal()
    {
        $items = backpack_user()->cart()->whereHas('product', function ($query) {
            $query
                ->activo()
                ->onTime()
                ->hasStock();
        })->get();

        $total  = 0;
        foreach ($items as $item) {
            $total += $item->product->final_price * $item->quantity;
        }

        $this->total = $total;
    }
}
