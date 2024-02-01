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
            $table->unsignedBigInteger('ckpr_id');
            $table->text('keterangan_penilai');
            $table->double('penilai');
            $table->timestamps();

            $table->foreign('ckpr_id')->references('id')->on('ckprs')->onDelete('cascade');
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
