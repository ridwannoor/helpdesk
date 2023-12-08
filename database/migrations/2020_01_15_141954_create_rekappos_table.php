<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekappos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_po');
            $table->string('no_kontrak')->nullable();
            $table->date('tanggal')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('nama_pekerjaan')->nullable();
            $table->string('cara_bayar')->nullable();
            $table->string('cara_bayar1')->nullable();
            $table->string('pajak')->nullable();
            $table->string('pajak1')->nullable();
            // $table->boolean('pajak')->default(false);
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();
            $table->bigInteger('lokasi_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('preference_id')->unsigned();
            $table->bigInteger('bod_id')->unsigned();
            $table->string('hargapabrik')->nullable();
            $table->string('asuransi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('suratpenawaran')->nullable();
            $table->date('desc_tgl')->nullable();
            $table->string('desc')->nullable();
            $table->string('diskon')->nullable();
            $table->string('biaya_kirim')->nullable();
            $table->string('ppn')->nullable();
            // $table->string('pembulatan')->nullable();
            $table->string('total')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        Schema::table('rekappos', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('rekappos', function (Blueprint $table) {
            $table->foreign('preference_id')->references('id')->on('preferences');
        });
        Schema::table('rekappos', function (Blueprint $table) {
            $table->foreign('bod_id')->references('id')->on('bods');
        });
        Schema::table('rekappos', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
        });
        Schema::table('rekappos', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
        Schema::table('rekappos', function (Blueprint $table) {
            $table->foreign('currency_id')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekappos');
    }
}
