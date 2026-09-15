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
        return $this->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))
            ->markdown('mail.contactForm')
            ->subject(__(':app contact form', ['app' => env('APP_NAME', 'OneTimeText')]))
            ->with([
                'subj' => $this->subj,
                'msg' => $this->msg,
                'senderMail' => $this->senderMail,
            ]);
    }
}
