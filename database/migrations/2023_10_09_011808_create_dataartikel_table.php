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
        Schema::create('dataartikel', function (Blueprint $table) {
            $table->id();
            $table->string('cover');
            $table->string('judul');
            $table->integer('tahun');
            $table->string('kategori');
            $table->longText('deskripsi');
            $table->string('image')->nullable();
            $table->string('username');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataartikel');
    }
};
