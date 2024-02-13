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
            $table->unsignedBigInteger('penilai_user_id');
            $table->unsignedBigInteger('rencanakinerja_id');
            $table->double('kuantitas_realisasi')->nullable();
            $table->enum('kuantitas_kondisi', ['normal', 'khusus'])->nullable();
            $table->double('kuantitas_capaian_iki')->nullable();
            $table->enum('kuantitas_kategori_capaian_iki', ['sangat baik', 'baik', 'cukup', 'kurang', 'sangat kurang'])->nullable();
            $table->double('kualitas_realisasi')->nullable();
            $table->enum('kualitas_kondisi', ['normal', 'khusus'])->nullable();
            $table->double('kualitas_capaian_iki')->nullable();
            $table->enum('kualitas_kategori_capaian_iki', ['sangat baik', 'baik', 'cukup', 'kurang', 'sangat kurang'])->nullable();
            $table->double('waktu_realisasi')->nullable();
            $table->enum('waktu_kondisi', ['normal', 'khusus'])->nullable();
            $table->double('waktu_capaian_iki')->nullable();
            $table->enum('waktu_kategori_capaian_iki', ['sangat baik', 'baik', 'cukup', 'kurang', 'sangat kurang'])->nullable();
            $table->double('nilai_capaian_rencana')->nullable();
            $table->string('kategori_capaian_rencana')->nullable();
            $table->double('nilai_tertimbang')->nullable();
            $table->timestamps();
            $table->foreign('penilai_user_id')->references('id')->on('users')->onDelete('cascade');
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
