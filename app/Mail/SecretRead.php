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
        return $this->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'))
            ->markdown('mail.secret-read')
            ->subject(__('Your :app was read', ['app' => env('APP_NAME', 'OneTimeText')]));
    }
}
