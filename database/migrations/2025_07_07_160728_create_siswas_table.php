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
    Schema::create('siswas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
        $table->string('nama_lengkap'); // [cite: 381]
        $table->string('nama_panggilan'); // [cite: 382]
        $table->string('jenis_kelamin'); // [cite: 387]
        $table->string('tempat_lahir'); // [cite: 389]
        $table->date('tanggal_lahir'); // [cite: 389]
        $table->string('agama'); // [cite: 391]
        $table->string('status'); // [cite: 392]
        $table->text('alamat'); // [cite: 393]
        $table->integer('tinggi_badan')->nullable(); // [cite: 384]
        $table->integer('berat_badan')->nullable(); // [cite: 386]
        $table->string('nomor_telp'); // [cite: 388]
        $table->string('nomor_telp_orang_tua'); // [cite: 390]
        $table->string('pendidikan_terakhir'); // [cite: 394]
        $table->string('asal_sekolah'); // [cite: 395]
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
