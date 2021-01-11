<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class Action extends Component
{
    public $item;

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.cart.action');
    }

    /**
     * Set values
     * 
     */
    public function mount($itemId)
    {
        $this->item = Cart::findOrFail($itemId);
    }
}
