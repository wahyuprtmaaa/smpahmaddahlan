<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->string('nis')->unique();
            $table->string('nama');
            $table->foreignId('id_kelas')->constrained('kelas');
            $table->text('alamat');
            $table->string('telepon');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('foto')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
