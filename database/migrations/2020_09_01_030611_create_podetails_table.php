<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rekappo_id')->unsigned();    
            $table->bigInteger('hargabarang_id')->unsigned();  
            $table->string('qty')->nullable();
            $table->string('satuan')->nullable();
            $table->string('harga')->nullable();  
            // $table->bigInteger('user_id')->unsigned();      
            $table->timestamps();
        });

        Schema::table('podetails', function (Blueprint $table) {
            $table->foreign('rekappo_id')->references('id')->on('rekappos');
        });

        Schema::table('podetails', function (Blueprint $table) {
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
        Schema::dropIfExists('podetails');
    }
}
