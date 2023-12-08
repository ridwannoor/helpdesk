<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePumheadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pumheaders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pum')->nullable();
            $table->date('tanggal')->nullable();           
            $table->bigInteger('preference_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('lokasi_id')->unsigned();
            $table->bigInteger('divisi_id')->unsigned();  
            $table->bigInteger('divisi1_id')->unsigned();  
            $table->bigInteger('bod_id')->unsigned();       
            $table->text('nama_pek')->nullable();
            $table->text('total')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });

        Schema::table('pumheaders', function (Blueprint $table) {
            $table->foreign('preference_id')->references('id')->on('preferences');
        });

        Schema::table('pumheaders', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('pumheaders', function (Blueprint $table) {
            $table->foreign('bod_id')->references('id')->on('bods');
        });

        Schema::table('pumheaders', function (Blueprint $table) {
            $table->foreign('divisi_id')->references('id')->on('divisis');
        });

        Schema::table('pumheaders', function (Blueprint $table) {
            $table->foreign('divisi1_id')->references('id')->on('divisis');
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pumheaders');
    }
}
