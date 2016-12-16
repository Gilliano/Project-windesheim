<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeAlumni extends Mailable
{
    use Queueable, SerializesModels;

    public $_from;
    public $subject;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
        $this->_from = $mail['from'];
        $this->subject = $mail['subject'];
        $this->body = $mail['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->_from)->subject($this->subject)->view('mail.welcome_alumni');
    }
}
