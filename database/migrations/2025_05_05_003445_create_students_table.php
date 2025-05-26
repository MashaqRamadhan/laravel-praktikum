<?php
# Fadhil Akmal

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_id_number')->unique();
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->date('birth_date');
            $table->enum('gender', ['Male', 'Female']);
            $table->enum('status', ['Active', 'Inactive', 'Graduated', 'Dropped Out']);

            // Foreign key ke tabel majors
            $table->unsignedBigInteger('major_id');

            $table->foreign('major_id', 'majors_student_id')
                  ->references('id')
                  ->on('majors')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
