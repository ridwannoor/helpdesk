<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pofiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rekappo_id')->unsigned();
            $table->string('filepdf')->nullable();
            $table->timestamps();
        });

        Schema::table('pofiles', function (Blueprint $table) {
            $table->foreign('rekappo_id')->references('id')->on('rekappos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pofiles');
    }
}
