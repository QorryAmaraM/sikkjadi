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
            $table->integer('cp')->nullable();
            $table->integer('ct')->nullable();
            $table->integer('cb')->nullable();
            $table->integer('cs')->nullable();
            $table->integer('cm')->nullable();
            $table->integer('ctln')->nullable();
            $table->integer('s')->nullable();
            $table->integer('psw1')->nullable();
            $table->integer('psw2')->nullable();
            $table->integer('psw3')->nullable();
            $table->integer('psw4')->nullable();
            $table->integer('tl1')->nullable();
            $table->integer('tl2')->nullable();
            $table->integer('tl3')->nullable();
            $table->integer('tl4')->nullable();
            $table->integer('jhk')->nullable();
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
