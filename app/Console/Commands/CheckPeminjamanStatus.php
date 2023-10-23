<?php

namespace App\Console\Commands;

use App\Models\Mobil;
use App\Models\PeminjamanMobil;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CheckPeminjamanStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-peminjaman-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        $Peminjaman = PeminjamanMobil::where('date', '<', $now);
        Mobil::find($Peminjaman->mobil_id)->update(['status'=> '0']);
        $this->info('Peminjaman statuses updated.');
    }
}
