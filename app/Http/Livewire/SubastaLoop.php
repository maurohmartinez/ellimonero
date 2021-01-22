<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SubastaLoop extends Component
{

    public $product_id;
    public $product;

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.subasta-loop');
    }

    /**
     * Set values
     * 
     * @param integer $product_id
     */
    public function mount(int $product_id)
    {
        $this->product_id = $product_id;
        $this->product = Product::find($product_id);
    }
}
