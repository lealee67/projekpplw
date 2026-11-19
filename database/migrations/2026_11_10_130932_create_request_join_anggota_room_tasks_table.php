<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('request_join', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->foreignId('room_id')->constrained()->cascadeOnDelete();
            $t->foreignId('role_id')->constrained('roles')->cascadeOnDelete();
            $t->string('status', 50)->default('pending'); // pending | diterima | ditolak
            $t->date('tanggal_request');
            $t->timestamps();
        });
        Schema::create('anggota_room', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->foreignId('room_id')->constrained()->cascadeOnDelete();
            $t->unique(['user_id', 'room_id']);
            $t->timestamps();
        });
        Schema::create('tasks', function (Blueprint $t) {
            $t->id();
            $t->foreignId('room_id')->constrained()->cascadeOnDelete();
            $t->foreignId('status_id')->constrained('status');
            $t->foreignId('anggota_id')->nullable()->constrained('anggota_room')->nullOnDelete();
            $t->string('nama_task', 100);
            $t->string('created_by', 20);
            $t->dateTime('due_date')->nullable();
            $t->text('link_attachment_task')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('anggota_room');
        Schema::dropIfExists('request_join');
    }
};
