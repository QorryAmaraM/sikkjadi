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
        Schema::create('list_uraian_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->string('pembuat');
            $table->string('fungsi');
            $table->text('uraian_kegiatan');
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
        Schema::dropIfExists('list_uraian_kegiatans');
    }
};
