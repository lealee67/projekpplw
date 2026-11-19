<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete(); // pembuat room
            $t->string('nama_room', 50);
            $t->text('deskripsi');
            $t->unsignedInteger('kapasitas')->default(5);
            $t->string('no_wa', 12)->nullable();
            $t->string('lokasi', 50)->nullable();
            $t->string('detail_lokasi', 200)->nullable();
            $t->string('tags', 40)->nullable();
            $t->string('link_groupchat', 40)->nullable();
            $t->timestamps();
        });
        Schema::create('roles', function (Blueprint $t) {
            $t->id();
            $t->foreignId('room_id')->constrained()->cascadeOnDelete();
            $t->string('nama_role', 50);
            $t->text('deskripsi')->nullable();
            $t->unsignedInteger('jumlah_dibutuhkan')->default(1);
            $t->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('rooms');
    }
};
