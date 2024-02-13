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
        Schema::create('rencana_kinerjas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skp_tahunan_id');
            $table->enum('kinerja', ['utama', 'tambahan'])->nullable();
            $table->string('jenis')->nullable();
            $table->string('rencana_kinerja_atasan')->nullable();
            $table->string('rencana_kinerja')->nullable();
            $table->string('aspek')->nullable();
            $table->string('kuantitas_iki')->nullable();
            $table->string('kuantitas_target_min')->nullable();
            $table->string('kuantitas_target_max')->nullable();
            $table->string('kuantitas_satuan')->nullable();
            $table->string('kualitas_iki')->nullable();
            $table->string('kualitas_target_min')->nullable();
            $table->string('kualitas_target_max')->nullable();
            $table->string('kualitas_satuan')->nullable();
            $table->string('waktu_iki')->nullable();
            $table->string('waktu_target_min')->nullable();
            $table->string('waktu_target_max')->nullable();
            $table->string('waktu_satuan')->nullable();
            $table->timestamps();

            $table->foreign('skp_tahunan_id')->references('id')->on('skp_tahunans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rencana_kinerjas');
    }
};
