<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnakModels extends Model
{
    protected $table = 'anak';
    protected $fillable = [
        'id', 'id_gugatan', 'nama', 'tempat_lahir', 'tgl_lahir',
        'created_at', 'updated_at'
    ];

    public function scopeGugatan($query, $term){
        if ($term) {
            $query->where('id_gugatan', $term);
        }
    }
}
