<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_so')->nullable();
            $table->date('tanggal')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->bigInteger('preference_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('lokasi_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned();  
            $table->bigInteger('bod_id')->unsigned();       
            $table->text('nama_pek')->nullable();
            $table->text('no_kontrak')->nullable();
            $table->date('tgl_kontrak')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        Schema::table('serviceorders', function (Blueprint $table) {
            $table->foreign('preference_id')->references('id')->on('preferences');
        });
        Schema::table('serviceorders', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
        });
        Schema::table('serviceorders', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
        Schema::table('serviceorders', function (Blueprint $table) {
            $table->foreign('bod_id')->references('id')->on('bods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviceorders');
    }
}
