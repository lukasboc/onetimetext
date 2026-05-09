<?php

namespace App\Mail;

use App\Models\Text;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SecretRead extends Mailable
{
    use SerializesModels;

    public function __construct(public Text $text) {}

    public function build(): self
    {
        return $this->from('info@onetimetext.de', 'OneTimeText')
            ->markdown('mail.secret-read')
            ->subject('Dein OneTimeText wurde gelesen');
    }
}
