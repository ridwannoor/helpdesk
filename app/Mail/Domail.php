<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Preference;

use App\Models\Transaksi\Doheader;
use App\Models\Transaksi\Dodetail;
use App\Models\Transaksi\Dofile;


class Domail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->no_do = $data['no_do'];
        $this->perihal = $data['perihal'];
        // $this->publish = $data['is_published'];
        // $this->publish1 = $data['is_published_ro'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $doheaders = Doheader::find($id);
        // $pref = Preference::where('id', 1)->get();
        return $this->from('procurement@approperti.co.id')
            ->view('transaksi.deliveryorder.email')
            ->with([
                'no_do' => $this->no_do,
                'perihal' => $this->perihal,
            //     'publish' => $this->is_published,
            //     'publish1' => $this->is_published_ro,
            ]);
    }
}
