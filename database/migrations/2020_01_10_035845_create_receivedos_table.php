<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceivedosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivedos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_receive');
            $table->bigInteger('doheader_id')->unsigned();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        Schema::table('receivedos', function (Blueprint $table) {
            $table->foreign('doheader_id')->references('id')->on('doheaders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receivedos');
    }
}
