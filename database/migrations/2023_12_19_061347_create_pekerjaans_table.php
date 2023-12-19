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
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipe_pekerjaan_id');
            $table->foreign('tipe_pekerjaan_id')->references('id')->on('tipe_pekerjaans')->comment('Tipe Pekerjaan');
            $table->string('nama_pekerjaan', 50)->comment('Nama Pekerjaan');
            $table->text('keterangan_pekerjaan')->comment('Keterangan Pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
