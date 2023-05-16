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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nomor_anggota')->unique()->nullable();
            $table->string('nama')->required();
            $table->string('tempat_lahir')->required();
            $table->date('tanggal_lahir')->required();
            $table->string('email')->unique();
            $table->string('no_wa')->required();
            $table->string('prodi')->required();
            $table->enum('status_agen',['muda','berkarya','istimewa','alumni'])->required();
            $table->enum('role',["admin","anggota","peninjau"])->required();
            $table->string('foto')->nullable();
            $table->integer('poin')->default(0);
            $table->string('password')->required();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
