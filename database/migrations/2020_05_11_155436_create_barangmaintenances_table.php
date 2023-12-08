<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangmaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangmaintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('barang_id')->unsigned();
            $table->string('vendor_id')->unsigned();
            $table->string('tipemaintenance_id')->unsigned();
            $table->string('title')->nullable();
            $table->date('start_date')->nullable();
            $table->date('complete_date')->nullable();
            $table->string('biaya')->nullable();
            $table->string('catatan')->nullable();
            // $table->bigInteger('vendor_id');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('barangmaintenances', function (Blueprint $table) {
            $table->foreign('barang_id')->references('id')->on('barangs');
        });
        Schema::table('barangmaintenances', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
        Schema::table('barangmaintenances', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('barangmaintenances', function (Blueprint $table) {
            $table->foreign('tipemaintenance_id')->references('id')->on('tipemaintenances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangmaintenances');
    }
}
