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
        Schema::create('sertifikats', function (Blueprint $table) {

            $table->id();

                                                         // ...
$table->foreignId('user_id')->constrained(); // Siswa pemilik sertifikat
$table->string('judul_sertifikat');
$table->string('file_sertifikat'); // [cite: 304, 320]
$table->date('tanggal_diterbitkan');
$table->timestamps();
// ...

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikats');
    }
};
