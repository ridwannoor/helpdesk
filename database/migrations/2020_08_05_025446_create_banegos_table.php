<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banegos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nama_pek');
            $table->string('no_ba');
            $table->string('lokasi_nego')->nullable();
            $table->date('tanggal');
            $table->string('spph')->nullable();
            $table->string('jml_penawaran')->nullable();
            $table->string('spph_nego')->nullable();
            $table->string('jml_nego')->nullable();
            $table->string('pajak')->nullable();
            $table->string('waktu_pel')->nullable();
            $table->string('garansi')->nullable();
            $table->string('asuransi')->nullable();
            $table->string('masapemeliharaan')->nullable();
            $table->string('tempat')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('training')->nullable();
            $table->text('cara_pembayaran')->nullable();
            $table->string('downpayment')->nullable();
            $table->string('nilaidp')->nullable();
            $table->boolean('po')->default(false);
            $table->boolean('spk')->default(false);
            $table->boolean('kontrak')->default(false);
            $table->string('biaya_dok')->nullable();
            $table->text('catatan')->nullable();
            $table->boolean('is_published')->default(false);
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banegos');
    }
}
