<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Carbon\Carbon;

class UpdateExpiredSubscriptions extends Command
{
    protected $signature = 'subscriptions:update-expired';
    protected $description = 'Update subscriptions that are expired based on end_date';

    public function handle()
    {
        $updated = Subscription::where('status', 'active')
            ->whereDate('end_date', '<', Carbon::today())
            ->update(['status' => 'expired']);

        $this->info("Updated {$updated} expired subscriptions.");
    }
}

