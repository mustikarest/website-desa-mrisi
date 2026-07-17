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
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique();
        $table->longText('isi');
        $table->string('gambar')->nullable();
        $table->enum('kategori', ['pemerintahan', 'kegiatan', 'pembangunan', 'lainnya'])->default('lainnya');
        $table->date('tanggal_publish');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->boolean('is_published')->default(true);
        $table->integer('views')->default(0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
