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
        Schema::create('pesanan_pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('klien_id');
            $table->foreign('klien_id')->references('id')->on('kliens')->comment('klien');
            $table->string('nama_pesanan_pembelian', 50)->comment('Nama Pesanan Pembelian');
            $table->text('keterangan_pesanan_pembelian')->comment('Keterangan Pesanan Pembelian');
            $table->dateTime('tanggal_pesanan_pembelian')->comment('Tanggal Pesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_pembelians');
    }
};
