<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('file_upload')->nullable();
            $table->bigInteger('jenisticket_id')->nullable();
            $table->bigInteger('typeticket_id')->nullable();
            $table->bigInteger('statusticket_id')->nullable();
            $table->bigInteger('lokasi_id')->nullable();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('typeticket_id')->references('id')->on('typetickets');
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('statusticket_id')->references('id')->on('statustickets');
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('jenisticket_id')->references('id')->on('jenistickets');
        });
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
