<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VlDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlDetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipeData2');
            $table->string('hs');
            $table->string('produk');
            $table->string('volume');
            $table->string('weight');
            $table->string('unit');
            $table->string('value');
            $table->string('scientific');
            $table->string('kodeHc');
            $table->string('hsPrint');
            $table->string('valuta');
            $table->rememberToken();
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
        Schema::dropIfExists('vlDetail');
    }
}
