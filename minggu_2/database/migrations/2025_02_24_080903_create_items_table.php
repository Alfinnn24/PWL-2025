<?php

use Illuminate\Database\Migrations\Migration; // menggunakan kelas Migration untuk mengelola database
use Illuminate\Database\Schema\Blueprint; // menggunakan Blueprint untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // menggunakan Schema untuk membuat atau menghapus tabel

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) { // membuat tables dengan nama items
            $table->id(); // membuat kolom id table
            $table->string('name'); // membuat kolom name table
            $table->text('description'); // membuat kolom description
            $table->timestamps(); // membuat kolom timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
