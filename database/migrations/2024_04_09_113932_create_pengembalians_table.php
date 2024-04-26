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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm');
            $table->string('pasien');
            $table->string('kelamin');
            $table->foreignId('dpjp_id');
            $table->foreignId('ruang_id');
            $table->date('tgl_pengembalian')->nullable();
            $table->date('tgl_kembali_rm')->nullable();
            $table->enum('status',['1','2']);
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
        Schema::dropIfExists('pengembalians');
    }
};
