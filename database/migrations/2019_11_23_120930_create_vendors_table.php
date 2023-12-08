<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->string('contactperson')->nullable();
            $table->bigInteger('badanusaha_id')->unsigned();
            $table->string('namaperusahaan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('product')->nullable();
            $table->bigInteger('jenisusaha_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('lokasi_id')->unsigned();
            $table->string('email')->nullable();
            $table->string('contactperson')->nullable();
            $table->string('notelp')->nullable();
            $table->string('npwp')->nullable();
            $table->bigInteger('bank_id')->unsigned();
            $table->string('no_rek')->nullable();
            $table->string('pemilik_rek')->nullable();
            $table->string('handphone')->nullable();
            $table->string('alternative_person')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->string('website')->nullable();
            $table->string('catatan')->nullable();
            $table->rememberToken();
            $table->string('password')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('badanusaha_id')->references('id')->on('badanusahas');
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('lokasi_id')->references('id')->on('lokasis');
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks');
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('jenisusaha_id')->references('id')->on('jenisusahas');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
        $table->dropForeign(['badanusahas', 'categories', 'jenisusahas', 'lokasis', 'banks', 'users']);
        // Schema::dropIfExists('badanusahas');
        // Schema::dropIfExists('categories');
        // Schema::dropIfExists('jenisusahas');
        // Schema::dropIfExists('lokasis');
    }
}
