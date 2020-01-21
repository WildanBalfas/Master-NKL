<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegalHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_header', function (Blueprint $table) {
            $table->bigIncrements('id'); // No. V-Legal
            $table->string('client_id', 255)->nullable();
            $table->string('tipe_data', 255)->nullable();
            $table->string('npwp', 100)->nullable();
            $table->string('name_eksportir', 200)->nullable();
            $table->string('alamat_eksportir', 200)->nullable();
            $table->string('kode_propinsi', 100)->nullable();
            $table->string('kode_kabupaten', 100)->nullable();
            $table->string('no_etpik', 255)->nullable();
            $table->string('nama_importir', 255)->nullable();
            $table->text('alamat_importir')->nullable();
            $table->string('kode_negara_importir', 55)->nullable();
            $table->string('kode_pelabuhan_muat', 55)->nullable();
            $table->string('kode_pelabuhan_bongkar', 55)->nullable();
            $table->string('kode_negara_tujuan', 55)->nullable();
            $table->string('skema_kerjasama', 255)->nullable();
            $table->string('no_vlegal', 200)->nullable();
            $table->string('transportasi', 25)->nullable();
            $table->string('no_invoice', 255)->nullable();
            $table->datetime('tgl_invoice')->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->string('kode_pejabat_ttd', 100)->nullable();
            $table->string('kode_pengaman', 100)->nullable();
            $table->string('tempat_ttd', 100)->nullable();
            $table->datetime('tgl_ttd')->nullable();
            $table->string('no_slk', 100)->nullable();
            $table->string('digital_sign', 100)->nullable();
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
        Schema::dropIfExists('legal_headers');
    }
}
