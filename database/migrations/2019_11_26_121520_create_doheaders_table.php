<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoheadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doheaders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_do')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('perihal')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('lokasi_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('preference_id')->unsigned();
            // $table->text('keterangan')->nullable();
            $table->text('lokasi_pengambilan')->nullable();
            $table->text('tujuan_pengiriman')->nullable();
            $table->date('tanggal_sampai')->nullable();
            $table->text('ket_pengiriman')->nullable();
            $table->string('ref_po')->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_akhir')->nullable();
            $table->date('tgl_pengiriman')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_published_ro')->default(false);
            // $table->boolean('verified_id')->default(false);
            $table->timestamps();
        });

        Schema::table('doheaders', function (Blueprint $table) {
            $table->foreign('preference_id')->references('id')->on('preferences');
        });

        Schema::table('doheaders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        
        Schema::table('doheaders', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });

        Schema::table('doheaders', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doheaders');
    }
}
