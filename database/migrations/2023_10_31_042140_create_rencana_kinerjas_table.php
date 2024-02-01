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
            $table->enum('kinerja', ['utama','tambahan'])->nullable();
            $table->string('jenis')->nullable();
            $table->string('rencana_kinerja_atasan')->nullable();
            $table->string('rencana kinerja')->nullable();
            $table->string('aspek')->nullable();
            $table->string('iki')->nullable();
            $table->string('target_min')->nullable();
            $table->string('target_max')->nullable();
            $table->string('satuan')->nullable();
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
