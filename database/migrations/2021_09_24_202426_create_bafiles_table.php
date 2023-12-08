<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBafilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bafiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('banego_id')->unsigned();
            $table->string('filepdf')->nullable();
            $table->timestamps();
        });

        Schema::table('bafiles', function (Blueprint $table) {
            $table->foreign('banego_id')->references('id')->on('banegos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bafiles');
    }
}
