<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Menambah kolom ke tabel users bawaan Laravel
return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $t) {
            $t->string('username', 20)->nullable()->unique()->after('name');
            $t->string('no_wa', 12)->nullable();
            $t->text('deskripsi')->nullable();
            $t->boolean('status_akun')->default(true);
            $t->foreignId('institusi_id')->nullable()->constrained('institusi')->nullOnDelete();
            $t->foreignId('wilayah_id')->nullable()->constrained('wilayah')->nullOnDelete();
        });
    }
    public function down(): void
    {
        Schema::table('users', function (Blueprint $t) {
            $t->dropConstrainedForeignId('institusi_id');
            $t->dropConstrainedForeignId('wilayah_id');
            $t->dropColumn(['username', 'no_wa', 'deskripsi', 'status_akun']);
        });
    }
};
