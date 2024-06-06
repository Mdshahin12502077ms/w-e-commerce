<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $order_status;
    public function __construct( $order_status)
    {
     $this->order_status=$order_status;
    }

   public function build(){
    return $this->subject('Order Confirmation mail')->view('Backend/mail/OrderMail')->with('order',$this->order_status);
   }
}
