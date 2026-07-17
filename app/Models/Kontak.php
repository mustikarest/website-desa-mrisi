<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak_desas';

    protected $fillable = [
        'alamat_kantor', 'no_telepon', 'email', 'facebook',
        'instagram', 'whatsapp', 'latitude_kantor', 'longitude_kantor',
    ];
}