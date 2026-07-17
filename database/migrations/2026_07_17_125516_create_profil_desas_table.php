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
    Schema::create('profil_desas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_desa');
        $table->string('kecamatan');
        $table->string('kabupaten');
        $table->string('provinsi');
        $table->decimal('luas_wilayah', 8, 2)->comment('dalam km2');
        $table->integer('jumlah_dusun');
        $table->integer('jumlah_rw');
        $table->integer('jumlah_rt');
        $table->integer('jumlah_penduduk');
        $table->integer('jumlah_laki_laki');
        $table->integer('jumlah_perempuan');
        $table->text('mata_pencaharian');
        $table->text('batas_wilayah');
        $table->longText('sejarah')->nullable();
        $table->text('visi')->nullable();
        $table->text('misi')->nullable();
        $table->string('logo')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desas');
    }
};
