<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderheadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderheaders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_order');
            $table->date('tanggal')->nullable(); 
            $table->bigInteger('user_id')->unsigned();    
            $table->timestamps();
        });

       

        Schema::table('orderheaders', function (Blueprint $table) {
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
        Schema::dropIfExists('orderheaders');
    }
}
