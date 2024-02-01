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
        Schema::create('ckprs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ckpt_id');
            $table->string('realisasi');
            $table->string('persen');
            $table->double('nilai');
            $table->enum('status', ['0','1']);
            $table->timestamps();

            $table->foreign('ckpt_id')->references('id')->on('ckpts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ckprs');
    }
};
