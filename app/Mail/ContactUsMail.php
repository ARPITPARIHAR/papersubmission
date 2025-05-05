<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->from('carrycodetechnology@gmail.com', 'Carry Code Technology')
            ->replyTo($this->contact->email) // User ke email pe reply ho sake
            ->subject('New Contact Message')
            ->withHeaders([
                'X-Priority' => '1 (Highest)',
                'X-MSMail-Priority' => 'High',
                'Importance' => 'High'
            ])
            ->view('emails.contact-us')
            ->with([
                'name' =>$this->contact->name,
                'email' => $this->contact->email,
                'phone' => $this->contact->subject,
                'user_query' => $this->contact->message
            ]);
    }
}
