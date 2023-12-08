<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePumdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pumdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pumheader_id')->nullable();
            $table->text('deskripsi')->nullable();  
            $table->string('jumlah')->nullable();   
            $table->timestamps();
        });

        Schema::table('pumdetails', function (Blueprint $table) {
            $table->foreign('pumheader_id')->references('id')->on('pumheaders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pumdetails');
    }
}
