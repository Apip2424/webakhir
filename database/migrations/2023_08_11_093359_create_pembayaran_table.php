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
            $table->foreignId('nama_barang')->constrained('barang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('konsumen_id')->constrained('konsumen')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tanggal_pembayaran')->nullable();
            $table->string('jumlah_pesanan')->nullable();
            $table->string('jenis_pembayaran')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};