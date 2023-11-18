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
        Schema::create('penilaian_ckprs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_nama')->constrained();
            $table->string('tahun');
            $table->string('bulan');
            $table->string('no');
            $table->string('nama_pegawai');
            $table->text('uraian_kegiatan');
            $table->string('satuan');
            $table->string('target');
            $table->string('realisasi');
            $table->string('persen');
            $table->double('nilai');
            $table->double('kode_butir');
            $table->double('angka_kredit');
            $table->double('kode');
            $table->text('keterangan_staff');
            $table->text('keterangan_penilai');
            $table->double('penilai');
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
        Schema::dropIfExists('penilaian_ckprs');
    }
};
