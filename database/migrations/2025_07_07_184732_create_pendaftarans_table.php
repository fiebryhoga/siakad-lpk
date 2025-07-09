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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
    
            // Kolom untuk membuat akun login
            $table->string('email')->unique();
            $table->string('password');
    
            // Kolom data diri lengkap
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('status');
            $table->text('alamat');
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('nomor_telp');
            $table->string('nomor_telp_orang_tua');
            $table->string('pendidikan_terakhir');
            $table->string('asal_sekolah');
    
            // Kolom untuk status persetujuan
            $table->string('status_pendaftaran')->default('pending'); // pending, disetujui, ditolak
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
