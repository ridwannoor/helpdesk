<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('potemps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('poheader_id')->unsigned();    
            $table->bigInteger('hargabarang_id')->unsigned();  
            $table->string('qty')->nullable();
            $table->string('satuan')->nullable();
            $table->string('harga')->nullable(); 
            // $table->bigInteger('user_id')->unsigned();     
            $table->timestamps();
        });

        Schema::table('potemps', function (Blueprint $table) {
            $table->foreign('poheader_id')->references('id')->on('poheaders');
        });

        Schema::table('potemps', function (Blueprint $table) {
            $table->foreign('hargabarang_id')->references('id')->on('hargabarangs');
        });

        // Schema::table('potemps', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('potemps');
    }
}
