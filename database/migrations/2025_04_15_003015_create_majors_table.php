<?php
# Fadhil Akmal

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
        Schema::create('majors', function (Blueprint $table) {
            $table->id(); // Primary key (unsignedBigInteger auto increment)
            $table->string('name'); // Nama jurusan
            $table->string('code')->unique(); // Kode jurusan (misal: TI01)
            $table->text('description')->nullable(); // Deskripsi jurusan, bisa kosong
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('majors');
    }
};
