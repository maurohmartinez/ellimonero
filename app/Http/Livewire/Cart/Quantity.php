<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class Quantity extends Component
{
    public $item;

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.cart.quantity');
    }

    /**
     * Set values
     * 
     */
    public function mount($itemId)
    {
        $this->item = Cart::findOrFail($itemId);
    }

    /**
     * Increment
     * 
     */
    public function plus()
    {
        $this->item->increment('quantity');
        $this->emitTo('cart.items', 'refresh');
        $this->emitTo('cart.total', 'getTotal');
    }

    /**
     * Decrement
     * 
     */
    public function minus()
    {
        if ($this->item->quantity > 1) {
            $this->item->decrement('quantity');
            $this->emitTo('cart.items', 'refresh');
            $this->emitTo('cart.total', 'getTotal');
        }
    }
}
