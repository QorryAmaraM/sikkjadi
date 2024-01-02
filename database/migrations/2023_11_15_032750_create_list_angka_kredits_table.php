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
        Schema::create('list_angka_kredits', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_fungsi');
            $table->double('kode_butir');
            $table->text('isi_butir');
            $table->double('angka_kredit');
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
        Schema::dropIfExists('list_angka_kredits');
    }
};
