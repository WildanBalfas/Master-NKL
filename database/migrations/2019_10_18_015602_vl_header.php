<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VlHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlHeader', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipeData1');
            $table->string('npwp');
            $table->string('namaEks');
            $table->string('alamatEks');
            $table->string('kodeProv');
            $table->string('etpik');
            $table->string('namaImp');
            $table->string('alamatImp');
            $table->string('kodeNegImp');
            $table->string('kodeMuat');
            $table->string('kodeBongkar');
            $table->string('kodeNegTuj');
            $table->string('skema');
            $table->string('noVlegal');
            $table->string('tranport');
            $table->string('noInvoice');
            $table->date('tglInvoice');
            $table->string('keterangan');
            $table->string('kodePeng');
            $table->string('kodePenj');
            $table->string('tempatTtd');
            $table->date('tglTtd');
            $table->string('slk');
            $table->string('digitalSign');
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
        Schema::dropIfExists('vlHeader');
    }
}
