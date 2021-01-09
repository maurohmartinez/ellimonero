<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{

    public $count;

    protected $listeners = ['countProducts'];
    
    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.cart');
    }

    /**
     * Set cart count
     * 
     */
    public function mount()
    {
        $this->countProducts();
    }
    
    /**
     * Count products
     * 
     */
    public function countProducts()
    {
        $this->count = backpack_user()->cart()->count();
    }
}
