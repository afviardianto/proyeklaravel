<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('permintaan_jasas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('klien_id');
            $table->foreign('klien_id')->references('id')->on('kliens')->comment('klien');
            $table->string('nama_permintaan_jasa', 50)->comment('Nama Jasa');
            $table->text('keterangan_permintaan_jasa')->comment('Keterangan Jasa');
            $table->date('tanggal_permintaan_jasa')->comment('Tanggal Permintaan Jasa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_jasas');
    }
};
