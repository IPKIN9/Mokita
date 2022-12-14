<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerkaraModels extends Model
{
    protected $table = 'perkara';
    protected $fillable = [
        'id', 'id_hakim', 'pengacara', 'penitra', 'id_gugatan',
        'status', 'id_jadwal', 'created_at', 'updated_at'
    ];
}
