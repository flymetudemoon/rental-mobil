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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->double('jumlah_bayar');
            $table->unsignedBigInteger('peminjaman_id');
            $table->timestamps();

            // Menambahkan foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
        });
    }
};