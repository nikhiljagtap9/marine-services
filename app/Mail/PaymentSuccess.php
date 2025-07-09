<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $subscription;

    public function __construct($payment, $subscription)
    {
        $this->payment = $payment;
        $this->subscription = $subscription;
    }

    public function build()
    {
        return $this->subject('Payment Successful')
            ->view('emails.payment-success');
    }
}

