<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\PlainTextEmail;
use App\Models\Communication;
use App\Models\Contact;
use App\Models\User;


class CommunicationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $communication;
    public $contact;
    public $kontaktas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Communication $communication, Contact $contact, User $kontaktas )
    {
        $this->communication = $communication;
        $this->contact = $contact;
        $this->view = 'communication_plain';
        $this->kontaktas = $kontaktas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('communication_plain')
                    ->subject($this->communication->subject)
                    ->with([
                        'kontaktas' => $this->kontaktas->name,
                        'emailMessage' => $this->communication->message,
                    ]);
    }
}

