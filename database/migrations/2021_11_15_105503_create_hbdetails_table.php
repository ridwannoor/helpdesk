<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHbdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hbdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hargabarang_id')->unsigned();
            $table->bigInteger('doheader_id')->unsigned();  
            $table->string('qty')->nullable(); 
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::table('hbdetails', function (Blueprint $table) {
            $table->foreign('hargabarang_id')->references('id')->on('hargabarangs');
        });

        Schema::table('hbdetails', function (Blueprint $table) {
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
        Schema::dropIfExists('hbdetails');
    }
}
