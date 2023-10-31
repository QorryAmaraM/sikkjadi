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
            $table->foreignId('user_id')->constrained();
            $table->integer('tahun');
            $table->string('periode');
            $table->string('wilayah');
            $table->string('unit_kerja');
            $table->boolean('kinerja');
            $table->string('jenis');
            $table->string('rencana_kinerja_atasan');
            $table->string('rencana kinerja');
            $table->string('aspek');
            $table->string('iki');
            $table->string('target_min');
            $table->string('target_max');
            $table->string('satuan');
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
        Schema::dropIfExists('rencana_kinerjas');
    }
};
