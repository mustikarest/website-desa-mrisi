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
    Schema::create('layanans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_layanan');
        $table->text('deskripsi');
        $table->text('syarat')->nullable();
        $table->text('alur_pengajuan')->nullable();
        $table->string('icon')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
