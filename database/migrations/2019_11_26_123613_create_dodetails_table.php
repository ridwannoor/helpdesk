<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dodetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doheader_id')->unsigned();
            $table->bigInteger('hargabarang_id')->unsigned();
            $table->string('qty')->nullable();
            $table->string('qty_baik')->nullable();
            $table->string('qty_rusak')->nullable();
            $table->string('satuan')->nullable();
            $table->text('catatan')->nullable();
            // $table->text('catatan_revisi')->nullable();
            $table->timestamps();
        });

        Schema::table('dodetails', function (Blueprint $table) {
            $table->foreign('doheader_id')->references('id')->on('doheaders');
        });

        Schema::table('dodetails', function (Blueprint $table) {
            $table->foreign('hargabarang_id')->references('id')->on('hargabarangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dodetails');
    }
}
