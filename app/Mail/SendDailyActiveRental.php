<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendDailyActiveRental extends Mailable
{
    use Queueable, SerializesModels;

    public $movies;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($movies)
    {
        $this->movies = $movies;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->view('mails.daily-active-rental');
    }
}
