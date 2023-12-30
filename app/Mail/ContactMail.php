<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $mail;
    protected $issue;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $mail, $message)
    {
        $this->name = $name;
        $this->mail = $mail;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('CORREO DESDE WWW.CRISGUZMAN.COM')
            ->to(env('MAIL_FROM_ADDRESS', 'contacto@crisguzman.com'), 'Cristian Guzmán')
            ->from($this->mail)
            ->view('emails.contact', [
                'name' => $this->name,
                'messages' => $this->message
            ]);
    }
}
