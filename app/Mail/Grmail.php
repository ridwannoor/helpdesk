<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Preference;

class Grmail extends Mailable
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
        // $this->do = $data['do'];
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
        // $do = $this->do ;
        // dd($do);
        $pref = Preference::find(1);
        return $this->from($pref->email)
            ->view('transaksi.receivedo.email')
            ->with([
                // 'do' => $do,
                'no_do' => $this->no_do,
                'perihal' => $this->perihal,
            //     'publish' => $this->is_published,
            //     'publish1' => $this->is_published_ro,
            ]);
    }
}
