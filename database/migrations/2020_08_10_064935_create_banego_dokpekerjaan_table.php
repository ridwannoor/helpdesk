<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanegoDokpekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banego_dokpekerjaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('banego_id')->unsigned();
            $table->bigInteger('dokpekerjaan_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('banego_dokpekerjaan', function (Blueprint $table) {
            $table->foreign('banego_id')->references('id')->on('banegos');
        });
        Schema::table('banego_dokpekerjaan', function (Blueprint $table) {
            $table->foreign('dokpekerjaan_id')->references('id')->on('dokpekerjaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banego_dokpekerjaan');
    }
}
