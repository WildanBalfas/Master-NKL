<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_hs', 100)->nullable();
            $table->string('nama_produk', 200)->nullable();
            $table->string('volume', 200)->nullable();
            $table->string('net_weight', 100)->nullable();
            $table->string('nou', 100)->nullable();
            $table->integer('value')->nullable();
            $table->string('scientific_name', 255)->nullable();
            $table->string('kode_harvest_country',255)->nullable();
            $table->string('hs_printed', 255)->nullable();
            $table->string('valuta', 255)->nullable();
            $table->integer('id_header')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legal_details');
    }
}
