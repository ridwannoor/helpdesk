<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('orderheader_id')->unsigned();    
            $table->bigInteger('hargabarang_id')->unsigned();  
            $table->string('qty')->nullable();
            $table->string('harga')->nullable();             
            $table->bigInteger('user_id')->unsigned();   
            $table->timestamps();
        });

        Schema::table('orderdetails', function (Blueprint $table) {
            $table->foreign('orderheader_id')->references('id')->on('orderheaders');
        });

        Schema::table('orderdetails', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('orderdetails', function (Blueprint $table) {
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
        Schema::dropIfExists('orderdetails');
    }
}
