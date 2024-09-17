<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';

    protected $fillable = [
        'id',
        'id_kelurahan',
        'name',
    ];

    public function allpenduk() {
        $data = Penduduk::where('id_tps', $this->id)->get();
        return count($data);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan');
    }
}
