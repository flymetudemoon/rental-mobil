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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('ktp_peminjam');
            $table->string('keperluan_pinjam');
            $table->date('mulai');
            $table->date('selesai');
            $table->double('biaya');
            $table->unsignedBigInteger('armada_id')->references('id')->on('armada')->onDelete('cascade');
            $table->string('komentar_peminjam');
            $table->string('status_pinjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
