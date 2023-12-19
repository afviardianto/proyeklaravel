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
        Schema::create('tipe_pekerjaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tipe_pekerjaan', 50)->comment('Nama Tipe Pekerjaan');
            $table->text('keterangan_tipe_pekerjaan')->comment('Keterangan Tipe Pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_pekerjaans');
    }
};
