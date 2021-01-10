<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPaid extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $order_number)
    {
        $this->order = Order::where('number', $order_number)->firstOrFail();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Tu orden en El Limonero Digital')
            ->markdown('emails.order_paid');
    }
}
