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
            $table->unsignedBigInteger('rencanakinerja_id');
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

            $table->foreign('rencanakinerja_id')->references('id')->on('rencana_kinerjas')->onDelete('cascade');
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
