<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nklestari extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kodeAu');
            $table->string('namaAu');
            $table->string('provinsi');
            $table->string('lingkup');
            $table->string('noSer');
            $table->date('sdSer');
            $table->date('edSer');
            $table->string('durasi');
            $table->string('progress');
            $table->string('status');
            $table->string('npwp');
            $table->string('namaEks');
            $table->string('alamatEks');
            $table->string('kodeProv');
            $table->string('kodeKab');
            $table->string('etpik');
            $table->string('skema');
            $table->string('kodePen');
            $table->string('tempat');
            $table->string('slk');
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
        Schema::dropIfExists('clients');
    }
}
