<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivedodetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doheader_id')->unsigned();
            $table->bigInteger('dodetail_id')->unsigned();
            $table->text('catatan_revisi')->nullable();
            $table->timestamps();
        });

        Schema::table('receivedodetails', function (Blueprint $table) {
            $table->foreign('doheader_id')->references('id')->on('doheaders');
        });
        Schema::table('receivedodetails', function (Blueprint $table) {
            $table->foreign('dodetail_id')->references('id')->on('dodetails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receivedodetails');
    }
}
