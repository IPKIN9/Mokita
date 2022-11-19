<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HakimModels extends Model
{
    protected $table = 'hakim';
    protected $fillable = [
        'id', 'nip', 'nama', 'tempat_lahir', 'tgl_lahir', 'jabatan',
        's1', 's2', 's3', 'sertifikat', 'created_at', 'updated_at'
    ];

    public function scopeHakimList($query, $limit, $page)
    {
        $page = ($page - 1) * $limit;
        return $query->offset($page)->limit($limit);
    }
}
