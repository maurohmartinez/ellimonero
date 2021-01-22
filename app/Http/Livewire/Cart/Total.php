<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Total extends Component
{
    public $total;

    protected $listeners = ['getTotal'];

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.cart.total');
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
        })->get();

        $total  = 0;
        foreach ($items as $item) {
            $total += ($item->product->type == 'regular' ? $item->product->final_price : $item->product->bids()->winner()->first()->bid) * $item->quantity;
        }

        $this->total = $total;
    }
}
