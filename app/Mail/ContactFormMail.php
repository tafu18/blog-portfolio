<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $name, public $email, public $message)
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Yeni İletişim Formu Mesajı')
                    ->markdown('emails.contact_form')->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'message' => $this->message
                    ]);
    }
}
