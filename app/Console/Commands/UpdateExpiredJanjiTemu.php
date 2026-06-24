<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\JanjiTemu;

class UpdateExpiredJanjiTemu extends Command
{
    protected $signature = 'janji-temu:update-expired';

    protected $description = 'Update expired appointment statuses to "selesai" automatically';

    public function handle()
    {
        $updated = JanjiTemu::where('tanggal_janji', '<', now())
            ->whereIn('status', ['menunggu', 'dijadwalkan'])
            ->update(['status' => 'selesai']);

        $this->info("Updated {$updated} expired appointment(s) to 'selesai'.");

        return Command::SUCCESS;
    }
}
