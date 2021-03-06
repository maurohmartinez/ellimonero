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
        $this->count = backpack_user()->cart()->whereHas('product', function ($query) {
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
        })->count();
    }
}
