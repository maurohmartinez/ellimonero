<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderItems extends Component
{
    public $order_number;
    public $items;

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.cart.items');
    }

    /**
     * Set values
     * 
     */
    public function mount($orderNumber)
    {
        $this->order_number = $orderNumber;
        $this->getItems();
    }

    /**
     * Get all items
     * 
     */
    public function getItems()
    {
        $this->items = Order::where('number', $this->order_number)->firstOrFail()->products;
    }
}
