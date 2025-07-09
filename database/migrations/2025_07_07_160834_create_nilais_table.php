<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id(); // <-- TAMBAHKAN BARIS INI

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained()->onDelete('cascade');
            $table->integer('nilai');
            $table->foreignId('guru_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
