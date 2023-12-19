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
        Schema::create('referensi_perusahaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 50)->comment('Nama Perusahaan');
            $table->string('email', 100)->unique()->comment('Email Perusahaan');
            $table->string('nama_akun_bank', 50)->comment('Nama Akun Bank');
            $table->string('nomor_akun_bank', 20)->comment('Nomor Akun Bank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referensi_perusahaans');
    }
};
