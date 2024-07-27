<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    protected $subj;
    protected $msg;
    protected $senderMail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subj, $msg, $senderMail)
    {
        $this->subj = $subj;
        $this->msg = $msg;
        $this->senderMail = $senderMail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@onetimetext.de', 'OneTimeText')
            ->markdown('mail.contactForm')
            ->subject('Kontaktformular OneTimeText')
            ->with([
                'subj' => $this->subj,
                'msg' => $this->msg,
                'senderMail' => $this->senderMail,
            ]);
    }
}
