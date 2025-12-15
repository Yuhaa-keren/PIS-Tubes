<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warnings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->text('description')->nullable(); 
            // $table->string('level'); 
            $table->timestamps();
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade'); // Admin yang mengeluarkan peringatan (asumsi tabel admin juga 'users')
            $table->enum('warning_type', ['--Pilih Tipe--','Pelanggaran Aturan', 'Tindakan Akun (Blokir/Suspend)', 'Pengumuman Penting', 'Lain-lain'])->default('--Pilih Tipe--');
            $table->string('subject'); // Judul atau subjek peringatan
            $table->text('message'); // Isi pesan peringatan
            $table->enum('status', ['sent', 'read', 'resolved', 'pending_action'])->default('sent'); // Status peringatan
            $table->timestamp('expires_at')->nullable(); // Tanggal kadaluarsa (opsional)
=======
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->constrained('users')->onDelete('cascade'); 
            $table->string('warning_type'); 
            $table->string('subject');
            $table->text('message'); 
            $table->enum('status', ['sent', 'read', 'resolved', 'pending_action'])->default('sent'); 
            $table->timestamp('expires_at')->nullable(); 
            $table->timestamps();
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warnings');
    }
};