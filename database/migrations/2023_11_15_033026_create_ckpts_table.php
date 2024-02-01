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
        Schema::create('ckpts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('Angka_kredit_id');
            $table->unsignedBigInteger('Uraian_kegiatan_id');
            $table->string('tahun');
            $table->string('bulan');
            $table->string('satuan');
            $table->string('target');
            $table->string('target_rev');
            $table->enum('kode', ['utama','tambahan']);
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('Angka_kredit_id')->references('id')->on('entri_angka_kredits')->onDelete('cascade');
            $table->foreign('Uraian_kegiatan_id')->references('id')->on('list_uraian_kegiatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckpts');
    }
};
