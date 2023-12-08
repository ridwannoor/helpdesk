<?php

namespace App\Listeners\HargabarangWasCreated;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\HargabarangWasCreated;
use Illuminate\Support\Facaddes\Log;
// use Log;

class SendToLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(HargabarangWasCreated $event)
    {
        $hargabarang = $event->hargabarang;
        Log::info("Harga Barang Telah Dibuat, Nama Barang : $hargabarang->nama_brg");
    }
}
