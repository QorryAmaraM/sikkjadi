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
        Schema::create('penilaian_skps', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->double('nip');
            $table->string('pangkat');
            $table->string('jabatan');
            $table->string('unit_kerja');
            $table->boolean('kinerja');
            $table->string('jenis');
            $table->string('rencana_kinerja_atasan');
            $table->string('rencana_kinerja');
            $table->string('aspek');
            $table->string('iki');
            $table->double('target_min');
            $table->double('target_max');
            $table->double('satuan');
            $table->string('realisasi');
            $table->string('kondisi');
            $table->double('capaian_iki');
            $table->string('kategori_capaian_iki');
            $table->double('nilai_capaaian_rencana');
            $table->string('kategori_capaian_rencana');
            $table->double('nilai_tertimbang');
            $table->double('nilai_kinerja_utama');
            $table->double('nilai_kinerja_tambahan');
            $table->double('nilai_skp');
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
        Schema::dropIfExists('penilaian_skps');
    }
};
