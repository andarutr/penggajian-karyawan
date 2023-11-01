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
            $table->bigInteger('nik')->nullable();
            $table->string('nama_lengkap', 50);
            $table->enum('jenis_kelamin', ['Pria','Wanita']);
            $table->enum('status', ['Kawin','Belum Menikah'])->nullable();
            $table->enum('agama', ['Islam','Kristen','Katolik','Budha','Hindu']);
            $table->enum('kewarganegaraan', ['WNI','WNA']);
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('divisi_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('role_id');
            $table->rememberToken();
            $table->timestamps();

            // Foreign Key
            $table->foreign('divisi_id')
                    ->references('id')
                    ->on('divisi')
                    ->onDelete('cascade');
            $table->foreign('jabatan_id')
                    ->references('id')
                    ->on('jabatan')
                    ->onDelete('cascade');
            $table->foreign('role_id')
                    ->references('id')
                    ->on('roles')
                    ->onDelete('cascade');
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
