<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartItem extends Component
{
    public $item;
    public $index;
    
    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.cart-item');
    }

    /**
     * Set values
     * 
     */
    public function mount($itemId, $index)
    {
        $this->item = Cart::find($itemId);
        $this->index = $index;
    }

    /**
     * Increment
     * 
     */
    public function plus()
    {
        $this->item->increment('quantity');
        $this->emitTo('cart-total', 'getTotal');
    }

    /**
     * Decrement
     * 
     */
    public function minus()
    {
        if($this->item->quantity > 1){
            $this->item->decrement('quantity');
            $this->emitTo('cart-total', 'getTotal');
        }
    }
    
    /**
     * Remove
     * 
     */
    public function remove()
    {
        $this->emit('confirm-action', ['emitTo' => 'cart-items', 'action' => 'removeItem', 'id' => $this->item->id, 'text' => '¿Estás seguro que querés eliminar este producto?']);
    }
}
