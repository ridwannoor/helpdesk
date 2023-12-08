<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargalistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hargalists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('hargabarang_id')->unsigned();
            $table->string('hargabaru')->nullable();
            $table->string('hargalama')->nullable();
            // $table->datetime('tanggal');
            // $table->timestamps();
        });

        Schema::table('hargalists', function (Blueprint $table) {
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
        Schema::dropIfExists('hargalists');
    }
}
