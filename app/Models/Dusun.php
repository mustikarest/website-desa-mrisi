<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dusun', 'deskripsi', 'potensi',
    ];

    public function petas()
    {
        return $this->hasMany(Peta::class);
    }
}