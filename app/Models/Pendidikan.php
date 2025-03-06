<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'id';
    protected $filable = [
        'nama', 'tingkatan', 'tahun_masuk', 'tahun_keluar',
    ];
}
