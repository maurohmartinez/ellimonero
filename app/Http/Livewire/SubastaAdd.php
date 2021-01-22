<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Exception;
use Livewire\Component;

class SubastaAdd extends Component
{

    public $product_id;
    public $product;
    public $current_price;
    public $current_winner;
    public $current_winner_price;
    public $countdown;

    /**
     * Render component
     * 
     */
    public function render()
    {
        return view('livewire.subasta-add');
    }

    /**
     * Set values
     * 
     * @param integer $product_id
     */
    public function mount(int $product_id)
    {
        $this->product_id = $product_id;
        $this->loadInfo();
    }

    /**
     * Load info
     * 
     */
    public function loadInfo()
    {
        $this->product = Product::find($this->product_id);
        $this->current_price = $this->product->bids()->exists() ? ($this->product->bids()->winner()->first()->bid + 100) : $this->product->price;
        $this->current_winner = $this->product->bids()->exists() ? $this->product->bids()->winner()->first()->user->name : null;
        $this->current_winner_price = $this->product->bids()->exists() ? $this->product->bids()->winner()->first()->bid : $this->product->price;
        $this->countdown = $this->product->ends;
    }

    /**
     * Place new bid
     * 
     */
    public function placeBid()
    {
        try {
            // If has other bids, check
            if($this->product->bids()->exists()){
                // Is bigger than last bid?
                if ($this->product->bids()->winner()->first()->bid >= $this->current_price){
                    $this->emit('feedback-error', ['title' => 'Ocurrió un error — Quizás alguien acaba de ofertar, intentá nuevamente.']);
                    $this->loadInfo();
                    return;
                }
            }
            // Is still on time?
            if($this->product->ends->isPast()){
                $this->emit('feedback-error', ['title' => 'La subasta de este producto ya FINALIZÓ.']);
                $this->loadInfo();
                return;
            }
            // Add
            $this->product->bids()->create([
                'user_id' => backpack_user()->id,
                'bid' => $this->current_price
            ]);
            // Feedback
            $this->emit('feedback-success', ['title' => 'La oferta fue agregada. ¡Buena suerte!']);
            $this->loadInfo();
        } catch (Exception $e) {
            dd($e->getMessage());
            $this->emit('feedback-error', ['title' => 'Ocurrió un error — Quizás alguien acaba de ofertar, intentá nuevamente.']);
        }
    }

    /**
     * Plus 1 quantity
     * 
     */
    public function plus()
    {
        $this->current_price += 100;
    }

    /**
     * Plus 1 quantity
     * 
     */
    public function minus()
    {
        $this->current_price = ($this->current_price - 100) <= $this->current_winner_price ? $this->current_price : $this->current_price - 100;
    }
}
