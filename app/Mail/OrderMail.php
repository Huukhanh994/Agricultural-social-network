<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orders;
    public $items;
    public $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders,$items, $product)
    {
        $this->orders = $orders;
        $this->items = $items;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orders = $this->orders;
        $items = $this->items;
        $product = $this->product;
        return $this->subject("Agricultural social network send mail order product")
        ->view('site.mail.index')
        ->with('orders',$orders)
        ->with('items',$items)
        ->with('product',$product);
    }
}
