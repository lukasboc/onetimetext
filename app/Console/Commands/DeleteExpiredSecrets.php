<?php

namespace App\Console\Commands;

use App\Models\Text;
use Illuminate\Console\Command;

class DeleteExpiredSecrets extends Command
{
    protected $signature = 'secrets:delete-expired';
    protected $description = 'Löscht abgelaufene OneTimeTexts';

    public function handle(): void
    {
        $deleted = Text::whereNotNull('expires_at')
            ->where('expires_at', '<', now())
            ->delete();

        $this->info("$deleted abgelaufene Secrets gelöscht.");
    }
}
