<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kodeAu');
            $table->string('namaAu');
            $table->string('provinsi');
            $table->string('jenisAu');
            $table->date('tglMul');
            $table->date('tglSel');
            $table->string('rencana');
            $table->string('hasil');
            $table->string('progress');
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
        Schema::dropIfExists('audits');
    }
}
