<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sofiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('serviceorder_id')->unsigned();
            $table->string('filename')->nullable();
            $table->timestamps();
        });

        Schema::table('sofiles', function (Blueprint $table) {
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
        Schema::dropIfExists('sofiles');
    }
}
