<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ckprs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->double('nip');
            $table->string('tahun');
            $table->string('bulan');
            $table->string('no');
            $table->string('fungsi');
            $table->string('periode');
            $table->text('uraian_kegiatan');
            $table->string('satuan');
            $table->string('target');
            $table->string('target_rev');
            $table->string('realisasi');
            $table->string('persen');
            $table->double('nilai');
            $table->double('kode_butir');
            $table->double('angka_kredit');
            $table->double('kode');
            $table->text('keterangan');
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
        Schema::dropIfExists('ckprs');
    }
};
