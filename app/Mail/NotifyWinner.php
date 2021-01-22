<?php

namespace App\Mail;

use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyWinner extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('¡Ganaste la subasta!')
            ->markdown('emails.notify_winner');
    }
}
