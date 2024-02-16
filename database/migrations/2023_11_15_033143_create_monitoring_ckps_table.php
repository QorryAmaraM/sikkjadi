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
        Schema::create('monitoring_ckps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penilaian_ckpr_id');
            $table->string('ckp_akhir');
            $table->string('keterangan_kepala')->nullable();
            $table->timestamps();

            $table->foreign('penilaian_ckpr_id')->references('id')->on('penilaian_ckprs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring_ckps');
    }
};
