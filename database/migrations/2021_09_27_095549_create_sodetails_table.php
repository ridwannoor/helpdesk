<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sodetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('serviceorder_id')->unsigned();
            $table->text('deskripsi')->nullable();
            $table->string('qty')->nullable();
            $table->string('satuan')->nullable();
            $table->string('serial_num')->nullable();
            $table->text('lokasi')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

        Schema::table('sodetails', function (Blueprint $table) {
            $table->foreign('serviceorder_id')->references('id')->on('serviceorders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sodetails');
    }
}
