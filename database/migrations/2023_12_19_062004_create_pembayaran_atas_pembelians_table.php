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
        Schema::create('pembayaran_atas_pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tagihan_id');
            $table->foreign('tagihan_id')->references('id')->on('tagihans')->comment('Tagihan Pembayaran Atas Pembelian');
            $table->decimal('jumlah_pembayaran', 15, 2)->comment('Jumlah Pembayaran');
            $table->dateTime('tanggal_pembayaran')->comment('Tanggal Pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_atas_pembelians');
    }
};
