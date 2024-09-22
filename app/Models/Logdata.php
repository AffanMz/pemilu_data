<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logdata extends Model
{
    use HasFactory;

    protected $table = 'logdata';

    protected $fillable = [
        'id',
        'id_user',
        'aktivitas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
