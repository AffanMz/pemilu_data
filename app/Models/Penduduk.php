<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';

    protected $fillable = [
        'id',
        'id_tps',
        'nik',
        'name',
        'alamat',
        'tl',
        'jk',
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_tps');
    }
    

}
