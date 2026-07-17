<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilDesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_desa', 'kecamatan', 'kabupaten', 'provinsi', 'luas_wilayah',
        'jumlah_dusun', 'jumlah_rw', 'jumlah_rt', 'jumlah_penduduk',
        'jumlah_laki_laki', 'jumlah_perempuan', 'mata_pencaharian',
        'batas_wilayah', 'sejarah', 'visi', 'misi', 'logo',
    ];
}