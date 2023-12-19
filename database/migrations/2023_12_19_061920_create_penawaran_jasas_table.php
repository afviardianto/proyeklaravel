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
        Schema::create('penawaran_jasas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('klien_id');
            $table->foreign('klien_id')->references('id')->on('kliens')->comment('klien');
            $table->string('nama_penawaran_jasa', 50)->comment('Nama Jasa');
            $table->text('keterangan_penawaran_jasa')->comment('Keterangan Jasa');
            $table->date('tanggal_penawaran_jasa')->comment('Tanggal Penawaran Jasa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penawaran_jasas');
    }
};
