<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('keahlian_user', function (Blueprint $t) {
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->foreignId('keahlian_id')->constrained('keahlian')->cascadeOnDelete();
            $t->primary(['user_id', 'keahlian_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('keahlian_user'); }
};
