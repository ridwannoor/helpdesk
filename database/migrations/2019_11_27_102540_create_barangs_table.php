<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_brg');
            $table->string('aset_tag')->nullable();
            $table->string('serial')->nullable();
            $table->bigInteger('lokasi_id')->unsigned();
            $table->string('tahun_perolehan')->nullable();
            $table->string('tgl_pembelian')->nullable();
            $table->string('image')->nullable();
            $table->text('catatan')->nullable();
            // $table->bigInteger('vendor_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('barangs', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });

        Schema::table('barangs', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
        });

        Schema::table('barangs', function (Blueprint $table) {
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
        Schema::dropIfExists('barangs');
    }
}
