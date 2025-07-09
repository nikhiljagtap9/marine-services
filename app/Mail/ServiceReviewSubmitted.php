<?php

namespace App\Mail;

use App\Models\ServiceReview;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ServiceReviewSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $review;

    public function __construct(ServiceReview $review)
    {
        $this->review = $review;
    }

    public function build()
    {
        return $this->subject('New Service Review Received')
                    ->view('emails.service_review');
    }
}

