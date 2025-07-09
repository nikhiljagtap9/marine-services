<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentFailed extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function build()
    {
        return $this->subject('Payment Failed')
            ->view('emails.payment-failed');
    }
}

