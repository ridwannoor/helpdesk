<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dofiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doheader_id')->unsigned();
            $table->string('filename')->nullable();
            $table->timestamps();
        });

        Schema::table('dofiles', function (Blueprint $table) {
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
        Schema::dropIfExists('dofiles');
    }
}
