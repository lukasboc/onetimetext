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
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->markdown('mail.secret-read')
            ->subject('Dein OneTimeText wurde gelesen');
    }
}
