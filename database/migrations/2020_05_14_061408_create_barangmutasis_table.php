<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangmutasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangmutasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('barang_id')->unsigned();
            $table->bigInteger('lokasi_id')->unsigned();
            $table->date('checkout_date')->nullable();
            $table->date('expected_checkin_date')->nullable();
            $table->string('catatan')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('user_id')->unsigned();            
            $table->timestamps();
        });
        Schema::table('barangmutasis', function (Blueprint $table) {
            $table->foreign('barang_id')->references('id')->on('barangs');
        });
        Schema::table('barangmutasis', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
        });
        Schema::table('barangmutasis', function (Blueprint $table) {
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
        Schema::dropIfExists('barangmutasis');
    }
}
