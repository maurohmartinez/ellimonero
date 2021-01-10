<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;

class ProductAdd extends Component
{

    public $product_id;
    public $quantity = 1;

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.product-add');
    }

    /**
     * Set values
     * 
     * @param integer $product_id
     */
    public function mount(int $product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * Add product to cart
     * 
     */
    public function addProduct()
    {
        try {
            if (backpack_user()->cart()->where('product_id', $this->product_id)->exists()) {
                backpack_user()->cart()->where('product_id', $this->product_id)->increment('quantity', $this->quantity);
            } else {
                backpack_user()->cart()->create([
                    'product_id' => $this->product_id,
                    'quantity' => $this->quantity
                ]);
            }
            $this->quantity = 1;
            $this->emit('feedback-success', ['title' => '¡El producto fue agregado!']);
            $this->emitTo('cart', 'countProducts');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Plus 1 quantity
     * 
     */
    public function plus()
    {
        $this->quantity += 1;
    }

    /**
     * Plus 1 quantity
     * 
     */
    public function minus()
    {
        $this->quantity = $this->quantity == 1 ? $this->quantity : $this->quantity - 1;
    }
}
