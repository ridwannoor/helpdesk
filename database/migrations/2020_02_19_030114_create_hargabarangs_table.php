<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargabarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hargabarangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nama_brg')->nullable();
            $table->string('qty')->nullable();
            $table->string('satuan')->nullable();
            $table->string('harga_lama')->nullable();
            $table->string('harga')->nullable();
            $table->bigInteger('currency_id')->unsigned();
            $table->bigInteger('lokasi_id')->unsigned();
            $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('hargabarangs', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });

        Schema::table('hargabarangs', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
        });
        Schema::table('hargabarangs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hargabarangs');
    }
}
