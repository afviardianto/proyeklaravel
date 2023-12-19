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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pesanan_pembelian_id');
            $table->foreign('pesanan_pembelian_id')->references('id')->on('pesanan_pembelians')->comment('pesanan pembelian');
            $table->dateTime('tanggal_tagihan')->comment('tanggal Tagihan');
            $table->decimal('jumlah_tagihan', 15, 2)->comment('Jumlah Tagihan');
            $table->boolean('status_tagihan')->comment('Status Tagihan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
