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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_armada'); // Foreign key referencing the cars table
            $table->foreign('id_armada')->references('id')->on('armadas')->onDelete('cascade');
            $table->unsignedBigInteger('id_user'); // Foreign key referencing the users table
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('tanggal_pembuatan');
            $table->string('no_telp');
            $table->boolean('supir')->default(false);
            $table->date('tanggal_mulai'); // Start time of the booking
            $table->date('tanggal_akhir'); // End time of the booking
            $table->unsignedBigInteger('harga');
            $table->enum('status_booking', ['proses', 'selesai', 'batal'])->default('proses');
            $table->enum('status_pembayaran', ['belum dibayar', 'lunas'])->default('belum dibayar'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
