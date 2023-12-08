<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrgmasukdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgmasukdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('brgmasuk_id')->unsigned();
            $table->bigInteger('barang_id')->unsigned();
            $table->string('total');
            $table->timestamps();
        });

        Schema::table('brgmasukdetails', function (Blueprint $table) {
            $table->foreign('brgmasuk_id')->references('id')->on('brgmasuks');
        });

        Schema::table('brgmasukdetails', function (Blueprint $table) {
            $table->foreign('barang_id')->references('id')->on('barangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brgmasukdetails');
    }
}
