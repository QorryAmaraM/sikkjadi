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
        Schema::create('monitoring_presensis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tahun');
            $table->string('bulan');
            $table->double('kode');
            $table->integer('cp');
            $table->integer('ct');
            $table->integer('cb');
            $table->integer('cs');
            $table->integer('cm');
            $table->integer('ctln');
            $table->integer('s');
            $table->integer('psw1');
            $table->integer('psw2');
            $table->integer('psw3');
            $table->integer('psw4');
            $table->integer('tl1');
            $table->integer('tl2');
            $table->integer('tl3');
            $table->integer('tl4');
            $table->integer('jhk');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring_presensis');
    }
};
