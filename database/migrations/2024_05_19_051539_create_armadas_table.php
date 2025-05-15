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
        Schema::create('armadas', function (Blueprint $table) {
            $table->id();
            $table->string('merk');
            $table->string('model'); 
            $table->unsignedInteger('nik');
            $table->unsignedInteger('kilometer');
            $table->enum('bahan_bakar', ['bensin', 'diesel', 'hybrid']);
            $table->enum('transmisi', ['manual', 'automatic']);
            $table->string('warna');
            $table->integer('harga');
            $table->string('no_plat');
            $table->enum('status', ['disewa', 'tersedia', 'pemeliharaan']);
            $table->string('foto');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armadas');
    }
};
