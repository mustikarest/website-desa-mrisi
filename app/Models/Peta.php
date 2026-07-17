<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lokasi', 'kategori', 'dusun_id',
        'latitude', 'longitude', 'deskripsi',
    ];

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}