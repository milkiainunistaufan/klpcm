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
        Schema::create('klpcms', function (Blueprint $table) {
            $table->id();
            $table->string('pasien');
            $table->string('umur');
            $table->string('cara_bayar');
            $table->string('no_rm');
            $table->string('kelamin');
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->string('rm3');
            $table->string('rm4');
            $table->string('rm8a');
            $table->string('rm8b');
            $table->string('rm9a');
            $table->string('rm9b');
            $table->string('rm9c');
            $table->string('rm9d');
            $table->string('rm9e');
            $table->string('rm9f');
            $table->string('rm9g');
            $table->string('rm9h');
            $table->string('rm9l');
            $table->string('rm15a');
            $table->string('diagnosa');
            $table->string('tindakan');
            $table->foreignId('dpjp_id');
            $table->string('cara_keluar');
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
        Schema::dropIfExists('klpcms');
    }
};
