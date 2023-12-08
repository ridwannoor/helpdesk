<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanegoDivisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banego_divisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('banego_id')->unsigned();
            $table->bigInteger('divisi_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('banego_divisi', function (Blueprint $table) {
            $table->foreign('banego_id')->references('id')->on('banegos');
        });
        Schema::table('banego_divisi', function (Blueprint $table) {
            $table->foreign('divisi_id')->references('id')->on('divisis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisi_banego');
    }
}
